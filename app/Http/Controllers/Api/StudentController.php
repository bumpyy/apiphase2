<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Register api
    public function register(Request $request)
    {
        //Validation
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:students",
            "password" => "required|confirmed",
        ]);

        $student = new Student();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);

        $student->save();

        return response()->json([
            "status" => 1,
            "message" => "Student registered succesfully",
        ]);
    }

    //Login API
    public function login(Request $request)
    {
        // Validation
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        // check student
        $student = Student::where("email", $request->email)->first();

        if (isset($student->id)) {
            if (Hash::check($request->password, $student->password)) {
                //Create a token
                $token = $student->createToken("auth_token")->plainTextToken;
                //send response
                return response()->json([
                    "status" => 1,
                    "message" => "Student logged in succesfully",
                    "acces_token" => $token,
                ]);
            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "Password didn't match",
                ], 404);
            }
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Student not found",
            ], 404);
        }
    }

    //Logout API
    public function profile()
    {
        return response()->json([
            "status" => 1,
            "message" => "student profile information",
            "data" => auth()->user(),
        ]);
    }

    //Logout API
    // public function list() {
    // }

    public function listAll()
    {
        return response()->json([
            "status" => 1,
            "message" => "All user",
            "data" => Student::all(),
        ]);
    }

    //Logout API
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "status" => 1,
            "message" => "Student logged out successfully",
        ]);
    }
}
