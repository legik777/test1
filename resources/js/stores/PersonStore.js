import axios from "axios";
import { toInteger } from "lodash";
import { defineStore } from "pinia";
import router from "../router";
export const usePersonStore = defineStore("PersonStore", {
    state: () => ({
        theme:null,
    }),
    getters: {
        Theme: (state) => state.theme,
    },

    actions: {
        setTheme(status){
            this.theme = status
        },
    },
});
