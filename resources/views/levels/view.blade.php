@extends("template")
@section("title")
    Уровни
@endsection

<?php
use App\Models\Level
/**
 * @var Level[] $levels
 */
?>
@section("content")
    @foreach($levels as $level)
        <div class="item">
            <div>{{$level->id}}</div>
            <div>{{$level->name}}</div>
        </div>
    @endforeach
@endsection
