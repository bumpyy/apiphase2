<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaranDiikuti;
use Illuminate\Http\Request;

class MataPelajaranDiikutiController extends Controller
{
    public function createMataPelajaranDiikuti(Request $request)
    {
        //validation
        $request->validate([
            "name" => "required",
        ]);

        // Student id + create data
        $student_id = auth()->user()->id;

        $project = new MataPelajaranDiikuti();

        $project->student_id = $student_id;
        $project->mata_kuliah_id = $request->mata_kuliah_id;

        $project->save();

        // send response
        return response()->json([
            "status" => 1,
            "message" => "Mata Kuliah diikuti Created",
        ]);

    }

    // List project api
    public function listMataPelajaranDiikuti()
    {
        $student_id = auth()->user()->id;

        $projects = MataPelajaranDiikuti::where("student_id", $student_id)->get();

        return response()->json([
            "status" => 1,
            "message" => (auth()->user()->name) . " mengikuti",
            "data" => $projects,
        ]);
    }

    // single project api
    public function singleMataPelajaranDiikuti($id)
    {
        # code...
    }

    // delete project api
    public function deleteMataPelajaranDiikuti($id)
    {
        # code...
    }
}
