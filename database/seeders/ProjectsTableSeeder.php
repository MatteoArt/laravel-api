<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Laravel-dc-comics',
                'description' => 'Applicazione creata con laravel che implementa le CRUD riproducendo
                                  un layout su più pagine, stile curato con Sass',
                'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3d/DC_Comics_logo.svg/1200px-DC_Comics_logo.svg.png',
                'languages' => ['Php', 'Blade', 'Scss', 'JavaScript'],
                'repository' => 'https://github.com/MatteoArt/laravel-dc-comics',
                'page_project' => NULL
            ],
            [
                'title' => 'Vue-boolzapp',
                'description' => 'Riproduzione semplificata front-end della web app di WhatsApp utilizzando Vuejs, 
                                  con simulazione di invio e ricevimento messaggi',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5UU6cV2tYLJO93KkaniWk2zmQ8AYlyv6LpA&usqp=CAU',
                'languages' => ['Vue', 'JavaScript', 'Css', 'Html'],
                'repository' => 'https://github.com/MatteoArt/vue-boolzapp',
                'page_project' => 'https://matteoart.github.io/vue-boolzapp/'
            ]  
            ];

            foreach ($projects as $project) {
                $newProject = new Project();
                
                $newProject->title = $project['title'];
                $newProject->description = $project['description'];
                $newProject->img = $project['img'];
                $newProject->languages = json_encode($project['languages']);
                $newProject->repository = $project['repository'];
                $newProject->page_project = $project['page_project'];

                $newProject->save();
            }
    }
}
