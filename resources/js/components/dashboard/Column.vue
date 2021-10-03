<template>
    <div>
        <a class="btn btn-light dropdown-toggle pl-1 pr-1" :href="'#' + data" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{this.value}}</a>
        <div class="dropdown-menu" :aria-labelledby="data">
            <a class="dropdown-item" href="#">ASC</a>
            <a class="dropdown-item" href="#">DESC</a>
            <a class="dropdown-item" href="#">REFRESH</a>
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
    },
    methods: {
        sort(){
            this.$emit('sort');
        }
    }
}
</script>

<style scoped>

</style>
