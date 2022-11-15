<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:Users list', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:Users liste', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:Users list', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:Users list', ['only' => ['destroy']]);
    // }



    public function index()
    {
        $users = User::all();
        return view('users.profile', compact('users'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        //
    }


    public function show(User $sections)
    {
        //
    }


    public function edit(User $sections)
    {
        //
    }


    public function update(Request $request)
    {
        try {

            $User = User::findOrfail($request->id);
            if ($request->UpdatePassword == 'true') {
                $User->update([

                    $User->password = Hash::make($request->password),

                ]);
            } else {
                $User->update([
                    $User->name = $request->name,
                    $User->email = $request->email,
                    $User->department = $request->department,
                ]);
            }

            return redirect()->back();
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        //
    }
}
