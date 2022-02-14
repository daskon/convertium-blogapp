<?php

namespace App\Http\Controllers;

use App\Models\Draft;

use App\Http\Requests\StoreDraftRequest;
use App\Http\Requests\UpdateDraftRequest;
use Illuminate\Support\Facades\DB;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDraftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDraftRequest $request)
    {
        //upload file
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);

        //store data to the database

        $blog = new Draft();

        $blog->title = $request->title;
        $blog->editor_id = $request->editor_id;
        $blog->image = $imageName;
        $blog->content = $request->editor;


        $blog->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drafts = DB::select('select * from drafts where id = ?',[$id]);
        return view('editor.viewdraft',compact('drafts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drafts = DB::select('select * from drafts where id = ?',[$id]);
        return view('editor.editdraft', compact('drafts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDraftRequest  $request
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDraftRequest $request,$id)
    {
        $blog = Draft::find($id);

      $blog->title = $request->title;
      $blog->editor_id = $request->editor_id;

      $blog->content = $request->editor;


      $blog->update();

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Draft $draft)
    {
        //
    }
}
