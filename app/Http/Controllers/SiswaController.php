<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Resources\SiswaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        return SiswaResource::collection(Siswa::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|unique:siswas',
            'password' => 'required|string|max:255',
            'confirm_pass' => 'required|same:password',
            'image' => 'nullable|string',
            'role_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 400);
        }

        $input = $request->except('confirm_pass');
        $input['password'] = bcrypt($input['password']);

        $siswa = Siswa::create($input);

        $success['token'] = $siswa->createToken('auth_token')->plainTextToken;
        $success['name'] = $siswa->name;
        $success['phone_number'] = $siswa->phone_number;
        $success['email'] = $siswa->email;
        $success['image'] = $siswa->image;
        $success['role_id'] = $siswa->role_id;

        return response()->json([
            'success' => true,
            'message' => 'Success Register',
            'data' => $success
        ], 201);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['name'] = $auth->name;

            return response()->json([
                'success' => true,
                'message' => 'Login Success',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cek email dan password',
                'data' => null
            ], 401);
        }
    }
}
