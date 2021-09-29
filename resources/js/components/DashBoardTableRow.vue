<template>
    <div :class="compClass" @click="click" v-on:mouseover="mouseOver"
        v-on:mouseleave="mouseLeave"
        style="cursor: pointer;">
        <div data-label="name" class="col-3">{{ this.name }}</div>
        <div data-label="email" class="col-2 overflow-auto">{{ this.email }}</div>
        <div data-label="position" class="col-1">{{ this.position.name }}</div>
        <div data-label="level" class="col-2">{{ this.level.name }}</div>
        <div data-label="interview_date" class="col-2">{{ this.interview_date }}</div>
        <div data-label="decision" class="col-2 overflow-hidden">{{ this.decision.name }}</div>
        <div :class="buttonsClass">
            <button>уд</button>
            <button>ре</button>
            <button>пд</button>
        </div>
    </div>
</template>

<script>

export default {
    name: "DashBoardTableRow",
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
            className: "item d-flex flex-row col pl-0 pr-0",
            buttonsClass: "mybuttons d-flex flex-row display-none",
            compClass: "item d-flex flex-row col pl-0 pr-0",
        }
    },
    methods: {
        click(event) {
            document.location = "/briefs/" + this.id;
        },
        mouseOver(event) {
            this.comcplass = this.className + " table_active"
            this.buttonsClass = "mybuttons d-flex flex-row display ";
        },
        mouseLeave(event) {
            this.compClass = this.className
            this.buttonsClass = "mybuttons d-flex flex-row display-none";
        },
    }
}

</script>

<style scoped>
.display-none {
    display: none;
    opacity: 0;
}

.display {
    display: block;
    opacity: 1;
}

.mybuttons {
    transition-property: opacity;
    transition-duration: 0.5s;
    /*position: absolute;*/
    /*right: 5%;*/
    /*top: 1em;*/
}
</style>
