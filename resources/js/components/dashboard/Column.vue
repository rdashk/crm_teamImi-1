<template>
    <div>
        <a class="btn btn-light dropdown-toggle pl-1 pr-1" :href="'#' + data" role="button" id="dropdownMenuLink"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ this.value }}</a>
        <div class="dropdown-menu" :aria-labelledby="data">
            <a class="dropdown-item" href="#" @click='clickSort'>{{ this.ascText }}</a>
            <a class="dropdown-item" href="#" @click='deleteFromSort'>СБРОСИТЬ СОРТИРОВКУ</a>
            <a class="dropdown-item" href="#" @click="$emit('change', req)">REFRESH</a>
            <a class="dropdown-item" href="#" v-if="filter">FILTER</a>
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
        filterArr: [],
    },
    methods: {
        clickSort() {
            this.asc = !this.asc;
            this.ascText = this.asc ? "Я-А" : "А-Я";
            this.$emit('changed', {'sorts' : {'data': this.data, 'name': (!this.asc ? "" : "-") + this.data}})
        },
        deleteFromSort(){
            this.$emit('del', this.data);
        }
    },
    data() {
        return {
            req: '',
            ascText: "А-Я",
            asc: true,
        }
    }
}
</script>

<style scoped>

</style>
