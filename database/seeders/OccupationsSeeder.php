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
        $occupations = [
            ['occupation_name' => 'Software Engineer'],
            ['occupation_name' => 'Teacher'],
            ['occupation_name' => 'Nurse'],
            ['occupation_name' => 'Police Officer'],
            ['occupation_name' => 'Firefighter'],
            ['occupation_name' => 'Electrician'],
            ['occupation_name' => 'Plumber'],
            ['occupation_name' => 'Mechanic'],
            ['occupation_name' => 'Accountant'],
            ['occupation_name' => 'IT Support Specialist'],
            ['occupation_name' => 'Social Worker'],
            ['occupation_name' => 'Web Developer'],
            ['occupation_name' => 'Writer'],
            ['occupation_name' => 'Translator'],
            ['occupation_name' => 'Project Manager'],
            ['occupation_name' => 'Customer Service Representative'],
            ['occupation_name' => 'Dentistry Assistant'],
            ['occupation_name' => 'Lab Technician'],
            ['occupation_name' => 'Logistics Coordinator'],
            ['occupation_name' => 'Quality Assurance Specialist'],
            ['occupation_name' => 'Surveyor'],
            ['occupation_name' => 'Housewife'],
            ['occupation_name' => 'Sales Manager'],
            ['occupation_name' => 'Chef'],
            ['occupation_name' => 'Any'],
        ];


        foreach($occupations as $Occupation){
            Occupation::create([
                'occupation_name'=>strtolower($Occupation['occupation_name']),
                'status'=>"active",
            ]);
        }
    }
}
