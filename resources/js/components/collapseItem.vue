<template>
    <div class="v--collapse"
         v-bind:class="[{ show: collapseItemData.show === true}]"
    >
        <div class="v--collapse-head" v-on:click="viewCollapse">
            {{ collapseItemData.title }}
            <span class="v--collapse-head-count">
                {{ collapseItemData.headCount }} رای
            </span>
        </div>
        <div class="v--collapse-body">
            <div class="v--vote-group-wrapper">
                <vote-item
                        v-for="(voteItemData, index) in collapseItemData.voteData"
                        v-bind:index="index"
                        v-bind:key="voteItemData.name+voteItemData.id"
                        v-bind:vote-item-data="collapseItemData.voteData[index]"
                ></vote-item>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "collapseItem.vue",
        props: ["collapseItemData"],
        data: function () {
            return {
                local: this.collapseItemData
            }
        },
        methods: {
            viewCollapse: function (event) {
                this.$emit('showcollapseitem');
                this.collapseItemData.show = true;
            }
        }
    }
</script>

<style scoped>

</style>
