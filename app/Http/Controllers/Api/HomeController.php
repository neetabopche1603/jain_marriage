<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Hobby;
use App\Models\Occupation;
use App\Models\Professions;
use App\Traits\ResponseCodeTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    use ResponseCodeTrait;
    // Education
    public function educations(Request $request)
    {
        try {

            $educations = Education::orderByDesc('id')->get();

            return $this->getResponseCode(201, '', $educations, 'List of Education!');
        } catch (Exception $e) {
            Log::error('Education Showing failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'Education Showing failed. Please try again later.');
        }
    }

    // professions
    public function professions(Request $request)
    {
        try {

            $professions = Professions::orderByDesc('id')->get();

            return $this->getResponseCode(201, '', $professions, 'List of Professions!');
        } catch (Exception $e) {
            Log::error('Professions Showing failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'Professions Showing failed. Please try again later.');
        }
    }


    // Occupation
    public function occupation(Request $request)
    {
        try {

            $occupation = Occupation::orderByDesc('id')->get();

            return $this->getResponseCode(201, '', $occupation, 'List of Occupation!');
        } catch (Exception $e) {
            Log::error('Occupation Showing failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'Occupation Showing failed. Please try again later.');
        }
    }


    // hobbies
    public function hobbies(Request $request)
    {
        try {

            $hobbies = Hobby::orderByDesc('id')->get();

            return $this->getResponseCode(201, '', $hobbies, 'List of hobbies!');
        } catch (Exception $e) {
            Log::error('hobbies Showing failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'hobbies Showing failed. Please try again later.');
        }
    }
}
