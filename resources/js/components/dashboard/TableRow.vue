<template>
    <div :class="compClass" @click="click" v-touch:longtap="mouseOver" v-on:mouseover="mouseOver"
         v-on:mouseleave="mouseLeave"
         style="cursor: pointer;">
        <transition name="slide-left-fade">
            <div :class="buttonsClass" v-if="show" style="position: absolute; left: -2.1em;">
                <button class="btn btn-outline-danger pl-2 pr-2 pt-2 pb-2" @click="deleteItem">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-trash"
                         viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd"
                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </div>
        </transition>
        <div data-label="name" class="col-4 col-sm-3 col-md-2">{{ name }}</div>
        <div data-label="email" class="col-2 overflow-auto d-none d-sm-none d-md-block">{{ email }}</div>
        <div data-label="position" class="col-4 col-sm-3 col-md-2">{{ position.name }}</div>
        <div data-label="level" class="col-sm-3 col-md-2 d-none d-sm-block">{{ level.name }}</div>
        <div data-label="interview_date" class="col-2 d-none d-sm-none d-md-block">{{ interview_date }}</div>
        <div data-label="decision" class="col-4 col-sm-3 col-md-2 overflow-hidden">{{ decision.name }}</div>
        <transition name="slide-fade">
            <div :class="buttonsClass" v-if="show">
                <a :href="'/briefs/'+id+'/edit'" class="btn btn-outline-primary pl-2 pr-2 pt-2 pb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd"
                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>
                <a :href="'/briefs/'+id+'/pdf'" class="btn btn-outline-info pl-2 pr-2 pt-2 pb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                        <path
                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        <path
                            d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                    </svg>
                </a>
            </div>
        </transition>
    </div>
</template>
<script>


export default {
    name: "TableRow",
    props: {
        created_at: String,
        decision_id: Number,
        email: String,
        experience: String,
        id: Number,
        interview_date: String,
        level_id: Number,
        name: String,
        position_id: Number,
        skills: String,
        text: String,
        updated_at: String,
        level: {
            id: Number,
            name: String,
        },
        position: {
            id: Number,
            name: String,
        },
        decision: {
            id: Number,
            name: String,
        },
    },
    data() {
        return {
            className: "item d-flex flex-row align-items-center col pl-0 pr-0",
            buttonsClass: "btn-group d-flex flex-row ",
            compClass: "item d-flex flex-row align-items-center col pl-0 pr-0",
            show: false,
        }
    },
    methods: {

        click(event) {
            document.location = "/briefs/" + this.id;
        },
        mouseOver(event) {
            this.compClass = this.className + " bg-accent";
            this.show = true;
        },
        mouseLeave(event) {
            this.compClass = this.className;
            this.show = false;
        },
        deleteItem(e){
            e.stopPropagation();
            axios
                .delete(window.location.origin + '/api/briefs/'+this.id)
                .then(this.$emit('reload'));
        }
    }
}

</script>

<style scoped>
.bg-accent {
    transition: background-color .3s;
    background-color: rgba(187, 187, 187, 0.99);
}

.slide-fade-enter-active, .slide-left-fade-enter-active{
    transition: all .3s ease;
}

.slide-fade-leave-active, .slide-left-fade-leave-active {
    transition: all .3s ease;
}

.slide-fade-enter, .slide-fade-leave-to
{
    transform: translateX(15px);
    opacity: 0;
}
.slide-left-fade-enter, .slide-left-fade-leave-to {
    transform: translateX(-15px);
    opacity: 0;
}
</style>
