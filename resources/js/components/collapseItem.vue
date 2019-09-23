<template>
    <div class="v--collapse"
         v-bind:class="[{ show: collapseItemData.show === true}]"
    >
        <div class="v--collapse-head" v-on:click="viewCollapse">
            {{ localCollapseItemData.title }}
            <span class="v--collapse-head-count">
                {{ localCollapseItemData.headCount }} رای
            </span>
        </div>
        <div class="v--collapse-body">
            <div class="v--vote-group-wrapper">
                <vote-item
                        v-for="(voteItemData, index) in localCollapseItemData.voteData"
                        v-bind:index="index"
                        v-bind:key="voteItemData.name+voteItemData.id"
                        v-bind:vote-item-data="localCollapseItemData.voteData[index]"
                        v-on:userchoiceupdated="$emit('userchoiceupdated')"
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
                localCollapseItemData: this.collapseItemData,
            }
        },
        methods: {
            viewCollapse: function (event) {
                console.log('this.$parent.$parent.voteData: ', this.$parent.$parent.voteData);
                this.$emit('showcollapseitem');
                this.localCollapseItemData.show = true;
            }
        }
    }
</script>

<style scoped>

</style>
