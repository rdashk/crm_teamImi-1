<template>
    <div class="d-flex flex-column container table-bordered col-12 pl-0 pr-0 text-center" id="table">
        <div class="d-flex flex-row container col-12 pl-0 pr-0 mt-1 mb-1 fw-bold">
            <div class="col-3">id</div>
            <div class="col-9">name</div>
        </div>
        <div v-for="$data in this.rows">
            <TableRow v-bind="$data" :resource="resource" v-on:reload="load" v-on:deleteById="deleteById" @click="deleteById({id: $data.id, resource: $data.resource})">
            </TableRow>
        </div>
        <DeleteModal v-on:deleteFK="deleteFK"></DeleteModal>
    </div>
</template>
<script>
import Column from "../tools/Column";
import TableRow from "../tools/TableRow";
import DeleteModal from "./DeleteModal";
export default {
    name: "ToolTable",
    components: {DeleteModal, TableRow, Column},
    data() {
        return {
            rows: [],
            deletingItem: null,
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
        deleteById(arg){
            this.deletingItem = arg;
        },
        deleteFK(){
            if (this.deletingItem === null) throw new DOMException("Не удалось получить данные удаляемого элемента")
            else {
                axios
                    .delete(window.location.origin + '/api/'+this.deletingItem.resource + "/" + this.deletingItem.id)
                    .then(res => this.load());
                this.deletingItem = null;
            }
        }
    }
}
</script>

<style scoped>

</style>
