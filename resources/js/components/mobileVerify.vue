<template>
    <div class="v--box">
        <div>
            <p >
            کد برای شماره {{ mobile }} ارسال شد.
            
            </p>
            <p v-if="!timerIsGoing">
                اما پاسخی از طرف شما دریافت نشد، لطفا اگر شماره موبایل خود را اشتباه وارد فرمودید، از دکمه اصلاح شماره و یا در غیر این صورت ار دکمه ارسال مجدد کد، اقدام بفرمایید.
            </p>
            <p v-if="timerIsGoing">
            کد ارسال شده را وارد نمایید.
            </p>
        </div>
        <form class="v--box-form"  @keydown="form.errors.clear([$event.target.name])">
            <div v-if="timerIsGoing">
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
                    <vac :left-time="leftTime" :auto-start="false" @finish="onTimerStopped" ref="vac">
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
            "mobile"
        ],
        data() {
            return {
                timerStopped: false,
                form : new Form({
                   code: ''
                }),
                leftTime: 180000
            }
        },
        computed: {
            timerIsGoing() {
                return !this.timerStopped;
            }
        },
        mounted() {
            this.startTimer();
        },
        methods: {
            onTimerStopped() {
                this.timerStopped = true;
            },
            submitVerificationCode() {
                this.form.post('/mobile/verify')
                    .then(response => {
                        this.$toasted.show(response);
                        window.location = '/';
                    })
            },
            resendVerificationCode(){
                this.form.reset();
                this.form.get('/mobile/resend')
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                    
                    });
                this.reset();
            },
            logout() {
                this.form.reset();
                window.location='/logout';
            },
            reset(){
                this.form.reset();
                this.timerStopped = false;
                this.startTimer();
            },
            startTimer(){
                this.$refs.vac.startCountdown(true);
            }
            
        }
    }
</script>

<style scoped>

</style>
