<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // funtion to view welcome page
    public function welcome()
    {
      $blogs = DB::select('select * from blogs');
      $accepts = DB::select('select * from accepts');
      return view('welcome',compact('blogs','accepts'));
    }

    // function to redirect user to there pages
    public function index()
    {
      $editors = DB::select('select * from editors');

        if (Auth::user()->level == 1) {

          $users = DB::table('users')->count();
          $userdata = DB::select('select * from users');

          return view('admin.home', compact('users','userdata'));
        } else {

                foreach ($editors as $e) {
                    if (Auth::user()->id == $e->user_id && Auth::user()->level == 3) {

                      return view('editor.home');
                    }
                    elseif(Auth::user()->id == $e->user_id && Auth::user()->level == 3){
                        $blogs = DB::select('select * from blogs');
                      $accepts = DB::select('select * from accepts');
                      return view('user',compact('blogs','accepts'));
                    }

                }
                $blogs = DB::select('select * from blogs');
                      $accepts = DB::select('select * from accepts');
                      return view('user',compact('blogs','accepts'));



        }
    }


    public function viewblog()
    {
        $id = Auth::user()->id;
        $blogs = DB::select('select * from blogs where editor_id = ?',[$id]);
        $accepts = DB::select('select * from accepts');
        $drafts = DB::select('select * from drafts where editor_id = ?',[$id]);
        return view('editor.view',compact('blogs','accepts','drafts'));
    }


}
