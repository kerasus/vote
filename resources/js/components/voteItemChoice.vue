<template>
    <div class="v--vote-item-choice">
        {{ voteItemChoiceData.name }}
        <div class="v--vote-item-choice-count"><span>{{ voteItemChoiceData.count }}</span><br>رای</div>
    </div>
</template>

<script>
    export default {
        name: "voteItemChoice.vue",
        props: ["voteItemChoiceData"],
        data: function () {
            return {
                local: this.voteItemChoiceData
            }
        },
        methods: {
        }
    }
</script>

<style scoped>

</style>