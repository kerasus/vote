<template>
    <div class="v--collapse" :class="[{ show: this.show}]">
        <div class="v--collapse-head" @click="viewCollapse">
            {{ title }}
            <span class="v--collapse-head-count">
                {{ voteCount }} رای
            </span>
        </div>
        <div class="v--collapse-body">
            <div class="v--vote-group-wrapper">
                <vote-item v-for="vote in votes" :data="vote" :key="vote.id"></vote-item>
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
            return {}
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
            },
            show() {
                return this.data.isDefault;
            }
        },
        methods: {
            viewCollapse: function (event) {
                this.data.collapse();
            }
        }
    }
</script>

<style scoped>

</style>
