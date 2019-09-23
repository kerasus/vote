<template>
    <div class="v--vote-item-choice"
         v-bind:class="[{ selected: voteItemChoiceData.selected === true}]"
         v-on:click="setUserChoice"
    >
        <div class="v--vote-item-choice-title">
            {{ voteItemChoiceData.name }}
        </div>
        <div class="v--vote-item-choice-count">
            <span>{{ voteItemChoiceData.count }}</span><br>رای
        </div>
    </div>
</template>

<script>
    export default {
        name: "voteItemChoice.vue",
        props: ["voteItemChoiceData", "voteItemData"],
        data: function () {
            return {
                local: this.voteItemChoiceData,
                ajaxLoading: false
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
                    // this.$emit('userchoiceupdated');

                    // console.error("Error response:");
                    // console.log(error);
                    // console.error(error.response.data);    // ***
                    // console.error(error.response.status);  // ***
                    // console.error(error.response.headers); // ***

                });
            }
        }
    }
</script>

<style scoped>

</style>
