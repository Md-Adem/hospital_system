<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\sections;
use App\Models\nationalities;
use App\Models\NewsBar;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SectionsController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:Sections', ['only' => ['index', 'store']]);
        $this->middleware('permission:Sections', ['only' => ['create', 'store']]);
        $this->middleware('permission:Sections', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Sections', ['only' => ['destroy']]);
    }


    public function index()
    {
        $sections = sections::all();
        $nationalities = nationalities::all();
        $NewsBars = NewsBar::all();
        $users = User::all();
        $roles = Role::all();
        return view('sections.sections', compact('sections', 'nationalities', 'NewsBars', 'users', 'roles'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            // $validated = $request->validated();
            $sections = new sections();


            $sections->name = $request->name;

            $sections->save();

            // $flasher->addFlash('success', 'messages.success');
            return redirect()->back('sections.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(sections $sections)
    {
        //
    }


    public function edit(sections $sections)
    {
        //
    }


    public function update(Request $request)
    {
        try {
            // $validated = $request->validated();
            $sections = sections::findOrfail($request->id);
            $sections->update([
                $sections->name = $request->name,
            ]);

            // $flasher->addFlash('success', 'messages.update');
            return redirect()->route('sections.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        sections::findOrfail($request->id)->delete();

        // $flasher->addFlash('error', 'messages.delete');
        return redirect()->route('sections.index');
    }
}
