<?php

namespace App\Http\Controllers;

use App\Models\Decision;
use App\Models\Position;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DecisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // сделает из таблицы выборку id и name, отдаст нужную вам структуру
        $decisions = Decision::pluck("name");
        return view('decisions.view', compact('decisions') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return new Response(view('decisions.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $decision = new Decision($request->all());
        $decision->save();
        return new Response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Decision  $decision
     * @return Response
     */
    public function show(Decision $decision)
    {
        return new Response(view('decisions.show')->with("decision", $decision));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decision  $decision
     * @return Response
     */
    public function edit(Decision $decision)
    {
        return new Response(view("decisions.edit")->with("decision", $decision));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Decision  $decision
     * @return Response
     */
    public function update(Request $request, Decision $decision)
    {
        $decision->update($request->all());

        return new Response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Decision  $decision
     * @return Response
     */
    public function destroy(Decision $decision)
    {
        $decision->delete();

        return new Response();
    }
}
