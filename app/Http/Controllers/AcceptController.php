<?php

namespace App\Http\Controllers;

use App\Models\Accept;
use App\Http\Requests\StoreAcceptRequest;

class AcceptController extends Controller
{

    /**
     * accept and publish editor's blog post
     *
     * @param  \App\Http\Requests\StoreAcceptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcceptRequest $request)
    {
        $obj = new Accept;
        $obj->blog_id = $request->id;
        $obj->publish_date = $request->publish_date;
        $obj->due_date = $request->due_date;

        $obj->save();

        return redirect()->route('blog.index');
    }
}
