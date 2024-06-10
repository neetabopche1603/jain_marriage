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
            ['name' => 'Software Engineer'],
            ['name' => 'Doctor'],
            ['name' => 'Teacher'],
            ['name' => 'Nurse'],
            ['name' => 'Police Officer'],
            ['name' => 'Firefighter'],
            ['name' => 'Electrician'],
            ['name' => 'Plumber'],
            ['name' => 'Mechanic'],
            ['name' => 'Accountant'],
            ['name' => 'Architect'],
            ['name' => 'Civil Engineer'],
            ['name' => 'Data Scientist'],
            ['name' => 'Graphic Designer'],
            ['name' => 'Journalist'],
            ['name' => 'Lawyer'],
            ['name' => 'Pharmacist'],
            ['name' => 'Pilot'],
            ['name' => 'Psychologist'],
            ['name' => 'Sales Manager'],
            ['name' => 'Chef'],
            ['name' => 'Dentist'],
            ['name' => 'Economist'],
            ['name' => 'Financial Analyst'],
            ['name' => 'Human Resources Manager'],
            ['name' => 'Interior Designer'],
            ['name' => 'IT Support Specialist'],
            ['name' => 'Marketing Manager'],
            ['name' => 'Musician'],
            ['name' => 'Physiotherapist'],
            ['name' => 'Research Scientist'],
            ['name' => 'Social Worker'],
            ['name' => 'Veterinarian'],
            ['name' => 'Web Developer'],
            ['name' => 'Writer'],
            ['name' => 'Translator'],
            ['name' => 'Project Manager'],
            ['name' => 'Biologist'],
            ['name' => 'Chemical Engineer'],
            ['name' => 'Consultant'],
            ['name' => 'Customer Service Representative'],
            ['name' => 'Dentistry Assistant'],
            ['name' => 'Dietitian'],
            ['name' => 'Geologist'],
            ['name' => 'Lab Technician'],
            ['name' => 'Logistics Coordinator'],
            ['name' => 'Nuclear Engineer'],
            ['name' => 'Optometrist'],
            ['name' => 'Physician Assistant'],
            ['name' => 'Quality Assurance Specialist'],
            ['name' => 'Statistician'],
            ['name' => 'Surgeon'],
            ['name' => 'Surveyor'],
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
