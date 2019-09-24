<template>
    <div class="v--vote-item-choice" :class="[{ selected: selected}]" @click="setUserChoice">
        <div class="v--vote-item-choice-title">
            {{ data.title }}
        </div>
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
                axios({
                    url: '/api/v1/uservoteoption',
                    data: {
                        vote_id: this.voteItemData.id,
                        option_id: this.voteItemChoiceData.id
                    },
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    method: 'POST'
                })
                    .then(response => {
                        Vue.toasted.show(response.data.message);
                        this.ajaxLoading = false;
                        this.$emit('userchoiceupdated');
                    })
                    .catch(error => {
                        Vue.toasted.show(error.response.data.errors.user_id[0]);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
