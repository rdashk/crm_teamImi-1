<template>
    <tr class="item" @click="click" @mouseover="this.className='item table-active'"
        onmouseleave="this.className='item'"
        style="cursor: pointer;">
        <td data-label="name">{{ this.name }}</td>
        <td data-label="email">{{ this.email }}</td>
        <td data-label="position">{{ this.position.name }}</td>
        <td data-label="level">{{ this.level.name }}</td>
        <td data-label="interview_date">{{ this.interview_date }}</td>
        <td data-label="decision">{{ this.decision.name }}</td>
    </tr>
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
            position: "",
            level: "",
            decision: "",
        }
    },
    methods: {
        click(event){
            document.location = "/briefs/"+this.id;
        }
    }
}

</script>

<style scoped>

</style>
