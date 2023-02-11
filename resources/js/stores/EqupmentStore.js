import axios from "axios";
import { defineStore } from "pinia";
import router from "../router";
export const usePersonStore = defineStore("PersonStore", {
    state: () => ({
        uData: [],
    }),
    getters: {
        UData: (state) => state.uData,
    },
    actions: {

    }
});
