<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BriefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return new Response(view("briefs.view")->with('briefs', Brief::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return new Response(view("briefs.create"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $brief = new Brief($request->all());
        $brief->save();
        return new Response();
    }

    /**
     * Display the specified resource.
     *
     * @param Brief $brief
     * @return Response
     */
    public function show(Brief $brief)
    {
        return new Response(view("briefs.show")->with($brief));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brief $brief
     * @return Response
     */
    public function edit(Brief $brief)
    {
        return new Response(view("briefs.edit")->with($brief));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Brief $brief
     * @return Response
     */
    public function update(Request $request, Brief $brief): Response
    {
        $brief->update($request->all());
        return new Response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brief $brief
     * @return Response
     */
    public function destroy(Brief $brief): Response
    {
        $brief->delete();
        return new Response();
    }
}
