<?php

namespace App\Http\Controllers;

use App\Models\Accept;
use App\Http\Requests\StoreAcceptRequest;
use App\Http\Requests\UpdateAcceptRequest;

class AcceptController extends Controller
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
     * @param  \App\Http\Requests\StoreAcceptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcceptRequest $request)
    {
        $ac = new Accept;

        $ac->blog_id = $request->id;
        $ac->publish_date = $request->publish_date;

        $ac->save();

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accept  $accept
     * @return \Illuminate\Http\Response
     */
    public function show(Accept $accept)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accept  $accept
     * @return \Illuminate\Http\Response
     */
    public function edit(Accept $accept)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcceptRequest  $request
     * @param  \App\Models\Accept  $accept
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcceptRequest $request, Accept $accept)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accept  $accept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accept $accept)
    {
        //
    }
}
