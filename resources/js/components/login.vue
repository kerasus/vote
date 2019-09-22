<template>
    <div>
        <h1 class="v--title v--margin-right-5">ورود به</h1>
        <span class="v--hint">نظر سنجی کتاب خوب من</span>
        <div class="v--box">
            <div>
                جهت ورود به سامانه نظرسنجی شماره موبایل و کدملی خود را وارد کنید:
            </div>
            <div class="v--box-form">
                <div>
                    <input type="text" class="v--input" placeholder="شماره موبایل" v-model="username">
                    <span class="v--input-hint">مثال: 09xxxxxxxxx</span>
                </div>
                <div>
                    <input type="password" class="v--input" placeholder="کد ملی" v-model="password">
                </div>
                <div>
                    <button class="v--btn v--btn-success v--btn-submit" v-on:click="login">
                        <span class="v--text-white-shadow">
                            ورود >
                        </span>
                    </button>
                </div>
            </div>
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
        data: function () {
            return {
                username: '',
                password: ''
            }
        },
        methods: {
            auth_request(state) {
                state.status = 'loading'
            },
            auth_success(state, token, user) {
                state.status = 'success'
                state.token = token
                state.user = user
            },
            auth_error(state) {
                state.status = 'error'
            },
            logout(state) {
                state.status = ''
                state.token = ''
            },
            login() {

                axios({
                        url: '/api/login',
                        data: {
                            mobile: this.username,
                            national_code: this.password
                        },
                        method: 'POST'
                    })
                    .then(resp => {
                        console.log(resp);
                        const token = resp.data.data.access_token;
                        const user = resp.data.data.user;
                        localStorage.setItem('token', token);
                        localStorage.setItem('user', JSON.stringify(user));
                        // Add the following line:
                        axios.defaults.headers.common['Authorization'] = token;
                        // commit('auth_success', token, user);
                        // resolve(resp);
                    })
                    .catch(err => {
                        // commit('auth_error');
                        localStorage.removeItem('token');
                        console.log(err);
                        // reject(err);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
