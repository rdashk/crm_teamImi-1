<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Decision;
use App\Models\Level;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Browsershot\Browsershot;

class BriefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return new Response(view("briefs.view"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return new Response(view("briefs.create")->with([
            'levels' => Level::pluck("name", "id"),
            'positions' => Position::pluck("name", "id"),
            'decisions' => Decision::pluck("name", "id"),
        ]));
        //return Browsershot::html('/briefs/create')->format('A4')->save("name" +'.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $brief = new Brief();
        $values = $request->all([
            "name",
            "position_id",
            "email",
            "level_id",
            "interview_date",
            "skills",
            "text",
            "experience",
            "decision_id",
        ]);
        $brief->fill($values);
        $request->validate([
            'name' => 'bail|required',
            'position_id' => 'bail|required',
            'level_id' => 'bail|required',
            'skills' => 'bail|required',
            'text' => 'bail|required',
            'experience' => 'bail|required',
            'decision_id' => 'bail|required',
        ], [
            'name.required' => 'ФИО',
            'position_id.required' => 'позиция',
            'level_id.required' => 'уровень',
            'skills.required' => 'навыки',
            'experience.required' => 'опыт',
            'decision_id.required' => 'решение',
            'text.required' => 'резюме',
        ]);
        $brief->save();

        return new Response(view("briefs.view")->with("briefs", Brief::all()));
    }

    /**
     * Display the specified resource.
     *
     * @param Brief $brief
     * @return Response
     */
    public function show(Brief $brief)
    {
        return new Response(view("briefs.show")->with("brief", $brief));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brief $brief
     * @return Response
     */
    public function edit(Brief $brief)
    {
        return new Response(view("briefs.edit")->with([
            'brief' => $brief,
            'levels' => Level::pluck("name", "id"),
            'positions' => Position::pluck("name", "id"),
            'decisions' => Decision::pluck("name", "id"),
        ]));
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
        return new Response(view("briefs.show")->with("brief", $brief));
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
        return new Response(redirect("briefs"));
    }
}
