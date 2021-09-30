<template>
    <div @click="sort" @click.ctrl="$emit('deleteFromSort')">{{this.value}}</div>
</template>

<script>
export default {
    name: "Column",
    props: {
        value: String,
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
