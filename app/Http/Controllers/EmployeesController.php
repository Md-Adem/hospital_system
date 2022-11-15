<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index()
    {
        $employees = Employees::all();
        return view('appointments.appointments', compact('employees'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            // $validated = $request->validated();
            $employees = new Employees();


            $employees->name = $request->name;
            $employees->code = $request->code;
            $employees->status = 'Active';


            $employees->save();

            // $flasher->addFlash('success', 'messages.success');
            return redirect()->route('appointments.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(Employees $employees)
    {
        //
    }


    public function edit(Employees $employees)
    {
        //
    }


    public function update(Request $request)
    {


        // $validated = $request->validated();
        $employees = Employees::findOrfail($request->id);
        $employees->update([
            $employees->name = $request->name,
            $employees->code = $request->code,
            $employees->status = $request->status,
        ]);


        // $flasher->addFlash('success', 'messages.update');
        return redirect()->route('appointments.index');
    }

    public function destroy(Request $request)
    {
        employees::findOrfail($request->id)->delete();

        // $flasher->addFlash('error', 'messages.delete');
        return redirect()->route('appointments.index');
    }
}
