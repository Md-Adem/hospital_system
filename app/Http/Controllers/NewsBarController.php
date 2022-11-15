<?php

namespace App\Http\Controllers;

use App\Models\NewsBar;
use Illuminate\Http\Request;

class NewsBarController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:NewsBar', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:NewsBar', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:NewsBar', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:NewsBar', ['only' => ['destroy']]);
    // }


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
            $NewsBar = new NewsBar();


            $NewsBar->content = $request->content;
            $NewsBar->type = $request->type;

            $NewsBar->save();

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
            $NewsBar = NewsBar::findOrfail($request->id);
            $NewsBar->update([
                $NewsBar->content = $request->content,
                $NewsBar->type = $request->type,
            ]);

            // $flasher->addFlash('success', 'messages.update');
            return redirect()->route('sections.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        NewsBar::findOrfail($request->id)->delete();

        // $flasher->addFlash('error', 'messages.delete');
        return redirect()->route('sections.index');
    }
}
