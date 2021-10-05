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
    
    {{Form::open(["action" => 'App\Http\Controllers\DecisionsController@store', "method" => "POST", "class" => "container"])}}
    @csrf

    <div class="container col-5">
        <div class="form-group">
            <div class="row mb-3">
                <div class="col">
                    {{Form::text("new_decision", null, ["placeholder" => "Новое решение", "class" => "form-control", "id"=>"new_decision"])}}
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-outline-dark">Добавить</button>
                </div>
            </div>
        </div>
    </div>

    {{Form::close()}}

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
