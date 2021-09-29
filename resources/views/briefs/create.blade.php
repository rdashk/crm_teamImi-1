@extends("template")

@section("title")
    Добавить резюме
@endsection
<?php
use App\Http\Controllers\BriefsController;
use App\Models\Decision;
use App\Models\Level;
use App\Models\Position;
use Carbon\Carbon;
?>
@section("content")
    {{Form::open(["action" => 'App\Http\Controllers\BriefsController@store', "method" => "POST", "class" => "container"])}}
    @csrf
    <div class="form-group">

        @include('errors')

        <label for="name">Имя</label>
        {{Form::text("name", null, ["placeholder" => "Имя", "class" => "form-control", "id"=>"name"])}}
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        {{Form::text("email", null, ["placeholder" => "E-mail", "class" => "form-control", "id"=>"email"])}}
    </div>
    <div class="form-group">
        <label for="position_id">Позиция</label>
        {{Form::select("position_id", Position::getIdName(), null, ["class" => "form-control", "id"=>"position_id"])}}
    </div>
    <div class="form-group">
        <label for="level_id">Уровень</label>
        {{Form::select("level_id", Level::getIdName(), null, ["class" => "form-control", "id"=>"level_id"])}}
    </div>
    <div class="form-group">
        <label for="decision_id">Решение</label>
        {{Form::select("decision_id", Decision::getIdName(), null, ["class" => "form-control", "id"=>"decision_id"])}}
    </div>
    <div class="form-group">
        <label for="interview_date">Дата собеседования</label>
        {{Form::date("interview_date", null, ["class" => "form-control", "id"=>"interview_date"])}}
    </div>
    <div class="form-group">
        <label for="skills">Ключевые навыки</label>
        {{Form::text("skills", null, ["placeholder" => "Ключевые навыки", "class" => "form-control", "id"=>"skills"])}}
    </div>
    <div class="form-group">
        <label for="experience">Опыт работы</label>
        {{Form::text("experience", null, ["placeholder" => "Опыт работы", "class" => "form-control", "id"=>"experience"])}}
    </div>
    <div class="form-group">
        <label for="text">Резюме</label>
        {{Form::text("text", null, ["placeholder" => "Резюме", "class" => "form-control", "id"=>"text"])}}
    </div>
    <div class="form-group">
        {{Form::submit("Отправить", ["class" => "btn form-control btn-outline-dark"])}}
    </div>
    {{Form::close()}}
@endsection
