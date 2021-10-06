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

    <div class="container col-5">
        <div class="form-group">
            <div class="row mb-3">
                <div class="col">
                    <input type="text" placeholder="Новое решение" class="form-control" id="new_decision">
                </div>
                <div class="col" id="submit">
                    <button type="submit" class="btn btn-outline-dark" v-if="!load" v-on:click="click">Добавить</button>
                    <div class="spinner-border btn btn-outline-dark" role="status" v-if="load">
                        <span class="sr-only"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="toolTable" class="container col-5">
        <v-tool-table columns="id name" resource="decisions"></v-tool-table>
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
                    this.load = true;
                    let elem = document.getElementById('new_decision');
                    elem.disabled = true;
                    axios
                        .post('http://127.0.0.1:8000/api/decisions', {name: elem.value})
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
