<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Decision;
use App\Models\Level;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;

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
            'name' => 'bail|required|max:255',
            'position_id' => 'bail|required',
            'email' => 'bail|required|email:filter|max:255|unique:briefs',
            'level_id' => 'bail|required',
            'skills' => 'bail|required|max:2000',
            'text' => 'bail|required|max:8000',
            'experience' => 'bail|required|max:10000',
            'decision_id' => 'bail|required',
        ], [
            'name.required' => 'Заполните ФИО',
            'position_id.required' => 'Заполните поле позиция',
            'email.required' => 'Заполните поле email',
            'level_id.required' => 'Заполните поле уровень',
            'skills.required' => 'Заполните поле навыки',
            'experience.required' => 'Заполните поле опыт',
            'decision_id.required' => 'Заполните поле решение',
            'text.required' => 'Заполните поле резюме',

            'email.unique' => 'Кандидат с таким именем уже существует! Введите другой email',

            'email.email' => 'Введите корректный email',
            'email.max' => 'Кол-во символов в EMAIL не более 255',
            'skills.max' => 'Кол-во символов в КЛЮЧЕВЫХ НАВЫКАХ не более 2000',
            'text.max' => 'Кол-во символов в РЕЗЮМЕ не более 8000',
            'experience.max' => 'Кол-во символов в ОПЫТЕ не более 10000',
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
        //return $this->download($brief);
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
        $request->validate([
            'name' => 'bail|required|max:255',
            'position_id' => 'bail|required',
            'email' => 'bail|required|email:filter|max:255|unique:briefs,id,'.$brief->id,
            'level_id' => 'bail|required',
            'skills' => 'bail|required|max:2000',
            'text' => 'bail|required|max:8000',
            'experience' => 'bail|required|max:10000',
            'decision_id' => 'bail|required',
        ], [
            'name.required' => 'Заполните ФИО',
            'position_id.required' => 'Заполните поле позиция',
            'level_id.required' => 'Заполните поле уровень',
            'skills.required' => 'Заполните поле навыки',
            'experience.required' => 'Заполните поле опыт',
            'decision_id.required' => 'Заполните поле решение',
            'text.required' => 'Заполните поле резюме',

            'email.unique' => 'Кандидат с таким именем уже существует! Введите другой email',
            'email.email' => 'Введите корректный email',
            'email.max' => 'Кол-во символов в EMAIL не более 255',
            'skills.max' => 'Кол-во символов в КЛЮЧЕВЫХ НАВЫКАХ не более 2000',
            'text.max' => 'Кол-во символов в РЕЗЮМЕ не более 8000',
            'experience.max' => 'Кол-во символов в ОПЫТЕ не более 10000',
        ]);
        $brief->update($request->all());
        return redirect("briefs/$brief->id");
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

    public function download(Brief $brief)
    {
        $name = str_replace(" ", "_", $brief->name) . "_" . strtoupper($brief->position->name);
        $pdf = PDF::loadView('briefs.topdf', compact('brief'));
        return $pdf->download("$name.pdf");
    }
}
