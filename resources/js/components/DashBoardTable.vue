<template>
    <div class="d-flex flex-column container table-bordered col-xl pl-0 pr-0" id="table">
        <div class="d-flex flex-row container col-12 pl-0 pr-0">
            <DashBoardColumn id="thName" value="Имя" class="col-3 text-center"></DashBoardColumn>
            <DashBoardColumn id="thEmail" value="E-mail" class="col-2 text-center"></DashBoardColumn>
            <DashBoardColumn id="thPosition" value="Позиция" class="col-1 text-center"></DashBoardColumn>
            <DashBoardColumn id="thLevel" value="Уровень" class="col-2 text-center"></DashBoardColumn>
            <DashBoardColumn id="thDate" value="Дата" class="col-2 text-center"></DashBoardColumn>
            <DashBoardColumn id="thDecision" value="Решение" class="col-2 text-center"></DashBoardColumn>
        </div>
        <div v-for="$data in this.rows">
            <DashBoardTableRow v-bind="$data">
            </DashBoardTableRow>
        </div>
    </div>
</template>

<script>

import DashBoardTableRow from "./DashBoardTableRow";
import DashBoardColumn from "./DashBoardColumn";

export default {
    name: "DashBoardTable",
    components: {DashBoardColumn, DashBoardTableRow},
    data() {
        return {
            rows: [],
        };
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
