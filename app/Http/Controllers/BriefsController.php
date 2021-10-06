<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Decision;
use App\Models\Level;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use VerumConsilium\Browsershot\PDF;

class BriefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return new Response(view("briefs.view"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return new Response(view("briefs.create")->with([
            'levels' => Level::pluck("name", "id"),
            'positions' => Position::pluck("name", "id"),
            'decisions' => Decision::pluck("name", "id"),
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
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

        return redirect('/briefs/');
    }

    /**
     * Display the specified resource.
     *
     * @param Brief $brief
     * @return Response
     * @throws \Throwable
     */
    public function show(Brief $brief): Response
    {
        /* скачивание pdf
        return (new PDF)->loadView('briefs.show', compact('brief'))
            ->margins(20, 0, 0, 20)
            ->download();*/
        return new Response(view("briefs.show")->with("brief", $brief));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brief $brief
     * @return Response
     */
    public function edit(Brief $brief): Response
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
     */
    public function update(Request $request, Brief $brief)
    {
        $brief->update($request->all());
        return redirect()->back();
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
