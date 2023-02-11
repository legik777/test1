<template>
    <div class="w-full flex-col absolute">
        <div class=""><a href="#" @click.prevent="this.$router.push({name:'main'})">Главная</a></div>
        <div class=""><a href="#" @click.prevent="this.userStore.logout()">Выйти</a></div>
        <div class=""><a href="#" @click.prevent="this.$router.push({name:'user.login'})">Войти</a></div>
    </div>

    <router-view></router-view>
</template>

<script>
import { useUserStore } from "../stores/UserStore"
export default {
    name: 'Index',
    setup() {
        const userStore = useUserStore();
        return { userStore};
    },
}
</script>

