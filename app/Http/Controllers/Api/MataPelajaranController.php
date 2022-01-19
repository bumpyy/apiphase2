<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    //Create project api
    public function createMataPelajaran(Request $request)
    {
        //validation
        $request->validate([
            "name" => "required",
        ]);

        // Student id + create data
        $project = new MataPelajaran();

        $project->name = $request->name;

        $project->save();

        // send response
        return response()->json([
            "status" => 1,
            "message" => "Matkul Created",
        ]);

    }

    // List project api
    public function listMataPelajaran()
    {
        $matkul = MataPelajaran::all();

        return response()->json([
            "status" => 1,
            "message" => "matkul all",
            "data" => $matkul,
        ]);
    }

    // single project api
    public function singleMataPelajaran($id)
    {
        $matkul = MataPelajaran::all();

        return response()->json([
            "status" => 1,
            "message" => "matkul all",
            "data" => $matkul,
        ]);

    }

    // delete project api
    public function deleteMataPelajaran($id)
    {
        $matkul = MataPelajaran::where("id", );

        return response()->json([
            "status" => 1,
            "message" => "matkul all",
            "data" => $matkul,
        ]);

    }
}
