<template>
    <div class="v--collapse"
         v-bind:class="[{ show: this.show}]"
    >
        <div class="v--collapse-head" v-on:click="viewCollapse">
            {{ title }}
            <span class="v--collapse-head-count">
                {{ voteCount }} رای
            </span>
        </div>
        <div class="v--collapse-body">
            <div class="v--vote-group-wrapper">
                <vote-item
                    v-for="vote in votes"
                    :data = "vote"
                ></vote-item>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "category",
        props: [
            "data"
        ],
        data() {
            return {
                show: true
            }
        },
        computed: {
            votes() {
                return this.data.votes();
            },
            title() {
                return this.data.title();
            },
            voteCount() {
                return this.data.voteCount();
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
