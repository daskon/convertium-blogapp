<?php

namespace App\Http\Controllers;

use App\Models\Accept;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{    

    /**
     * show all the blog post
     *
     * @return void
     */
    public function welcome()
    {
      $blogs = Blog::all();
      $accepts = Accept::all();
      return view('welcome',compact('blogs','accepts'));
    }

    /**
     * function to redirect user to there pages based on the user level
     *
     * @return void
     */
    public function index()
    {

      if (Auth::user() == true) 
      {
        $editors = DB::select('select * from editors');

        if (Auth::user()->level == 1) 
        {

          $users = DB::table('users')->count();
          $userdata = DB::select('select * from users');

          return view('admin.home', compact('users','userdata'));
        } 
        else 
        {

          foreach ($editors as $e) 
          {
              if (Auth::user()->id == $e->user_id && Auth::user()->level == 3) 
              {

                return view('editor.home');
              }
              elseif(Auth::user()->id == $e->user_id && Auth::user()->level == 3)
              {

                return view('user');
              }
          }
            return view('user');
        }
      }
      else
      {
        return redirect()->route('login');
      }
    }

    
    /**
     * view blog post
     *
     * @return void
     */
    public function viewBlogPost()
    {
        $id = Auth::user()->id;
        $blogs = DB::select('select * from blogs where editor_id = ?',[$id]);
        $accepts = DB::select('select * from accepts');
        $drafts = DB::select('select * from drafts where editor_id = ?',[$id]);
        return view('editor.view',compact('blogs','accepts','drafts'));
    }
}
