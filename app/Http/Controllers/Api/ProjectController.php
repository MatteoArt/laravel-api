<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        //per ora leggo tutti i dati senza paginazione tanto ho solo 6 record nel db
        $projects = Project::with('type', 'technologies')->get();

        return response()->json([
            'results' => $projects,
            'count' => $projects->count()
        ]);
    }

    public function show($id) {
        $project = Project::where('id', $id)
        ->with('type', 'technologies')->get();

        return response()->json([
            'result' => $project
        ]);
    }
}
