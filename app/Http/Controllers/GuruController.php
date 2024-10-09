<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Resources\GuruResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
        return GuruResource::collection(Guru::all());
        
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'phone_number' => 'required|string|max:255',
        //     'email' => 'required|string|max:255',
        //     'password' => 'required|string|max:255',
        //     'confirm_pass' => 'required|string|max:255',
        //     'image' => 'nullable|string',
        //     'role_id' => 'required|integer',
        // ]);

        // $guru = Guru::create($request->all());

        // return new GuruResource($guru);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|unique:gurus',
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

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $guru = Guru::create($input);

        $success['token'] = $guru->createToken('auth_token')->plainTextToken;
        $success['name'] = $guru->name;
        $success['phone_number'] = $guru->phone_number;
        $success['email'] = $guru->email;
        $success['password'] = $guru->password;
        $success['confirm_pass'] = $guru->confirm_pass;
        $success['image'] = $guru->image;
        $success['role_id'] = $guru->role_id;



        return response()->json([
            'success' => true,
            'message' => 'Success Register',
            'data' => $success
        ], 201);
    }
}
