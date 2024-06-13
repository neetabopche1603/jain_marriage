<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OccupationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Occupations = [
            ['occupation_name' => 'Software Engineer'],
            ['occupation_name' => 'Doctor'],
            ['occupation_name' => 'Teacher'],
            ['occupation_name' => 'Nurse'],
            ['occupation_name' => 'Police Officer'],
            ['occupation_name' => 'Firefighter'],
            ['occupation_name' => 'Electrician'],
            ['occupation_name' => 'Plumber'],
            ['occupation_name' => 'Mechanic'],
            ['occupation_name' => 'Accountant'],
            ['occupation_name' => 'Architect'],
            ['occupation_name' => 'Civil Engineer'],
            ['occupation_name' => 'Data Scientist'],
            ['occupation_name' => 'Graphic Designer'],
            ['occupation_name' => 'Journalist'],
            ['occupation_name' => 'Lawyer'],
            ['occupation_name' => 'Pharmacist'],
            ['occupation_name' => 'Pilot'],
            ['occupation_name' => 'Psychologist'],
            ['occupation_name' => 'Sales Manager'],
            ['occupation_name' => 'Chef'],
            ['occupation_name' => 'Dentist'],
            ['occupation_name' => 'Economist'],
            ['occupation_name' => 'Financial Analyst'],
            ['occupation_name' => 'Human Resources Manager'],
            ['occupation_name' => 'Interior Designer'],
            ['occupation_name' => 'IT Support Specialist'],
            ['occupation_name' => 'Marketing Manager'],
            ['occupation_name' => 'Musician'],
            ['occupation_name' => 'Physiotherapist'],
            ['occupation_name' => 'Research Scientist'],
            ['occupation_name' => 'Social Worker'],
            ['occupation_name' => 'Veterinarian'],
            ['occupation_name' => 'Web Developer'],
            ['occupation_name' => 'Writer'],
            ['occupation_name' => 'Translator'],
            ['occupation_name' => 'Project Manager'],
            ['occupation_name' => 'Biologist'],
            ['occupation_name' => 'Chemical Engineer'],
            ['occupation_name' => 'Consultant'],
            ['occupation_name' => 'Customer Service Representative'],
            ['occupation_name' => 'Dentistry Assistant'],
            ['occupation_name' => 'Dietitian'],
            ['occupation_name' => 'Geologist'],
            ['occupation_name' => 'Lab Technician'],
            ['occupation_name' => 'Logistics Coordinator'],
            ['occupation_name' => 'Nuclear Engineer'],
            ['occupation_name' => 'Optometrist'],
            ['occupation_name' => 'Physician Assistant'],
            ['occupation_name' => 'Quality Assurance Specialist'],
            ['occupation_name' => 'Statistician'],
            ['occupation_name' => 'Surgeon'],
            ['occupation_name' => 'Surveyor'],
            ['occupation_name' => 'UX/UI Designer'],
            ['occupation_name' => 'Zoologist'],
            ['occupation_name' => 'Any'],

        ];

        foreach($Occupations as $Occupation){
            Occupation::create([
                'occupation_name'=>strtolower($Occupation['occupation_name']),
                'status'=>"active",
            ]);
        }
    }
}
