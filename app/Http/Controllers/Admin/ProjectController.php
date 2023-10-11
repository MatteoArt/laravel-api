<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;

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
        $types = Type::all();

        return view('admin.projects.create',[
            'types' => $types
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|unique:projects,title|string|max:150',
            'description' => 'required|string',
            'img' => 'required|string|max:200',
            'languages' => 'required|string',
            'repository' => 'required|string|max:1000',
            'page_project' => 'nullable|string|max:1000',
            'type_id' => 'nullable|exists:types,id'
        ]);

        $data['languages'] = json_encode($data['languages']);

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.index');
    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        $types = Type::all();

        return view('admin.projects.edit', [
            'project' => $project,
            'types' => $types
        ]);
    }

    public function update(Request $request, $id) {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'img' => 'required|string|max:200',
            'languages' => 'required|string',
            'repository' => 'required|string|max:1000',
            'page_project' => 'nullable|string|max:1000',
            'type_id' => 'nullable|exists:types,id'
        ]);

        $languages = explode(', ', $data['languages']);
        $data['languages'] = json_encode($languages);

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->id);
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
