<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Decision;
use Illuminate\Http\Request;

class DecisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Decision::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $decision = new Decision($request->all());
        $decision->save();
        return $decision;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Decision::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $decision = Decision::findOrFail($id);
        $decision->update($request->all());

        return $decision;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $decision = Decision::findOrFail($id);
        $decision->delete();
        return '';
    }
}
