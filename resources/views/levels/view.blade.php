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
    <a class="btn col-auto btn-outline-dark mb-3" href="/levels/create">Добавить уровень</a>
    <div id="toolTable" class="container col-5">
        <v-tool-table columns="id name" resource="levels"></v-tool-table>
    </div>
@endsection

@push('scripts')
    <script>
        const table = new Vue({
            el: "#toolTable",
        })
    </script>
@endpush
