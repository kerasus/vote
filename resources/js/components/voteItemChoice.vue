<template>
    <div class="v--vote-item-choice" :class="[{ selected: selected}]" @click.prevent.stop="staging = true">

            <div class="v--vote-item-choice-title" v-if="!staging"> {{ data.title }}</div>
            <div class="v--vote-item-choice-count" v-if="!staging" v-show="voted">
                <span>{{ count }}</span><br>رای
            </div>
            <div v-if="staging">
                <span class="font-weight-bold"> مطمئن هستی ؟</span>
                <div class="ui-group-buttons">
                    <a href="#" class="btn btn-lg btn-danger" role="button" @click.prevent.stop="staging=false">
                        <span class="v--vote-no"></span> خیر
                    </a>
                    <div class="or"></div>
                    <a href="#" class="btn  btn-lg btn-success" role="button" @click.prevent.stop="confirmed">
                        <span class="v--vote-yes"></span> بله
                    </a>
                
                </div>
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
            return {
                staging: false,
            }
        },
        computed: {
            count() {
                return this.data.count();
            },
            selected() {
                return this.data.hasUserChosen;
            },
        },
        methods: {
            confirmed() {
                this.staging = false;
                this.setUserChoice();
            },
            setUserChoice() {
                axios['post']('/api/v1/uservoteoption', {option_id: this.data.id})
                    .then(({data}) => {
                        let option = {
                            theme: "toasted-primary",
                            position: "bottom-center",
                            duration: 5000
                        };
                        Vue.toasted.show(data.message, option);
                        Event.fire('userChoiceUpdated', data);
                    })
                    .catch(error => {
                        try {
                            let status = error.response.status;
                            if (status === 422) {
                                Vue.toasted.show(error.response.data.errors.user_id[0]);
                            }
                            if (status === 429) {
                                Vue.toasted.show("لطفا 5 ثانیه دیگر مجدد تلاش کنید.");
                            }
                            if (status === 403) {
                                Vue.toasted.show("دسترسی غیر مجاز است.");
                            }
                            if (status === 500) {
                                Vue.toasted.show("خطای سرور");
                            }

                        } catch (e) {

                        }
                        console.log(error.response.data.errors);
                    });
            }
        }
    }
</script>

<style scoped>
    .v--vote-no:before {
        content: "×";
    }
    
    .v--vote-yes:before {
        content: "\F00C";
        font: normal normal normal 14px/1 FontAwesome;
        text-rendering: auto;
        position: absolute;
        top: 17px;
        right: 118px;
    }
    
    .ui-group-buttons .or {
        position: relative;
        float: left;
        width: .3em;
        height: 1.3em;
        z-index: 3;
        font-size: 12px
    }
    
    .ui-group-buttons .or:before {
        position: absolute;
        top: 50%;
        left: 50%;
        content: ' یا ';
        background-color: #5a5a5a;
        margin-top: -.1em;
        margin-left: -.9em;
        width: 1.8em;
        height: 1.8em;
        line-height: 1.55;
        color: #fff;
        font-style: normal;
        font-weight: 400;
        text-align: center;
        border-radius: 500px;
        -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box
    }
    
    .ui-group-buttons .or:after {
        position: absolute;
        top: 0;
        left: 0;
        content: ' ';
        width: .3em;
        height: 2.84em;
        background-color: rgba(0, 0, 0, 0);
        border-top: .6em solid #5a5a5a;
        border-bottom: .6em solid #5a5a5a
    }
    
    .ui-group-buttons .or.or-lg {
        height: 1.3em;
        font-size: 16px
    }
    
    .ui-group-buttons .or.or-lg:after {
        height: 2.85em
    }
    
    .ui-group-buttons .or.or-sm {
        height: 1em
    }
    
    .ui-group-buttons .or.or-sm:after {
        height: 2.5em
    }
    
    .ui-group-buttons .or.or-xs {
        height: .25em
    }
    
    .ui-group-buttons .or.or-xs:after {
        height: 1.84em;
        z-index: -1000
    }
    
    .ui-group-buttons {
        display: inline-block;
        vertical-align: middle
    }
    
    .ui-group-buttons:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden
    }
    
    .ui-group-buttons .btn {
        float: left;
        border-radius: 0
    }
    
    .ui-group-buttons .btn:first-child {
        margin-left: 0;
        border-top-left-radius: .25em;
        border-bottom-left-radius: .25em;
        padding-right: 15px
    }
    
    .ui-group-buttons .btn:last-child {
        border-top-right-radius: .25em;
        border-bottom-right-radius: .25em;
        padding-left: 15px
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
