<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:Users list', ['only' => ['index', 'store']]);
        $this->middleware('permission:Users liste', ['only' => ['create', 'store']]);
        $this->middleware('permission:Users list', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Users list', ['only' => ['destroy']]);
    }



    public function index()
    {
        // $users = User::all();
        // $roles = Role::all();
        // return view('users.users', compact('users', 'roles'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        // $validated = $request->validated();
        $User = new User();

        // one way

        // $User->name = $request->name;
        // $User->email = $request->email;
        // $User->department = $request->department;
        // $User->roles_name = $request->roles_name;
        // $User->password = Hash::make($request->password);
        // $User->assignRole($request->assignRole);

        // --------------- other way
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));

        $user->save();

        // $flasher->addFlash('success', 'messages.success');
        return redirect()->route('sections.index');


        return redirect()->back();
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
            // $validated = $request->validated();
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
                    $User->roles_name = $request->roles_name,
                ]);
                DB::table('model_has_roles')->where('model_id', $request->id)->delete();
                $User->assignRole($request->input('roles_name'));
            }


            // $flasher->addFlash('success', 'messages.update');
            return redirect()->route('sections.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        User::findOrfail($request->id)->delete();

        // $flasher->addFlash('error', 'messages.delete');
        return redirect()->route('sections.index');
    }
}
