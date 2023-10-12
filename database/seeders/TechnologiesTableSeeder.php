<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Technology;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                "name" => "Php",
                "description" => "Php è un linguaggio di scripting interpretato, originariamente concepito per la programmazione di pagine web dinamiche. Attualmente è principalmente utilizzato per sviluppare applicazioni web lato server.",
                "color" => NULL,
                "icon" => NULL
            ],
            [
                "name" => "Javascript",
                "description" => "JavaScript è il principale linguaggio di programmazione per lo sviluppo di web applications. Sempre più diffuso, tocca ormai gli ambiti mobile, server e desktop.",
                "color" => NULL,
                "icon" => NULL
            ],
            [
                "name" => "Laravel",
                "description" => NULL,
                "color" => NULL,
                "icon" => NULL
            ],
            [
                "name" => "Vue.js",
                "description" => NULL,
                "color" => NULL,
                "icon" => NULL
            ]
            ];

            foreach ($technologies as $technology) {
                $newTechnology = new Technology();

                $newTechnology->name = $technology['name'];
                $newTechnology->description = $technology['description'];
                $newTechnology->color = $technology['color'];
                $newTechnology->icon = $technology['icon'];

                $newTechnology->save();
            }
    }
}
