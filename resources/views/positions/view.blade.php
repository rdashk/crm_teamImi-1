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
    @foreach($positions as $id => $position)
        <div class="item">
            <div>{{$id+1}}</div>
            <div>{{$position}}</div>
        </div>
    @endforeach
@endsection
