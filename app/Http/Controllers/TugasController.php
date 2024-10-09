<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Http\Resources\TugasResource;

class TugasController extends Controller
{
    public function index()
    {
        return TugasResource::collection(Tugas::all());

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'attachment' => [
                'required',
                'url',
                'max:255',
                'regex:/\.(pdf|doc|docx|xls|xlsx|ppt|pptx)$/i'
            ],
            'deadline' => 'required|date',
            'score' => 'required|numeric', 
            'class_id' => 'required|integer',
        ]);

        $tugas = Tugas::create($request->all());

        return new TugasResource($tugas);
    }
}
