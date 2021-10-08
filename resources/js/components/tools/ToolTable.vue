<template>
    <div class="d-flex flex-column container table-bordered col-12 pl-0 pr-0 text-center" id="table">
        <div class="d-flex flex-row container col-12 pl-0 pr-0 mt-1 mb-1 fw-bold">
            <div class="col-3">id</div>
            <div class="col-9">name</div>
        </div>
        <div v-for="$data in this.rows">
            <TableRow v-bind="$data" :resource="resource" v-on:reload="load">
            </TableRow>
        </div>
    </div>
</template>
<script>
import Column from "../tools/Column";
import TableRow from "../tools/TableRow";
export default {
    name: "ToolTable",
    components: {TableRow, Column},
    data() {
        return {
            rows: [],
        };
    },
    props: {
        columns: String,
        resource: String,
    },
    created() {
        this.load();
    },
    methods: {
        load(){
            axios
                .get(window.location.origin + '/api/'+this.resource)
                .then(response => (this.rows = response.data));
        },
    }
}
</script>

<style scoped>

</style>
