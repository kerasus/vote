<template>
    <div class="v--vote-group-wrapper">
        <div class="v--collapse-group">
            <div class="text-center" v-show="ajaxLoading">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw margin-bottom"></i>
            </div>
            
            <collapse-item
                    v-show="!ajaxLoading"
                    v-on:showcollapseitem="hideItems"
                    v-on:user-choice-updated="refreshVotes"
                    v-for="(collapseItemData, index) in localCollapseData"
                    v-bind:index="index"
                    v-bind:key="localCollapseData[index].title+localCollapseData[index].id"
                    v-bind:collapse-item-data="localCollapseData[index]"
            ></collapse-item>
        </div>
    </div>
</template>

<script>
    import collapseItem from './collapseItem'

    export default {
        name: "collapseGroup",
        props: ["collapseData"],
        data: function () {
            return {
                localCollapseData: this.collapseData,
                ajaxLoading: false
            }
        },
        created: function() {
            this.localCollapseData = this.collapseData;
            this.refreshVotes();
        },
        methods: {
            refreshVotes: function() {
                this.ajaxLoading = true;
                const token = localStorage.getItem('token');
                axios.get('/api/v1' , { headers: { 'Authorization': 'Bearer '+ token } })
                    .then(response => {
                        console.log(response.data);
                        this.convertVoteFormat(response.data);
                        this.ajaxLoading = false;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            convertVoteFormat: function(responseData) {
                var responseDataLength = responseData.length;
                this.localCollapseData = [];
                for (var i = 0; i < responseDataLength; i++) {
                    var votesLength = responseData[i].sorted_votes.length,
                        singleVoteData = [],
                        singleVoteDataCount = 0;

                    for (var j = 0; j < votesLength; j++) {
                        var responseSingleVoteData = responseData[i].sorted_votes[j],
                            chiocesLength = responseSingleVoteData.options.length,
                            singleVoteChoicesData = [],
                            singleVoteChoicesDataCount = 0;

                        for (var k = 0; k < chiocesLength; k++) {
                            var responseSingleChoiceData = responseSingleVoteData.options[k];

                            singleVoteChoicesData.push({
                                id: responseSingleChoiceData.id,
                                name: responseSingleChoiceData.title,
                                count: responseSingleChoiceData.tmp_count,
                                selected: (responseSingleChoiceData.hasUserChosen === true)
                            });
                            singleVoteChoicesDataCount += responseSingleChoiceData.tmp_count;
                        }

                        singleVoteData.push({
                            id: responseSingleVoteData.id,
                            name: responseSingleVoteData.subject,
                            count: singleVoteChoicesDataCount,
                            choices: singleVoteChoicesData
                        });
                        singleVoteDataCount += singleVoteChoicesDataCount;
                    }

                    this.localCollapseData[i] = {
                        id: responseData[i].id,
                        title: responseData[i].display_name,
                        show: false,
                        headCount: singleVoteDataCount,
                        voteData: singleVoteData
                    };
                }
            },
            hideItems: function (event) {
                var collapseLength = this.localCollapseData.length;
                for (var i = 0; i < collapseLength; i++) {
                    this.localCollapseData[i].show = false;
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
