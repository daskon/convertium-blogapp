<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Accept;
use App\Models\Draft;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts on front-end
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::select('select * from blogs');
        $accepts = DB::select('select * from accepts');
        $drafts = DB::select('select * from drafts');
        return view('admin.listblog',compact('blogs','accepts','drafts'));
    }

    /**
     * Show the form for creating a new blog post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editor.createblog');
    }

    /**
     * create editor blog post
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        if ($request->hasfile('image'))
        {
            //validate input data
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'editor' => 'required|string|max:1000',
            ]);

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        }
        else
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required',
                'editor' => 'required|string|max:1000',
            ]);

            $imageName = $request->img;
        }

        $obj = new Blog;

        $obj->title = $request->title;
        $obj->editor_id = $request->editor_id;
        $obj->image = $imageName;
        $obj->content = $request->editor;
        $obj->save();

        $id = $request->draft_id;

        if ($id != "") {
            Draft::where('id',$id)->delete();
            return back();
        }

        return back()
            ->with('success','You have successfully created the blog post.')
            ->with('image',$imageName);
    }

    /**
     * show blog post publicly
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
     * edit publish post
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
     * Update blog post contents
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        if ($request->hasfile('image'))
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'editor' => 'required|string|max:1000',
            ]);

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        }
        else
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required',
                'editor' => 'required|string|max:1000',
            ]);

            $imageName = $request->img;
        }

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->editor_id = $request->editor_id;
        $blog->image = $imageName;
        $blog->content = $request->editor;
        $blog->update();

        return back();
    }

    /**
     * delete blog posts
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Blog::where('id',$id)->delete();
      Accept::where('blog_id',$id)->delete();
      return back();
    }
}
