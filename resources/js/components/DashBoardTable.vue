<template>
    <table class="table vertical table-bordered" id="table" @click="console.log(1)">
        <thead>
        <tr>
            <th id="thName">Имя <i class="arrow up"></i> <i class="arrow down"></i></th>
            <th id="thEmail">E-mail <i class="arrow up"></i> <i class="arrow down"></i></th>
            <th id="thPosition">Позиция <i class="arrow up"></i> <i class="arrow down"></i></th>
            <th id="thLevel">Уровень <i class="arrow up"></i> <i class="arrow down"></i></th>
            <th id="thDate">Дата <i class="arrow up"></i> <i class="arrow down"></i></th>
            <th id="thDecision">Решение <i class="arrow up"></i> <i class="arrow down"></i></th>
        </tr>
        </thead>
        <tbody v-for="$data in this.rows">
            <DashBoardTableRow v-bind="$data"></DashBoardTableRow>
        </tbody>
    </table>
</template>

<script>

import DashBoardTableRow from "./DashBoardTableRow";

export default {
    name: "DashBoardTable",
    components: {DashBoardTableRow},
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
}

</script>

<style scoped>

</style>
