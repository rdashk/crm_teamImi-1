@extends("template")
@section("title")
    Резюме
@endsection
<?php
use App\Models\Brief;
/**
 * @var Brief[] $briefs
 */
?>
@section("content")
    @foreach($briefs as $brief)
        <div class="item">
            <div>{{$brief->name}}</div>
            <div>{{$brief->getLevelName()}}</div>
            <div>{{$brief->getDecisionName()}}</div>
            <div>{{$brief->getPositionName()}}</div>
            <div>{{$brief->email}}</div>
        </div>
    @endforeach
@endsection
