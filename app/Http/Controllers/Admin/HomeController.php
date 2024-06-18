<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Occupation;
use App\Models\Professions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    // List of Education

    public function educations(Request $request)
    {
        try {

            $educations = Education::query();
            $search = $request->search;
            $searchQuery = '%' . $search . '%';

            // Search
            if (!empty($search)) {
                $educations->where(function ($subquery) use ($searchQuery, $search) {
                    $subquery->where('education_name', 'like', $searchQuery)
                        ->orWhere('status', 'like', $searchQuery);
                });
            }
            $educations = $educations->orderBy('id', 'DESC')->paginate(10);
            return view('adminPanel.education.all', compact('educations'));
        } catch (Exception $e) {
            Log::error('Education List error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'Education List error', $e->getMessage());
        }
    }

    // Store Education
    public function educationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'education_name' => 'required|unique:education,education_name,',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            Education::create([
                'education_name' => strtolower($request->education_name),
                'status' => $request->status,
            ]);
            DB::commit();
            return Redirect::route('admin.educations')->with('success', 'Educcation Added Successfully Done!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Education Store error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'Education Store error', $e->getMessage());
        }
    }

    // Edit Education
    public function editEducation($id)
    {
        $education = Education::find($id);
        return response()->json(['status' => 200, 'data' => $education]);
    }

    // Store Education
    public function educationUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'education_name' => 'required|unique:education,education_name,' . $request->id,
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $education = Education::find($request->id);

            $education->update([
                'education_name' => strtolower($request->education_name),
                'status' => $request->status,
            ]);
            DB::commit();
            return Redirect::route('admin.educations')->with('success', 'Educcation Update Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Education Update error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'Education Update error', $e->getMessage());
        }
    }

    // Update Education Status
    public function educationStatusUpdate($id)
    {
        DB::beginTransaction();
        try {
            $eduStatus = Education::find($id);

            $eduStatus->status = $eduStatus->status == 'active' ? 'block' : 'active';
            $eduStatus->update();
            DB::commit();
            return Redirect::back()->with('success', $eduStatus->education_name . ' Education status has been updated.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Education updated error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'Education updated error', $e->getMessage());
        }
    }

    // Delete Education
    public function educationDelete($id)
    {
        DB::beginTransaction();
        try {
            $eduStatus = Education::find($id);
            $eduStatus->delete();

            DB::commit();
            return Redirect::back()->with('success', $eduStatus->education_name . ' Education status has been deleted.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Education deleted error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'Education deleted error', $e->getMessage());
        }
    }


    //  ==========================================================================
    //  Professions Module
    //  ==========================================================================

    // List of Professions

    public function professions(Request $request)
    {
        try {

            $professions = Professions::query();
            $search = $request->search;
            $searchQuery = '%' . $search . '%';

            // Search
            if (!empty($search)) {
                $professions->where(function ($subquery) use ($searchQuery, $search) {
                    $subquery->where('profession_name', 'like', $searchQuery)
                        ->orWhere('status', 'like', $searchQuery);
                });
            }
            $professions = $professions->orderBy('id', 'DESC')->paginate(10);


            return view('adminPanel.profession.all', compact('professions'));
        } catch (Exception $e) {
            Log::error('professions List error: ' . $e->getMessage());
            return  Redirect::back()->with('professions List error', $e->getMessage());
        }
    }

    // Store Professions
    public function professionStore(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'profession_name' => 'required|unique:professions,profession_name,',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {

            Professions::create([
                'profession_name' => $request->profession_name,
                'status' => $request->status,
            ]);

            DB::commit();
            return Redirect::route('admin.professions')->with('success', 'Professions Added Successfully Done!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Professions Store error: ' . $e->getMessage());
            return  Redirect::back()->with('Professions Store error', $e->getMessage());
        }
    }

    // Edit Education
    public function editProfession($id)
    {
        $profession = Professions::find($id);
        return response()->json(['status' => 200, 'data' => $profession]);
    }

    // Update Professions
    public function professionUpdate(Request $request, Professions $professions)
    {
        $validator = Validator::make($request->all(), [
            'profession_name' => 'required|unique:professions,profession_name' . $professions->id,
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $professions->update([
                'profession_name' => $request->profession_name,
                'status' => $request->status,
            ]);
            DB::commit();
            return Redirect::route('admin.professions')->with('success', 'Professions Update Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Professions Update error: ' . $e->getMessage());
            return  Redirect::back()->with('Professions Update error', $e->getMessage());
        }
    }

    // Update Professions Status
    public function professionStatusUpdate($id)
    {
        DB::beginTransaction();
        try {
            $professionsStatus = Professions::find($id);
            $professionsStatus->status = $professionsStatus->status == 'active' ? 'block' : 'active';
            $professionsStatus->update();
            DB::commit();
            return Redirect::back()->with('success',  $professionsStatus->profession_name . ' Professions status has been updated.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Professions updated error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'Professions updated error', $e->getMessage());
        }
    }

    // Delete Profession
    public function professionDelete($id)
    {
        DB::beginTransaction();
        try {
            $professionDelete = Professions::find($id);
            $professionDelete->delete();

            DB::commit();
            return Redirect::back()->with('success', $professionDelete->professions_name . ' Professions status has been deleted.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Professions deleted error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'Professions deleted error', $e->getMessage());
        }
    }

    //  ==========================================================================
    //  Occupation Module
    //  ==========================================================================

    // List of Occupation

    public function occupations(Request $request)
    {
        try {
            $occupations = Occupation::query();

            $search = $request->search;
            $searchQuery = '%' . $search . '%';

            // Search
            if (!empty($search)) {
                $occupations->where(function ($subquery) use ($searchQuery, $search) {
                    $subquery->where('occupation_name', 'like', $searchQuery)
                        ->orWhere('status', 'like', $searchQuery);
                });
            }
            $occupations = $occupations->orderBy('id', 'DESC')->paginate(10);
            return view('adminPanel.occupation.all', compact('occupations'));
        } catch (Exception $e) {
            Log::error('Occupation List error: ' . $e->getMessage());
            return  Redirect::back()->with('Occupation List error', $e->getMessage());
        }
    }

    // Store Occupation
    public function occupationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'occupation_name' => 'required|unique:occupations,occupation_name,',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            Occupation::create([
                'occupation_name' => $request->occupation_name,
                'status' => $request->status,
            ]);
            DB::commit();
            return Redirect::route('admin.occupations')->with('success', 'Occupation Added Successfully Done!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Occupation Store error: ' . $e->getMessage());
            return  Redirect::back()->with('Occupation Store error', $e->getMessage());
        }
    }

    // Edit Occupation
    public function editOccupation($id)
    {
        $Occupations = Occupation::find($id);
        return response()->json(['status' => 200, 'data' => $Occupations]);
    }

    // Update Occupation
    public function occupationUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'occupation_name' => 'required|unique:occupations,occupation_name,' . $request->id,
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $occupation = Occupation::find($request->id);

            if (!$occupation) {
                return Redirect::back()->with('error', 'Occupation not found.');
            }

            $occupation->update([
                'occupation_name' => $request->occupation_name,
                'status' => $request->status,
            ]);

            DB::commit();
            return Redirect::route('admin.occupations')->with('success', 'Occupation updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Occupation Update error: ' . $e->getMessage());
            return Redirect::back()->with('error', 'Occupation update error: ' . $e->getMessage());
        }
    }


    // Update Occupation Status
    public function occupationStatusUpdate($id)
    {
        DB::beginTransaction();
        try {
            $occupationStatus = Occupation::find($id);
            $occupationStatus->status = $occupationStatus->status == 'active' ? 'block' : 'active';
            $occupationStatus->update();
            DB::commit();
            return Redirect::back()->with('success',  $occupationStatus->occupation_name . ' occupation status has been updated.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('occupation updated error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'occupation updated error', $e->getMessage());
        }
    }


    // Delete Occupation Status
    public function occupationDelete($id)
    {
        DB::beginTransaction();
        try {
            $occupationDelete = Occupation::find($id);
            $occupationDelete->delete();
            DB::commit();
            return Redirect::back()->with('success',  $occupationDelete->occupation_name . ' occupation status has been deleted.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('occupation deleted error: ' . $e->getMessage());
            return  Redirect::back()->with('error', 'occupation deleted error', $e->getMessage());
        }
    }



}
