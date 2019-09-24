<template>
    <div class="v--collapse-group">
        <category
            v-on:showcollapseitem="hideItems"
            v-on:userchoiceupdated="refreshVotes"
            v-for="c in categories"
            :data="c">
        </category>
    </div>
</template>

<script>
    import category from './category'
    import Category from "../model/Category";

    export default {
        name: "collapseGroup",
        data() {
            return {
                categories: []
            }
        },
        mounted() {
            axios.get('/api/v1')
                .then(({data}) => this.categories = data.map(c => new Category(c)))

        },
        methods: {
            refreshVotes: function () {
                this.ajaxLoading = true;
                axios.get('/api/v1')
                    .then(response => {
                        console.log(response.data);
                        this.convertVoteFormat(response.data);
                        this.ajaxLoading = false;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            hideItems: function (event) {
                let collapseLength = this.voteData.length;
                for (let i = 0; i < collapseLength; i++) {
                    this.voteData[i].show = false;
                }
            }
        },
        comments: {
            category
        }
    }
</script>

<style scoped>

</style>
