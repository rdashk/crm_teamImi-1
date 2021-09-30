<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
        <a class="navbar-brand" href="#">CRM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingList" aria-controls="collapsingList" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsingList">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="/briefs">DashBoard</a>
                <a class="nav-item nav-link" href="/decisions">Решения</a>
                <a class="nav-item nav-link" href="/levels">Уровни</a>
                <a class="nav-item nav-link" href="/positions">Позиции</a>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Nav"
}
</script>

<style scoped>

</style>
