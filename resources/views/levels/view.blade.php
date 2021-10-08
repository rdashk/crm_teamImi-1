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

{{--    {{Form::open(["action" => 'App\Http\Controllers\LevelsController@store', "method" => "POST", "class" => "container"])}}--}}
{{--    @csrf--}}

    <div class="container col-5">
        <div class="form-group">
            <div class="row mb-3">
                <div class="col">
{{--                    {{Form::text("new_level", null, ["placeholder" => "Новый уровень", "class" => "form-control", "id"=>"new_level"])}}--}}
                    <input type="text" placeholder="Новый уровень" class="form-control" id="new_level">
                </div>
                <div class="col" id="submit">
                    <button type="submit" class="btn btn-outline-dark" v-on:click="click">
                        <span v-if="!load">Добавить</span>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="load"></span>
                    </button>
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

        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]');

        const button = new Vue({
            el: "#submit",
            data: {
                load: false
            },
            methods: {
                click(){
                    let elem = document.getElementById('new_level');
                    if (elem.value === "") return;
                    this.load = true;
                    elem.disabled = true;
                    axios
                        .post(window.location.origin + '/api/levels', {name: elem.value})
                        .then(response => {
                            console.log(response.data);
                            this.load = false;
                            elem.value = "";
                            elem.disabled = false;
                            table.$children[0].load();
                        })
                        .catch(err => {
                            console.log(err)
                            this.load = false;
                        })
                }
            }
        })
    </script>
@endpush
