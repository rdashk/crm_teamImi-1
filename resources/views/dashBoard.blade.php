DASHBOARD
<br/>
<?php
    use App\Models\Position;
/**
 * @var \App\Models\Brief $brief
 */
?>
@foreach($briefs as $brief)
    {{$brief->name}} : {{Position::find($brief->position)->name}} : {{\App\Models\Level::find($brief->level)->name}} : {{\App\Models\Decision::find($brief->decision)->name}}
@endforeach
