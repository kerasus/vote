<template>
    <div>
        <h1 class="v--title v--margin-right-5">ورود به</h1>
        <span class="v--hint">نظر سنجی کتاب خوب من</span>
        <div class="v--box">
            <div>
                جهت ورود به سامانه نظرسنجی شماره موبایل و کدملی خود را وارد کنید:
            </div>
            <form class="v--box-form" @submit.prevent="onSubmit" @keydown="form.errors.clear([$event.target.name,$event.target.getAttribute('oname')])">
                <div>
                    <input type="text" class="v--input" placeholder="شماره موبایل" name="mobile" oname="username" v-model="form.mobile">
                    <span class="v--input-hint" v-if="!form.errors.has('mobile')">مثال: 09xxxxxxxxx</span>
                    <span class="v--input-hint" v-if="form.errors.has('mobile')" v-text="form.errors.get('mobile')"></span>
                </div>
                <div>
                    <input type="password" class="v--input" placeholder="کد ملی" name="password" oname="national_code" v-model="form.password">
                    <span class="v--input-hint" v-if="!(form.errors.has('national_code') || form.errors.has('password'))">مثال: 0013356269</span>
                    <span class="v--input-hint" v-if="form.errors.has('national_code')" v-text="form.errors.get('national_code')"></span>
                    <span class="v--input-hint" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                    
                </div>
                <div>
                    <button class="v--btn v--btn-success v--btn-submit">
                        <span class="v--text-white-shadow">
                            ورود >
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div class="v--ltr">
            <a href="https://vote.alaatv.com" target="_blank">
                <span class="v--hint v--ltr">
                    سامانه متمرکز نظرسنجی آلاء
                </span>
            </a>
        </div>
        <div class="row align-items-end v--login-page-info">
            <div class="col mx-auto text-right">
                <div class="v--margin-right-5">
                    <h2 class="v--title">چی بخونم؟</h2>
                    <br>
                    <span class="v--title-hint">
                        رای بدید و کتاب های منتخب رو با بیشترین تخفیف ببرید
                        <br>
                        رای به ضروری ترین کتـــاب ها با بیشترین صرفه اقتصادی
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "login",
        data() {
            return {
                form: new Form({
                    mobile: '',
                    password: '',
                })
            }
        },
        methods: {
            onSubmit(){
                this.form.post('/login')
                    .then(response => {
                        window.location.reload();
                    })
                    .catch(error => {
                        if(error.status === 401){
                            window.location='/'
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>
