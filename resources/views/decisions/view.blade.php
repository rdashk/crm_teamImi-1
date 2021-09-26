@extends("template")
@section("title")
    Решения
@endsection

<?php
use App\Models\Decision;
/**
 * @var Decision[] $decisions
 */
?>
@section("content")
    @foreach($decisions as $decision)
        <div class="item">
            <div>{{$decision->id}}</div>
            <div>{{$decision->name}}</div>
        </div>
    @endforeach
@endsection
