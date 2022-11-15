<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Employees;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:Appointments', ['only' => ['index', 'store']]);
        $this->middleware('permission:Appointments', ['only' => ['create', 'store']]);
        $this->middleware('permission:Appointments', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Appointments', ['only' => ['destroy']]);
    }

    public function index()
    {
        $appointments = Appointments::all();
        $employees = Employees::all();
        return view('appointments.appointments', compact('employees', 'appointments'));
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        // $validated = $request->validated();
        $appointments = new Appointments();


        $appointments->date = date('Y-m-d', strtotime($request->date));
        $appointments->employees_name = $request->employees_name;
        $appointments->count = $request->count;


        $appointments->save();

        // $flasher->addFlash('success', 'messages.success');
        return redirect()->route('appointments.index');
    }


    public function show(Appointments $appointments)
    {
        //
    }

    public function edit(Appointments $appointments)
    {
        //
    }


    public function update(Request $request, Appointments $appointments)
    {
        //
    }


    public function destroy(Appointments $appointments)
    {
        //
    }
}
