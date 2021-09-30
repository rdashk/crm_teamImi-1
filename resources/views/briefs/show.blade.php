<?php

use App\Models\Brief;

/**
 * @var Brief $brief
 */
?>
@extends("template")
@section("title")
    Просмотр резюме
@endsection

@section('content')
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">Имя</th>
            <td>{{$brief->name}}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{$brief->email}}</td>
        </tr>
        <tr>
            <th scope="row">Позиция</th>
            <td>{{json_decode($brief->position()->get('name')[0], true)['name']}}</td>
        </tr>
        <tr>
            <th scope="row">Уровень</th>
            <td>{{json_decode($brief->level()->get('name')[0], true)['name']}}</td>
        </tr>
        <tr>
            <th scope="row">Дата</th>
            <td>{{$brief->interview_date}}</td>
        </tr>
        <tr>
            <th scope="row">Ключевые навыки</th>
            <td class="text-truncate" data-toggle="collapse"
                data-target="#skills" aria-expanded="false" aria-controls="collapseExample">
                {{$brief->skills}}
                <div class="collapse" id="skills">
                    <div class="card card-body">
                        {{$brief->skills}}
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">Резюме</th>
            <td data-toggle="collapse"
                data-target="#text" aria-expanded="false" aria-controls="collapseExample">
                {{$brief->text}}
                <div class="collapse" id="text">
                    <div class="card card-body">
                        {{$brief->text}}
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">Опыт</th>
            <td data-toggle="collapse"
                data-target="#experience" aria-expanded="false" aria-controls="collapseExample">
                {{$brief->experience}}
                <div class="collapse" id="experience">
                    <div class="card card-body">
                        {{$brief->experience}}
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <a type="button" class="btn btn-outline-dark col-auto" href="./{{$brief->id}}/edit">Редактировать</a>
            {{Form::open(["action" => ['App\Http\Controllers\BriefsController@destroy', $brief->id], "method" => "DELETE", "class"=>"col-2"])}}
            {{Form::submit("Удалить", ["class" => "btn btn-outline-danger"])}}
            {{Form::close()}}
        </div>
    </div>
@endsection

