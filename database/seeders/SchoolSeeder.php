<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $schools = [
            [
                'name' => 'University of Daugavpils',
                'region' => 'Latgale',
                'municipality' => 'Daugavpils',
                'type' => 'Valsts universitāte',
                'address' => 'Vienības iela 13'
            ],
            [
                'name' => 'Latvia University of Life Sciences and Technologies',
                'region' => 'Vidzeme',
                'municipality' => 'Jelgava',
                'type' => 'Valsts universitāte',
                'address' => 'Lielā iela 2'
            ],
            [
                'name' => 'Riga Stradiņš University',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts universitāte',
                'address' => 'Dzirciema iela 16'
            ],
            [
                'name' => 'Riga Technical University',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts universitāte',
                'address' => 'Kaļķu iela 1'
            ],
            [
                'name' => 'University of Latvia',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts universitāte',
                'address' => 'Raiņa bulvāris 19'
            ],
            [
                'name' => 'University of Liepāja',
                'region' => 'Kurzeme',
                'municipality' => 'Liepāja',
                'type' => 'Valsts universitāte',
                'address' => 'Lielā iela 14'
            ],
            [
                'name' => 'Latvian Academy of Art',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts augstskola',
                'address' => 'Kronvalda bulvāris 1'
            ],
            [
                'name' => 'BA School of Business and Finance',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts augstskola',
                'address' => 'K. Valdemāra iela 161'
            ],
            [
                'name' => 'Jāzeps Vītols Latvian Academy of Music',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts augstskola',
                'address' => 'Aspazijas bulvāris 3'
            ],
            [
                'name' => 'Latvian Academy of Culture',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts augstskola',
                'address' => 'Skolas iela 6'
            ],
            [
                'name' => 'Latvian Academy of Sport Education',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts augstskola',
                'address' => 'Brīvības gatve 333'
            ],
            [
                'name' => 'Latvian Maritime Academy',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts augstskola',
                'address' => 'Raiņa bulvāris 12'
            ],
            [
                'name' => 'National Defence Academy of Latvia',
                'region' => 'Rīga',
                'municipality' => 'Rīgas pilsēta',
                'type' => 'Valsts augstskola',
                'address' => 'Ezermalas iela 8'
            ],
            [
                'name' => 'Rēzekne Academy of Technology',
                'region' => 'Latgale',
                'municipality' => 'Rēzekne',
                'type' => 'Valsts augstskola',
                'address' => 'Atbrīvošanas aleja 115'
            ],
            [
                'name' => 'Ventspils University of Applied Sciences',
                'region' => 'Kurzeme',
                'municipality' => 'Ventspils',
                'type' => 'Valsts augstskola',
                'address' => 'Inženieru iela 101'
            ],
            [
                'name' => 'Vidzeme University of Applied Sciences',
                'region' => 'Vidzeme',
                'municipality' => 'Valmiera',
                'type' => 'Valsts augstskola',
                'address' => 'K. Valdemāra iela 1'
            ],
            // Add all remaining colleges and vocational schools similarly
        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
