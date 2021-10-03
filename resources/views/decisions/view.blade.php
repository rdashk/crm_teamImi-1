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
    <div class="col-sm-6">
        <input type="text" name="new_decision" id="new_decision" class="form-control" placeholder="Новое решение" value="{{ old('decision') }}">
    </div>
    <a class="btn col-auto btn-outline-dark mb-3" href="/decisions/create">Добавить</a>

    <div id="toolTable" class="container col-5">
        <v-tool-table columns="id name" resource="decisions"></v-tool-table>
    </div>
@endsection

@push('scripts')
    <script>
        const table = new Vue({
            el: "#toolTable",
        })
    </script>
@endpush
