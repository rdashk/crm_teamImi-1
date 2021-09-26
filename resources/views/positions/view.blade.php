@extends("template")
@section("title")
    Позиции
@endsection

<?php
use App\Models\Position
/**
 * @var Position[] $positions
 */
?>
@section("content")
    @foreach($positions as $position)
        <div class="item">
            <div>{{$position->id}}</div>
            <div>{{$position->name}}</div>
        </div>
    @endforeach
@endsection
