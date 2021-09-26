@extends("template")
@section("title")
    DashBoard
@endsection
<?php
use App\Models\Brief;
/**
 * @var Brief[] $briefs
 */
?>
@section("content")
    <a class="btn btn-outline-dark mb-3" href="/briefs/create">Добавить резюме</a>
    <table class="table vertical table-bordered">
        <thead>
        <tr>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Позиция</th>
            <th>Уровень</th>
            <th>Дата</th>
            <th>Решение</th>
        </tr>
        </thead>
        <tbody>
        @foreach($briefs as $brief)
            <tr class="item" onclick="document.location = '/briefs/{{$brief->id}}'" onmouseover="this.className='item table-active'" onmouseleave="this.className='item'" style="cursor: pointer;">
                <td data-label="name">{{$brief->name}}</td>
                <td data-label="email">{{$brief->email}}</td>
                <td data-label="position">{{$brief->getPositionName()}}</td>
                <td data-label="level">{{$brief->getLevelName()}}</td>
                <td data-label="interview_date">{{$brief->interview_date}}</td>
                <td data-label="decision">{{$brief->getDecisionName()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
