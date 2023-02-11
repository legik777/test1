<template>
    <div :class="this.personStore.Theme">
        <div class=" h-screen font-sans login bg-cover dark:bg-q-dark-main-form-bg-color">

            <div
                class="container mx-auto h-full flex flex-1 justify-center items-start md:items-center lg:items-center xl:items-center 2xl:items-center">
                <div class="w-full max-w-lg">
                    <div class="leading-loose">
                        <div class="max-w-xl m-4  p-10 bg-white rounded shadow-xl dark:bg-q-dark-main-form-color">
                            <p class="text-gray-800 text-center text-lg font-bold dark:text-gray-400">Авторизация</p>
                            <div class="">
                                <label class="block text-sm text-gray-00 dark:text-gray-400" for="username">Логин</label>
                                <input v-model="email" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded focus-visible:outline-none"
                                    id="username" name="username" type="text" required="" placeholder="Имя пользователя"
                                    aria-label="username">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600 dark:text-gray-400 " for="password">Пароль</label>
                                <input v-model="password" class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded focus-visible:outline-none"
                                    id="password" name="password" type="password" required="" placeholder="*******"
                                    aria-label="password">
                            </div>
                            <div class="mt-4 flex justify-between items-end ">
                                <div class="flex">
                                    <input id="checkbox-1" v-model="remember" checked type="checkbox"
                                        class="w-4 h-4 checkbox">
                                    <label for="checkbox-1" class=" pl-2 block text-sm text-gray-00"> Запомнить меня
                                    </label>
                                </div>
                                <a href="#" @click.prevent="userStore.login(this.email, this.password, this.remember)"
                                    class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded login-btn"
                                    type="submit">Вход</a>
                            </div>
                            <router-link
                                class="inline-block right-0 align-baseline font-bold text-sm text-500 register-btn"
                                :to="{ name: 'user.register' }">Регистрация</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="absolute top-0 right-2"><theme-switch class=""></theme-switch></div> -->
        </div>
    </div>
</template>

<script>
import { useUserStore } from "../../stores/UserStore"
import { usePersonStore } from "../../stores/PersonStore";
// import ThemeSwitch from "../layouts/ThemeSwitch.vue";
export default {
    name: 'Login',
    data() {
        return {
            email: null,
            password: null,
            remember: null,
        }
    },
    setup() {
        const userStore = useUserStore();
        const personStore = usePersonStore();

        return { userStore,personStore };
    },
    components: {
        // ThemeSwitch,
    },
}
</script>

<style scoped>
.login-btn:hover {
    background-color: var(--main-color);
    transition: 0.3s ease-in;
}

.register-btn:hover {
    color: var(--main-color);
    transition: 0.5s ease-in;
}

.checkbox {
    accent-color: var(--main-color);
}

.login {

}
</style>

