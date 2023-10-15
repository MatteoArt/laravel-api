<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

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
            'img' => 'required|image|max:4096',
            'repository' => 'required|string|max:1000',
            'page_project' => 'nullable|string|max:1000',
            'technologies' => 'required|array',
            'type_id' => 'nullable|exists:types,id'
        ]);

        //salvo il file nello storage nella cartella uploads che verrà creata dalla funzione
        //put, viene ritornato il path dell'immagine salvata con un codice univoco
        $image_path = Storage::put('uploads', $data['img']);

        //sovrascrivo il campo img con il nuovo path generato che poi verrà salvato sul db
        $data['img'] = $image_path;

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
            'img' => 'nullable|image|max:4096',
            'repository' => 'required|string|max:1000',
            'page_project' => 'nullable|string|max:1000',
            'technologies' => 'required|array',
            'type_id' => 'nullable|exists:types,id'
        ]);

        //se l'immagine viene modificata mi viene passata la chiave 'img' altrimenti
        //la chiave non viene passata e non viene settata
        if (isset($data['img'])) {
            //se voglio modificare l'immagine e quindi esiste già un immagine associata al progetto che voglio modificare, prima
            //di inserire una nuova immagine la cancello
            if ($project->img) {
                Storage::delete($project->img);
            }

            $image_path = Storage::put('uploads', $data['img']);

            $data['img'] = $image_path;
        }

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

        //prima di cancellare l'entità dal db elimino tramite il detach tutti i 
        //collegamenti a quel project
        $project->technologies()->detach();

        //prima di cancellare il progetto dal db verifico se quel progetto aveva un immagine,
        //se si la elimino
        if ($project->img) {
            Storage::delete($project->img);
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
