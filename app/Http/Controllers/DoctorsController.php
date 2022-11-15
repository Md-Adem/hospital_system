<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use App\Models\sections;
use App\Models\nationalities;
use App\Http\Requests\StoredoctorsRequest;
use App\Http\Requests\UpdatedoctorsRequest;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:Doctors Table', ['only' => ['index', 'store']]);
        $this->middleware('permission:Doctors Table', ['only' => ['create', 'store']]);
        $this->middleware('permission:Doctors Table', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Doctors Table', ['only' => ['destroy']]);
    }



    public function index()
    {
        $doctors = doctors::all();
        $sections = sections::all();
        $nationalities = nationalities::all();
        return view('doctors.doctors', compact('doctors', 'sections', 'nationalities'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            // $validated = $request->validated();
            $doctors = new doctors();


            $doctors->code = $request->code;
            $doctors->doctor_name = $request->doctor_name;
            $doctors->gender = $request->gender;
            $doctors->doctor_nationalities = $request->doctor_nationalities;
            $doctors->doctor_sections = $request->doctor_sections;
            $doctors->specialization = $request->specialization;
            $doctors->qualification = $request->qualification;
            $doctors->ages = $request->ages;
            $doctors->except = $request->except;
            $doctors->cases = $request->cases;
            $doctors->status = '1';

            $doctors->save();

            // $flasher->addFlash('success', 'messages.success');
            return redirect()->route('doctors.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(doctors $doctors)
    {
        //
    }


    public function edit(doctors $doctors)
    {
        //
    }


    public function update(Request $request)
    {

        // echo $request;

        // $validated = $request->validated();
        $doctors = doctors::findOrfail($request->id);
        $doctors->update([
            $doctors->code = $request->code,
            $doctors->doctor_name = $request->doctor_name,
            $doctors->gender = $request->gender,
            $doctors->doctor_nationalities = $request->doctor_nationalities,
            $doctors->doctor_sections = $request->doctor_sections,
            $doctors->specialization = $request->specialization,
            $doctors->qualification = $request->qualification,
            $doctors->ages = $request->ages,
            $doctors->except = $request->except,
            $doctors->cases = $request->cases,
            // $doctors->status = $request->status
        ]);

        // $flasher->addFlash('success', 'messages.update');
        return redirect()->route('doctors.index');
    }


    public function destroy(Request $request)
    {
        doctors::FindOrFail($request->id)->delete();

        // $flasher->addFlash('error', 'messages.delete', null);
        return back();
    }
}
