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
    <a class="btn col-4 btn-outline-dark mb-3" href="/briefs/create">Добавить резюме</a>
    <div id="dashboardTable">
        <v-db-table></v-db-table>
    </div>
{{--    <table class="table vertical table-bordered" id="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th id="thName">Имя <i class="arrow up"></i> <i class="arrow down"></i></th>--}}
{{--            <th id="thEmail">E-mail <i class="arrow up"></i> <i class="arrow down"></i></th>--}}
{{--            <th id="thPosition">Позиция <i class="arrow up"></i> <i class="arrow down"></i></th>--}}
{{--            <th id="thLevel">Уровень <i class="arrow up"></i> <i class="arrow down"></i></th>--}}
{{--            <th id="thDate">Дата <i class="arrow up"></i> <i class="arrow down"></i></th>--}}
{{--            <th id="thDecision">Решение <i class="arrow up"></i> <i class="arrow down"></i></th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($briefs as $brief)--}}
{{--            <tr class="item" onclick="document.location = '/briefs/{{$brief->id}}'"--}}
{{--                onmouseover="this.className='item table-active'" onmouseleave="this.className='item'"--}}
{{--                style="cursor: pointer;">--}}
{{--                <td data-label="name">{{$brief->name}}</td>--}}
{{--                <td data-label="email">{{$brief->email}}</td>--}}
{{--                <td data-label="position">{{$brief->getPositionName()}}</td>--}}
{{--                <td data-label="level">{{$brief->getLevelName()}}</td>--}}
{{--                <td data-label="interview_date">{{$brief->interview_date}}</td>--}}
{{--                <td data-label="decision">{{$brief->getDecisionName()}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
@endsection

@push('scripts')
<script>
    const table = new Vue({
        el: "#dashboardTable",
    })
</script>
@endpush
