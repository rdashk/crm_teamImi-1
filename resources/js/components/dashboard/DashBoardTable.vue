<template>
    <div class="d-flex flex-column container table-bordered col-12 pl-0 pr-0 text-center" id="table">
        <div class="d-flex flex-row container col-12 pl-0 pr-0 mt-1 mb-1 fw-bold">
            <Column value="Имя" class="col-4 col-sm-3 col-md-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0"
                    data="name" :filter="false" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="E-mail" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0 d-none d-sm-none d-md-block"
                    data="email" :filter="false" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="Позиция" class="col-4 col-sm-3 col-md-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0"
                    data="position_id" :filter="true" resource="positions" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="Уровень" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0 d-none d-sm-block"
                    data="level_id" :filter="true" resource="levels" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="Дата" class="col-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0 d-none d-sm-none d-md-block"
                    data="interview_date" :filter="true" resource="date" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
            <Column value="Решение" class="col-4 col-sm-3 col-md-2 d-flex flex-row justify-content-around align-items-center pl-0 pr-0"
                    data="decision_id" :filter="true" resource="decisions" v-on:changed="changes" v-on:del="deleteFromSort"></Column>
        </div>
        <div v-for="$data in this.rows">
            <TableRow v-bind="$data" v-on:reload="load">
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
            request: window.location.origin + '/api/briefs',
            req: [],
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
        load(req = '') {
            console.log(this.request + "?" + req);
            axios
                .get(this.request + "?" + req)
                .then(response => (this.rows = response.data));
        },
        changes(arr) {
            let requ = [];
            if (arr.hasOwnProperty('sorts')) {
                this.sorts[arr['sorts']['data']] = arr['sorts']['name'];
                let req = Object.values(this.sorts).join();
                if (req === ""){
                    this.req['sort'] = "";
                } else {
                    this.req['sort'] = "sort=" + req;
                }
            }
            if (arr.hasOwnProperty('filters')) {
                if (!arr['filters']['data'].length){
                    delete this.filters[arr['filters']['resource']]
                } else {
                    this.filters[arr['filters']['resource']] = arr['filters']['data'];
                }
                let req = [];
                for (let filter in this.filters){
                    req.push(filter + ":" + this.filters[filter].join("|"));
                }
                if (req.length) {
                    this.req['filter'] = "filter=" + req.join();
                } else {
                    this.req['filter'] = '';
                }
            }
            this.load(Object.values(this.req).join("&"));
        },
        deleteFromSort(name) {
            delete this.sorts[name];
            let req = Object.values(this.req).join("&");
            console.log(req);
            this.load(req);
        }
    },
}

</script>

<style scoped>

</style>
