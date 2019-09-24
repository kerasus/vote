<template>
    <div class="v--vote-item-choice" :class="[{ selected: selected}]" @click="setUserChoice">
        <div class="v--vote-item-choice-title"> {{ data.title }} </div>
        <div class="v--vote-item-choice-count" v-show="voted">
            <span>{{ count }}</span><br>رای
        </div>
    </div>
</template>

<script>
    export default {
        name: "voteItemChoice",
        props: [
            "data",
            "voted"
        ],
        data() {
            return {}
        },
        computed: {
            count() {
                return this.data.count();
            },
            selected() {
                return this.data.hasUserChosen;
            }
        },
        methods: {
            setUserChoice: function () {
                axios['post']('/api/v1/uservoteoption',{ option_id: this.data.id })
                    .then(({data}) => {
                       Vue.toasted.show(data.message);
                       Event.fire('userChoiceUpdated');
                    })
                    .catch(error => {
                        console.log(error.response.data.errors);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
