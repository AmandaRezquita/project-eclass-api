<?php

namespace App\Http\Controllers;

use App\Models\Institusi_Pendidikan;
use App\Http\Resources\Institusi_PResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Institusi_PController extends Controller
{
    public function index()
    {
        return Institusi_PResource::collection(Institusi_Pendidikan::all());
        
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'institution_name' => 'required|string|max:255',
        //     'phone_number' => 'required|string|max:255',
        //     'institution_email' => 'required|string|max:255',
        //     'password' => 'required|string|max:255',
        //     'confirm_pass' => 'required|string|max:255',
        //     'institution_image' => 'nullable|string',
        //     'role_id' => 'required|integer',
        // ]);

        // $intstitusi_pendidikan = Institusi_Pendidikan::create($request->all());

        // return new Institusi_PResource($intstitusi_pendidikan);

        $validator = Validator::make($request->all(), [
            'institution_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'institution_email' => 'required|email|unique:institusi__pendidikans',
            'password' => 'required|string|max:255',
            'confirm_pass' => 'required|same:password',
            'institution_image' => 'nullable|string',
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

        $institusi = Institusi_Pendidikan::create($input);

        $success['token'] = $institusi->createToken('auth_token')->plainTextToken;
        $success['institution_name'] = $institusi->institution_name;
        $success['phone_number'] = $institusi->phone_number;
        $success['institution_email'] = $institusi->institution_email;
        $success['password'] = $institusi->password;
        $success['confirm_pass'] = $institusi->confirm_pass;
        $success['institution_image'] = $institusi->institution_image;
        $success['role_id'] = $institusi->role_id;



        return response()->json([
            'success' => true,
            'message' => 'Success Register',
            'data' => $success
        ], 201);
    }
    }

