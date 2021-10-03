<template>
    <div class="d-flex flex-column container table-bordered col-12 pl-0 pr-0 text-center" id="table">
        <div class="d-flex flex-row container col-12 pl-0 pr-0 mt-1 mb-1 fw-bold">
            <Column value="Имя" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="name" :filter="false"></Column>
            <Column value="E-mail" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="email" :filter="false"></Column>
            <Column value="Позиция" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="position" :filter="true"></Column>
            <Column value="Уровень" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="level" :filter="true"></Column>
            <Column value="Дата" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="date" :filter="true"></Column>
            <Column value="Решение" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0" data="decision" :filter="true"></Column>
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
        };
    },
    props: {
        columns: String,
    },
    created() {
        axios
            .get('http://127.0.0.1:8000/api/normal-briefs')
            .then(response => (this.rows = response.data));
    },
    methods: {
    },
}

</script>

<style scoped>

</style>
