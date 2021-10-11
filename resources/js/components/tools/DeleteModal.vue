<template>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close col-1 align-self-end" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        Вы уверены, что хотите удалить значение, на которое ссылаются записи в <b>другой таблице</b>?
                    </h5>

                </div>
                <div class="modal-body">
                    <p>Это приведет к тому, что связанные записи будут тоже удалены (каскадом).</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-danger" data-dismiss="modal" aria-label="close" @click="$emit('deleteFK')">Удалить</a>
                    <a class="btn btn-outline-dark" data-dismiss="modal" aria-label="close">Закрыть</a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "DeleteModal"
}
</script>

<style scoped>

</style>
