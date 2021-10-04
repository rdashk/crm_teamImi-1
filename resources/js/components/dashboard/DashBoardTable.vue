<template>
    <div class="d-flex flex-column container table-bordered col-12 pl-0 pr-0 text-center" id="table">
        <div class="d-flex flex-row container col-12 pl-0 pr-0 mt-1 mb-1 fw-bold">
            <Column value="Имя" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="name" :filter="false" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="E-mail" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="email" :filter="false" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="Позиция" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="position" :filter="true" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="Уровень" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="level" :filter="true" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="Дата" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="date" :filter="true" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="Решение" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="decision" :filter="true" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
        </div>
        <div v-for="$data in this.rows">
            <TableRow v-bind="$data">
            </TableRow>
        </div>
    </div>
</template>

<script>

import TableRow from "./TableRow";
import Column from "./Column";

export default {
    name: "DashBoardTable",
    components: {Column, TableRow},
    data() {
        return {
            rows: [],
            request: 'http://127.0.0.1:8000/api/briefs',
            req: "",
            sorts: [],
            filters: [],
        };
    },
    props: {
        columns: String,
    },
    created() {
        this.load();
    },
    methods: {
        load(req = ''){
            this.req = req;
            axios
                .get(this.request + req)
                .then(response => (this.rows = response.data));
        },
        changes(arr){
            if (arr.hasOwnProperty('sorts')) {
                this.sorts[arr['sorts']['data']] = arr['sorts']['name'];
                let req = Object.values(this.sorts).join();
                this.load("?sorts="+req);
            }
            if (arr.hasOwnProperty('filters')) {
                console.log('filter');
            }
        },
        deleteFromSort(name){
            delete this.sorts[name];
            let req = Object.values(this.sorts).join();
            if (this.sorts.length !== 0) this.load('?sorts='+req);
        }
    },
}

</script>

<style scoped>

</style>
