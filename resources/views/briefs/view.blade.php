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
    <a class="btn col-auto btn-outline-dark mb-3" href="/briefs/create">Добавить резюме</a>
    <div id="dashboardTable" class="container col-11">
        <v-db-table columns="Имя E-mail Позиция Уровень Дата Решение"></v-db-table>
    </div>
@endsection

@push('scripts')
<script>
    const table = new Vue({
        el: "#dashboardTable",
    })
</script>
@endpush
