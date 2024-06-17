<?php

namespace Database\Seeders;

use App\Models\Professions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professions = [
            ['name' => 'Any'],
            ['name' => 'Doctor'],
            ['name' => 'Lawyer'],
            ['name' => 'Pharmacist'],
            ['name' => 'Architect'],
            ['name' => 'Civil Engineer'],
            ['name' => 'Data Scientist'],
            ['name' => 'Graphic Designer'],
            ['name' => 'Journalist'],
            ['name' => 'Pilot'],
            ['name' => 'Psychologist'],
            ['name' => 'Economist'],
            ['name' => 'Financial Analyst'],
            ['name' => 'Human Resources Manager'],
            ['name' => 'Interior Designer'],
            ['name' => 'Marketing Manager'],
            ['name' => 'Musician'],
            ['name' => 'Physiotherapist'],
            ['name' => 'Research Scientist'],
            ['name' => 'Veterinarian'],
            ['name' => 'Biologist'],
            ['name' => 'Chemical Engineer'],
            ['name' => 'Consultant'],
            ['name' => 'Dentist'],
            ['name' => 'Dietitian'],
            ['name' => 'Geologist'],
            ['name' => 'Nuclear Engineer'],
            ['name' => 'Optometrist'],
            ['name' => 'Physician Assistant'],
            ['name' => 'Statistician'],
            ['name' => 'Surgeon'],
            ['name' => 'UX/UI Designer'],
            ['name' => 'Zoologist'],
        ];


        foreach($professions as $pro){
            Professions::create([
                'profession_name'=>strtolower($pro['name']),
                'status'=>"active",
            ]);
        }
    }
}
