<template>
    <div>
        {{ this.value }}
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
    }
}
</script>

<style scoped>

</style>
