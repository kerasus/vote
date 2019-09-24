<template>
    <div class="v--vote-item-choice"
         v-bind:class="[{ selected: selected}]"
         v-on:click="setUserChoice"
    >
        <div class="v--vote-item-choice-title">
            {{ data.title }}
        </div>
        <div class="v--vote-item-choice-count">
            <span>{{ count }}</span><br>رای
        </div>
    </div>
</template>

<script>
    export default {
        name: "voteItemChoice",
        props: ["data"],
        data() {
            return {
                local: this.voteItemChoiceData,
                ajaxLoading: false
            }
        },
        computed:{
            count(){
                return this.data.count();
            },
            selected() {
                return this.data.hasUserChosen;
            }
        },
        methods: {
            setUserChoice: function () {
                this.ajaxLoading = true;
                const user = JSON.parse(localStorage.getItem('user'));
                axios({
                    url: '/api/v1/uservoteoption',
                    data: {
                        user_id: user.id,
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
