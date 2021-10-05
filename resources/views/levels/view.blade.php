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

    {{Form::open(["action" => 'App\Http\Controllers\LevelsController@store', "method" => "POST", "class" => "container"])}}
    @csrf

    <div class="container col-5">
        <div class="form-group">
            <div class="row mb-3">
                <div class="col">
                    {{Form::text("new_level", null, ["placeholder" => "Новый уровень", "class" => "form-control", "id"=>"new_level"])}}
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-outline-dark">Добавить</button>
                </div>
            </div>
        </div>
    </div>

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
