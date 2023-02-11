<template>
    <div class="h-screen font-sans login bg-cover">
        <div
            class="container mx-auto h-full flex flex-1 justify-center items-start md:items-center lg:items-center xl:items-center 2xl:items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <div class="max-w-xl m-4  p-10 bg-white rounded shadow-xl">
                        <p class="text-gray-800 text-center text-lg font-bold">Регистрация</p>
                        <div class="">
                            <label class="block text-sm text-gray-00" for="cus_name">Логин</label>
                            <input v-model="name" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name"
                                name="cus_name" type="text" required="" placeholder="Имя пользователя"
                                aria-label="Name">
                        </div>

                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                            <input v-model="email" class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="cus_email"
                                name="cus_email" type="text" required="" placeholder="Ваш email" aria-label="Email">
                        </div>

                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password">Пароль</label>
                            <input v-model="password" class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password"
                                name="password" type="password" required="" placeholder="*******" aria-label="password">
                        </div>

                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password_confirmation">Подтвердите пароль</label>
                            <input v-model="password_confirmation" class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password_confirmation"
                                name="confirm_password" type="password" required="" placeholder="*******"
                                aria-label="password_confirmation">
                        </div>

                        <div class="mt-4 flex justify-end items-end ">
                            <a class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded login-btn"
                                type="submit" href="#" @click.prevent="this.register()">Зарегестрироваться</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Registration',
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        }
    },
    mounted () {

    },
    methods: {
        checkLogin(){
            axios.get('/api/user/check-login').then(response=>{
                console.log(response)
            }).catch(error=>{
                console.log(error)
            })
        },
        sleep(milliseconds) {
            return new Promise((resolve) => setTimeout(resolve, milliseconds));
        },
        register() {

            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/register',{email:this.email, name: this.name, password: this.password, password_confirmation: this.password_confirmation})
                    .then(res=>{
                        console.log(res)
                        localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                    })
                    .catch(err=>{
                        console.error(err.response.data)
                    })
                })
                .catch(async error => {
                    console.error(error)
                    await this.sleep(6000)
                    this.register()
                })
        }
    },
}
</script>

<style scoped>
</style>
