<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nationalities;

class NationalitiesController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            // $validated = $request->validated();
            $nationalities = new nationalities();


            $nationalities->name = $request->name;

            $nationalities->save();

            // $flasher->addFlash('success', 'messages.success');
            return redirect()->route('sections.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(Request $request)
    {
        //
    }


    public function edit(Request $request)
    {
        //
    }


    public function update(Request $request)
    {
        try {
            // $validated = $request->validated();
            $nationalities = nationalities::findOrfail($request->id);
            $nationalities->update([
                $nationalities->name = $request->name,
            ]);

            // $flasher->addFlash('success', 'messages.update');
            return redirect()->route('sections.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        nationalities::findOrfail($request->id)->delete();

        // $flasher->addFlash('error', 'messages.delete');
        return redirect()->route('sections.index');
    }
}
