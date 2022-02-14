<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Http\Requests\StoreEditorRequest;
use App\Http\Requests\UpdateEditorRequest;
use Illuminate\Support\Facades\DB;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = DB::select('select * from users');
        $editors = DB::select('select * from editors');
        return view('admin.addeditor',compact('users','editors'));
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
     * @param  \App\Http\Requests\StoreEditorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditorRequest $request)
    {
      $editor = new Editor;

      $editor->user_id = $request->id;


      $editor->save();

      return redirect()->route('editor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function show(Editor $editor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function edit(Editor $editor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEditorRequest  $request
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      echo "$id";
      $affected = DB::update(
          'update users set level = 2 where name = ?',
          [$id]
      );
      echo "successs";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deleted = Editor::where('user_id',$id)->delete();
      return back();
    }
}
