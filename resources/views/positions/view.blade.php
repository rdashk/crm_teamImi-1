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
    <a class="btn col-auto btn-outline-dark mb-3" href="/positions/create">Добавить позицию</a>
    <div id="toolTable" class="container col-5">
        <v-tool-table columns="id name" resource="positions"></v-tool-table>
    </div>
@endsection

@push('scripts')
    <script>
        const table = new Vue({
            el: "#toolTable",
        })
    </script>
@endpush
