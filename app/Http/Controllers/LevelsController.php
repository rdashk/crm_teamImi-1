<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        dd(Level::all());
        //return new Response(view("levels.view")->with("levels", Level::all()));
        $levels = Level::pluck("name");
        return view('levels.view', compact('levels') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return new Response(view("levels.create"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Level($request->all());

        $model->save();

        return new Response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return Response
     */
    public function show(Level $level)
    {
        return new Response(view("levels.show")->with("level", $level));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return Response
     */
    public function edit(Level $level)
    {
        return new Response(view("levels.edit")->with("level", $level));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $level->update($request->all());

        return new Response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();

        return new Response();
    }
}
