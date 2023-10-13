<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

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
        $technologies = Technology::all();

        return view('admin.projects.create',[
            'types' => $types,
            'technologies' => $technologies
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|unique:projects,title|string|max:150',
            'description' => 'required|string',
            'img' => 'required|string|max:200',
            'repository' => 'required|string|max:1000',
            'page_project' => 'nullable|string|max:1000',
            'technologies' => 'required|array',
            'type_id' => 'nullable|exists:types,id'
        ]);


        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        //qui non ci sta bisogno di eseguire il detach perchè l'elemento da associare alle
        //technologies è stato appena creato
        //inoltre l'attach va fatto dopo che l'elemento viene salvato nel database

        $newProject->technologies()->attach($data['technologies']);

        return redirect()->route('admin.projects.index');
    }

    public function edit($id) {
        $project = Project::findOrFail($id);

        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', [
            'project' => $project,
            'types' => $types,
            'technologies' => $technologies
        ]);
    }

    public function update(Request $request, $id) {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'img' => 'required|string|max:200',
            'repository' => 'required|string|max:1000',
            'page_project' => 'nullable|string|max:1000',
            'technologies' => 'required|array',
            'type_id' => 'nullable|exists:types,id'
        ]);

        //assegnazione delle technologies al corrente project nella tabella ponte

        //prima di assegnare i nuovi technologies cancello quelli precedenti
        //$project->technologies()->detach();

        //assegno i nuovi
        //$project->technologies()->attach($data['technologies']);

        //esegue in un colpo solo l'attach e il detach
        $project->technologies()->sync($data['technologies']);

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->id);
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
