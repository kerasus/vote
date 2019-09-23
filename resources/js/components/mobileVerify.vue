<template>
    <div class="v--box">
        <div>
            کد برای شماره {{ mobile }} ارسال شد.
            <br>
            کد ارسال شده را وارد نمایید.
        </div>
        <form class="v--box-form"  @keydown="form.errors.clear([$event.target.name])">
            <div>
                <input type="text" class="v--input" placeholder="کد را وارد نمایید" name="code" v-model="form.code">
                <span class="v--input-hint" v-if="!form.errors.has('code')">مثال: 1234</span>
                <span class="v--input-hint" v-if="form.errors.has('code')" v-text="form.errors.get('code')"></span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button v-if="timerIsGoing" class="v--btn v--btn-success v--btn-submit" @click.prevent="submitVerificationCode">
                        <span class="v--text-white-shadow">
                            شروع نظر سنجی >
                        </span>
                    </button>
                </div>
                <div class="col-md-6 text-left">
                    <vac :end-time="endTime" @finish="onTimerStopped">
                        <span slot="process" slot-scope="{ timeObj }" class="v--hint">
                            {{ `زمان باقی مانده: ${timeObj.m}:${timeObj.s}` }}
                        </span>
                        <span slot="finish">
                            <button class="v--btn v--btn-link" @click.prevent="resendVerificationCode" >ارسال مجدد کد</button>
                        </span>
                    </vac>
                    <button class="v--btn v--btn-link" @click.prevent="logout">اصلاح شماره</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "mobileVerify",
        props: [
            "mobile",
            "timer"
        ],
        data() {
            return {
                timerStopped: false,
                form : new Form({
                   code: ''
                }),
            }
        },
        computed: {
            timerIsGoing() {
                return !this.timerStopped;
            },
            endTime(){
                return new Date().getTime() + 60000;
            }
        },
        methods: {
            onTimerStopped() {
                this.timerStopped = true;
            },
            submitVerificationCode() {
                this.form.post('/mobile/verify')
                    .then(({data}) => alert(data))
            },
            resendVerificationCode(){
                this.form.reset();
                this.form.get('/mobile/resend')
                    .then(({data}) => alert(data))
                    .catch(({error}) => alert(error))
            },
            logout() {
                this.form.reset();
                window.location('/logout');
            }
            
        }
    }
</script>

<style scoped>

</style>
