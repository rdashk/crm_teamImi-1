<template>
    <div>
        <a :class="'btn btn-light dropdown-toggle pl-1 pr-1 ' + this.bgSorting" :href="'#' + data" role="button" id="dropdownMenuLink"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ this.value }}</a>
        <div class="dropdown-menu" :aria-labelledby="data">
            <a class="dropdown-item" href="#" @click='clickSort'>{{ this.ascText }}</a>
            <a class="dropdown-item" href="#" @click='deleteFromSort'>СБРОСИТЬ СОРТИРОВКУ</a>
            <div class="dropdown-item" v-if="filter" v-for="filterOpt in this.filterOptions">
                <input type="checkbox" :value="filterOpt.id" :id="'filter'+filterOpt.id" @click="filterData(filterOpt)">
                <label :for="filterOpt.id">{{filterOpt.name}}</label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Column",
    props: {
        value: String,
        data: String,
        filter: Boolean,
        resource: String,
    },
    created() {
        if (this.resource !== "date" && this.resource){
            axios
                .get(window.location.origin + "/api/" + this.resource)
                .then(response => this.filterOptions = response.data);
        }
        else if (this.resource === "date"){
            axios
                .get(window.location.origin + "/api/briefs-dates")
                .then(response => {
                    this.filterOptions = response.data;
                    this.filterOptions = [...new Set(this.filterOptions)]
                    this.filterOptions = this.filterOptions.map(function(el, index, arr){
                        return {id: el, name: ( el ? el : "Не указана")};
                    })
                });
        }
    },
    methods: {
        clickSort() {
            this.asc = !this.asc;
            this.ascText = this.asc ? "DESC" : "ASC";
            this.$emit('changed', {'sorts' : {'data': this.data, 'name': (!this.asc ? "" : "-") + this.data}})
            this.bgSorting = "bg-success"
        },
        deleteFromSort(){
            this.$emit('del', this.data);
            this.bgSorting = "";
        },
        filterData(data){
            if (!this.filterArr.includes(data.id)) {
                this.filterArr.push(data.id);
            } else {
                this.filterArr.splice(this.filterArr.indexOf(data.id), 1);
            }
            this.$emit("changed", {"filters": {resource: this.data, data: this.filterArr}})
        }
    },
    data() {
        return {
            req: '',
            ascText: "ASC",
            asc: true,
            bgSorting: "",
            filterOptions: [],
            filterArr: [],
        }
    }
}
</script>

<style scoped>

</style>
