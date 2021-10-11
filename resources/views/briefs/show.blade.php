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
    <div class="container table table-bordered">
        <div class="row border-bottom">
            <div class="col-4 h4 border-right mb-0 pb-2">
                Имя
            </div>
            <div class="col-8">
                {{$brief->name}}
            </div>
        </div>
        <div class="row border-bottom">
            <div class="col-4 h4 border-right mb-0 pb-2">
                E-mail
            </div>
            <div class="col-8">
                {{$brief->email}}
            </div>
        </div>
        <div class="row border-bottom">
            <div class="col-4 h4 border-right mb-0 pb-2">
                Позиция
            </div>
            <div class="col-8">
                {{json_decode($brief->position()->get('name')[0], true)['name']}}
            </div>
        </div>
        <div class="row border-bottom">
            <div class="col-4 h4 border-right mb-0 pb-2">
                Уровень
            </div>
            <div class="col-8">
                {{json_decode($brief->level()->get('name')[0], true)['name']}}
            </div>
        </div>
        <div class="row border-bottom">
            <div class="col-4 h4 border-right mb-0 pb-2">
                Дата
            </div>
            <div class="col-8">
                {{$brief->interview_date}}
            </div>
        </div>
        <div class="row border-bottom">
            <div class="col-4 h4 border-right mb-0 pb-2">
                Ключевые навыки
            </div>
            <div class="col-8" data-toggle="collapse"
                 data-target="#skills" aria-expanded="false" aria-controls="collapseExample">
                <div class="text-truncate" style="max-height: 5em;">
                    <?= ($brief->skills) ?>
                </div>
                <div class="collapse" id="skills">
                    <div class="card card-body w-100">
                        <?= $brief->skills ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-bottom">
            <div class="col-4 h4 border-right mb-0 pb-2">
                Резюме
            </div>
            <div class="col-8" data-toggle="collapse"
                 data-target="#text" aria-expanded="false" aria-controls="collapseExample">
                <div class="text-truncate" style="max-height: 5em;">
                    <?= ($brief->text) ?>
                </div>
                <div class="collapse" id="text">
                    <div class="card card-body container">
                        <?= $brief->text ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 h4 border-right mb-0 pb-2">
                Опыт
            </div>
            <div class="col-8" data-toggle="collapse"
                 data-target="#exp" aria-expanded="false" aria-controls="collapseExample">
                <div class="text-truncate" style="max-height: 5em;">
                    <?= ($brief->experience) ?>
                </div>
                <div class="collapse" id="exp">
                    <div class="card card-body container">
                        <?= $brief->experience ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <a type="button" class="btn btn-outline-dark col-auto mr-2" href="./{{$brief->id}}/edit">Редактировать</a>

            <a type="button" class="btn btn-outline-dark col-auto mr-2" href="{{route("pdf", $brief)}}">PDF</a>

            {{Form::open(["action" => ['App\Http\Controllers\BriefsController@destroy', $brief->id], "method" => "DELETE", "class"=>"col-2 pl-0"])}}
            {{Form::submit("Удалить", ["class" => "btn btn-outline-danger"])}}
            {{Form::close()}}
        </div>
    </div>
@endsection

