<template>
    <div class="v--collapse-group">
        <collapse-item
                v-on:showcollapseitem="hideItems"
                v-for="(collapseItemData, index) in collapseData"
                v-bind:index="+index"
                v-bind:key="collapseData[index].title+collapseData[index].id"
                v-bind:collapse-item-data="collapseData[index]"
        ></collapse-item>
    </div>
</template>

<script>
    import collapseItem from './collapseItem'
    
    export default {
        name: "collapseGroup",
        props: ["collapseData", "parentmsg"],
        methods: {
            hideItems: function (event) {
                var collapseLength = this.collapseData.length;
                for (var i = 0; i < collapseLength; i++) {
                    this.collapseData[i].show = false;
                }
            }
        },
        comments: {
            collapseItem
        }
    }
</script>

<style scoped>

</style>