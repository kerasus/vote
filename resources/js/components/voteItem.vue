<template>

    <div class="v--vote-item">
        <div class="v--vote-item-title">
            {{ voteItemData.name }}
        </div>
        <div class="v--vote-item-countOfTotalVote">
            {{ voteItemData.count }} رای
        </div>
        <div class="v--vote-item-choices">
            <vote-item-chioce
                    v-for="(choicesItemData, index) in voteItemData.choices"
                    v-bind:key="voteItemData.choices[index].name+voteItemData.choices[index].id"
                    v-bind:vote-item-data="voteItemData"
                    v-bind:vote-item-choice-data="voteItemData.choices[index]"
                    v-on:userchoiceupdated="$emit('userchoiceupdated')"
            ></vote-item-chioce>
        </div>
    </div>

</template>

<script>
    export default {
        name: "voteItem.vue",
        props: ["voteItemData"],
        data: function () {
            return {
                local: this.voteItemData
            }
        },
        methods: {
        }
    }
</script>

<style scoped>

</style>
