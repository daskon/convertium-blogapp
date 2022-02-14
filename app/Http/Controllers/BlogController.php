<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Accept;
use App\Models\Draft;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::select('select * from blogs');
        $accepts = DB::select('select * from accepts');
        return view('admin.listblog',compact('blogs','accepts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editor.createblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
      //upload file
      $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

      //store data to the database

      $blog = new Blog;

      $blog->title = $request->title;
      $blog->editor_id = $request->editor_id;
      $blog->image = $imageName;
      $blog->content = $request->editor;


      $blog->save();

      $id = $request->draft_id;

        if ($id != "") {
            $deleted = Draft::where('id',$id)->delete();
            return back();
        }


      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $blogs = DB::select('select * from blogs where id = ?',[$id]);
      return view('viewblog',compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = DB::select('select * from blogs where id = ?',[$id]);
        return view('editor.editblog', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
      $blog = Blog::find($id);

      $blog->title = $request->title;
      $blog->editor_id = $request->editor_id;

      $blog->content = $request->editor;


      $blog->update();

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deleted = Blog::where('id',$id)->delete();
      $deleted = Accept::where('blog_id',$id)->delete();
      return back();
    }
}
