<template>
    <div class="d-flex flex-column container table-bordered col-xl pl-0 pr-0" id="table">
        <div class="d-flex flex-row container col-12 pl-0 pr-0">
            <Column value="Имя" class="col-3 text-center"></Column>
            <Column value="E-mail" class="col-2 text-center"></Column>
            <Column value="Позиция" class="col-1 text-center"></Column>
            <Column value="Уровень" class="col-2 text-center"></Column>
            <Column value="Дата" class="col-2 text-center"></Column>
            <Column value="Решение" class="col-2 text-center"></Column>
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
            columnss: [],
        };
    },
    props: {
        columns: String,
    },
    created() {
        axios
            .get('http://127.0.0.1:8000/api/normal-briefs')
            .then(response => (this.rows = response.data));
        this.columnss = this.columns.split(" ");
    },
    methods: {

    },
}

</script>

<style scoped>

</style>
