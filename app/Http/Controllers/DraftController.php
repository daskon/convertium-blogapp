<?php

namespace App\Http\Controllers;

use App\Models\Draft;

use App\Http\Requests\StoreDraftRequest;
use App\Http\Requests\UpdateDraftRequest;
use Illuminate\Support\Facades\DB;

class DraftController extends Controller
{

    /**
     * store the blog post as a draft
     *
     * @param  \App\Http\Requests\StoreDraftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDraftRequest $request)
    {
    
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $obj = new Draft();
        $obj->title = $request->title;
        $obj->editor_id = $request->editor_id;
        $obj->image = $imageName;
        $obj->content = $request->editor;
        $obj->save();

        return back()->with('success','Your Blog Post has Draft.');
    }

    /**
     * view draft blog post
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
     * show edit draft blog post form
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
        
      $obj = Draft::find($id);
      $obj->title = $request->title;
      $obj->editor_id = $request->editor_id;
      $obj->content = $request->editor;
      $obj->update();

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Draft::where('id',$id)->delete();
        return back();
    }
}
