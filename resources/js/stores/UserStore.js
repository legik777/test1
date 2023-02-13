import { defineStore } from "pinia";
// import router from "../router";
export const useUserStore = defineStore("UserStore", {
    state: () => ({
        loginError:{},
        loginErrorMessage:[],
        csrfCookie:null,
        loginInProcess: false,
        user: [],
        errors:[],
    }),
    getters: {
        User: (state) => state.user,

    },
    actions: {
        logout() {
            axios.post("/logout").then((res) => {
                localStorage.removeItem("x_xsrf_token");
                this.router.push({name:'user.login'})
            });
        },


        /**
         *
         *
         * @param {*} email
         * @param {*} password
         * @param {*} remember
         */
        login(email,password,remember) {
            this.loginInProcess = true
            axios.get('/sanctum/csrf-cookie').then(() => {
                axios.post('/login',
                {
                    email: email,
                    password: password,
                    remember: remember ? 'on' : ''
                })
                    .then((response) => {
                        console.log(response);
                        if(response?.data?.auth == "ok") {
                            this.router.push({name:'main'})
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                        if(error?.response?.status == 422){
                            this.loginError = error?.response?.data?.errors
                            this.loginErrorMessage = error?.response?.data?.message
                        }
                    })
                    .finally(()=>{
                        this.loginInProcess = false
                    })
            }).catch(error => {
                this.csrfCookie = error
            })
        },
    }
});
