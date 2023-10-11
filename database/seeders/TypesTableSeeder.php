<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                "name" => "Front-end",
                "description" => "Nella programmazione e sviluppo dei siti web viene definito front end la parte visibile da chiunque e raggiungibile all'indirizzo web del sito.",
                'color' => NULL
            ],
            [
                "name" => "Back-end",
                "description" => "viene definita back end la parte di amministrazione di un sito o in genere di un applicazione (modifica contenuti, creazione pagine) accessibile solo da amministratori del sito web.",
                "color" => NULL
            ],
            [
                "name" => "Design",
                "description" => NULL,
                "color" => NULL
            ]
            ];


            foreach ($types as $type) {
                $newType = new Type();

                $newType->name = $type['name'];
                $newType->description = $type['description'];
                $newType->color = $type['color'];

                $newType->save();
            }
    }
}
