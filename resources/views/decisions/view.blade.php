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
    @foreach($decisions as $id => $decision)
        <div class="item">
            <div>{{$id}}</div>
            <div>{{$decision}}</div>
        </div>
    @endforeach
@endsection
