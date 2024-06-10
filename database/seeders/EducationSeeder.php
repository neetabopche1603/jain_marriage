<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            ['education_name' => 'BA'],
            ['education_name' => 'B.Sc'],
            ['education_name' => 'B.Eng'],
            ['education_name' => 'B.Tech'],
            ['education_name' => 'MA'],
            ['education_name' => 'M.Sc'],
            ['education_name' => 'M.Eng'],
            ['education_name' => 'M.Tech'],
            ['education_name' => 'MBA'],
            ['education_name' => 'PhD'],
            ['education_name' => 'MD'],
            ['education_name' => 'DDS'],
            ['education_name' => 'Doctor of Education (Ed.D)'],
            ['education_name' => 'BFA'],
            ['education_name' => 'MFA'],
            ['education_name' => 'BBA'],
            ['education_name' => 'MPH'],
            ['education_name' => 'MSW'],
            ['education_name' => 'LLB'],
            ['education_name' => 'LLM'],
            ['education_name' => 'Postgraduate Diploma'],
            ['education_name' => 'Professional Certificate'],
            ['education_name' => 'Diploma'],
            ['education_name' => 'Certificate'],
            ['education_name' => 'Trade Certification'],
            ['education_name' => 'High School Diploma'],
            ['education_name' => 'Associate Degree'],
        ];

        foreach($educations as $edu){
            Education::create([
                'education_name'=> strtolower($edu['education_name']),
                'status'=>"active",
            ]);
        }
    }
}
