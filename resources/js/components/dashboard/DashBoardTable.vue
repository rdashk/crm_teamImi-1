<template>
    <div class="d-flex flex-column container table-bordered col-12 pl-0 pr-0 text-center" id="table">
        <div class="d-flex flex-row container col-12 pl-0 pr-0 mt-1 mb-1 fw-bold">
            <Column value="Имя" class="col-2 text-center pl-0 pr-0" v-on:sort="sortByName"
                    v-on:deleteFromSort="deleteName"></Column>
            <Column value="E-mail" class="col-2 text-center pl-0 pr-0" v-on:sort="sortByEmail"
                    v-on:deleteFromSort="deleteEmail"></Column>
            <Column value="Позиция" class="col-2 text-center pl-0 pr-0" v-on:sort="sortByPosition"
                    v-on:deleteFromSort="deletePosition"></Column>
            <Column value="Уровень" class="col-2 text-center pl-0 pr-0" v-on:sort="sortByLevel"
                    v-on:deleteFromSort="deleteLevel"></Column>
            <Column value="Дата" class="col-2 text-center pl-0 pr-0" v-on:sort="sortByDate"
                    v-on:deleteFromSort="deleteDate"></Column>
            <Column value="Решение" class="col-2 text-center pl-0 pr-0" v-on:sort="sortByDecision"
                    v-on:deleteFromSort="deleteDecision"></Column>
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
            fields: {
                'name': false,
                'email': false,
                'position': false,
                'level': false,
                'date': false,
                'decision': false,
            },
            sortingColumns: new Set(),
            ctrlPress: false,
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
        sortByName(event) {
            this.fields['name'] = !this.fields['name'];
            this.sortingColumns.add('name');
            this.sortData();
        },
        deleteName() {
            this.sortingColumns.delete('name');
            this.sortData();
        },
        sortByEmail(event) {
            this.fields['email'] = !this.fields['email'];
            this.sortingColumns.add('email');
            this.sortData();
        },
        deleteEmail() {
            this.sortingColumns.delete('email');
            this.sortData();
        },
        sortByPosition(event) {
            this.fields['position'] = !this.fields['position'];
            this.sortingColumns.add('position');
            this.sortData();
        },
        deletePosition() {
            this.sortingColumns.delete('position');
            this.sortData();
        },
        sortByLevel(event) {
            this.fields['level'] = !this.fields['level'];
            this.sortingColumns.add('level');
            this.sortData();
        },
        deleteLevel() {
            this.sortingColumns.delete('level');
            this.sortData();
        },
        sortByDate() {
            this.fields['date'] = !this.fields['date'];
            this.sortingColumns.add('date');
            this.sortData();
        },
        deleteDate() {
            this.sortingColumns.delete('date');
            this.sortData();
        },
        sortByDecision(event) {
            this.fields['decision'] = !this.fields['decision'];
            this.sortingColumns.add('decision');
            this.sortData();
        },
        deleteDecision() {
            this.sortingColumns.delete('decision');
            this.sortData();
        },
        sortData() {
            console.log(this.sortingColumns);
            let request = "";
            let key = 0;
            for (let item of this.sortingColumns) {
                console.log(item);
                let comma = !(key === this.sortingColumns.length - 1 || key === 0);
                request += (comma ? "," : "") + (this.fields[item] ? item : "-" + item);
                key++;
            }
            // axios
            //     .get('http://127.0.0.1:8000/api/briefs?sort=' + request)
            //     .then(response => (this.rows = response.data))
            console.log("request: " + request)
        },
    }
    ,
}

</script>

<style scoped>

</style>
