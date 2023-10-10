<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('admin.projects.index', [
            'projects' => $projects
        ]);

    }

    public function show($id) {
        $project = Project::findOrFail($id);

        return view('admin.projects.show', [
            'project' => $project
        ]);
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|unique:projects,title|string|max:150',
            'description' => 'required|string',
            'img' => 'required|string|max:200',
            'languages' => 'required|string',
            'repository' => 'required|string|max:1000',
            'page_project' => 'nullable|string|max:1000'
        ]);

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.index');
    }
}
