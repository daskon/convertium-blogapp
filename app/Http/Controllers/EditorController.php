<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Http\Requests\StoreEditorRequest;
use Illuminate\Support\Facades\DB;

class EditorController extends Controller
{
    /**
     * show list of all the members
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
     * assign user as an editor
     *
     * @param  \App\Http\Requests\StoreEditorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditorRequest $request)
    {
      $obj = new Editor;
      $obj->user_id = $request->id;
      $obj->save();
      return redirect()->route('editor.index');
    }


    /**
     * assign editor role
     *
     * @param  \App\Http\Requests\UpdateEditorRequest  $request
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      //echo "$id";
      DB::update('update users set level = 2 where name = ?',[$id]);
      //echo "successs";
    }

    /**
     * revoke editor privillages
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Editor::where('user_id',$id)->delete();
      return back();
    }
}
