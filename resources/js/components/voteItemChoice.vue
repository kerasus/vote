<template>
    <div class="v--vote-item-choice"
         v-bind:class="[{ selected: voteItemChoiceData.selected === true}]"
         v-on:click="setUserChoice"
    >
        {{ voteItemChoiceData.name }}
        <div class="v--vote-item-choice-count"><span>{{ voteItemChoiceData.count }}</span><br>رای</div>
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

                const token = localStorage.getItem('token');
                const user = JSON.parse(localStorage.getItem('user'));

                axios({
                    url: '/api/v1/uservoteoption',
                    data: {
                        user_id: user.id,
                        vote_id: this.voteItemData.id,
                        option_id: this.voteItemChoiceData.id
                    },
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer '+ token
                    },
                    method: 'POST'
                })
                .then(response => {
                    alert(response.data.message);
                    this.ajaxLoading = false;
                    this.$emit('userChoiceUpdated');
                })
                .catch(error => {

                    console.log(error.response.data);
                    alert(error.response.data.errors.user_id[0]);
                    this.$emit('userChoiceUpdated');

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
