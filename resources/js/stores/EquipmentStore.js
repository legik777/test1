import axios from "axios";
import { defineStore } from "pinia";
import router from "../router";

export const useEquipmentStore = defineStore("EquipmentStore", {
    state: () => ({
        equipment: null,
        equipments: [],
        equipmentMessage: null,
        equipmentErrors: null,
        query: null,
        perPage: 5,
    }),
    getters: {
        Equipment: (state) => state.equipment,
        Equipments: (state) => state.equipments,
        EquipmentErrors: (state) => state.equipmentErrors,
        EquipmentMessage: (state) => state.equipmentMessage,
    },
    actions: {
        /**
         *getEquipment
         *
         * @param {number} id
         */
        getEquipment(id) {
            axios
                .get(`/api/equipment/${id}`)
                .then((response) => {
                    if (response.data.status != "error") {
                        this.equipment = response.data;
                        this.equipmentErrors = null;
                    } else {
                        this.equipmentErrors = response.data;
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        /**
         *
         *
         * @param {number} [page=1]
         * @param {number} [per_page=5]
         */
        getEquipments(page = 1, per_page = 5) {
            axios
                .get(`/api/equipment/?page=${page}&per_page=${per_page}`, {
                    params: { ...this.query },
                })
                .then((response) => {
                    this.equipments = response.data;
                });
        },

        /**
         *
         *
         * @param {*} newEquipments
         */
        createEquipments(newEquipments) {
            (this.equipmentErrors = null),
                axios
                    .post("/api/equipment", { data: newEquipments })
                    .then((response) => {
                        if (response.data.status == "complete") {
                            this.equipmentErrors = null;
                            this.equipmentMessage = response.data.message;
                        } else {
                            this.equipmentErrors = response.data.message;
                        }
                    });
        },

        /**
         *
         *
         * @param {number} id
         */
        save(id) {
            axios
                .put(`/api/equipment/${id}`, { data: [{ ...this.equipment }] })
                .then((response) => {
                    if (response.data == "complete") {
                        this.equipmentErrors = null;
                        this.equipmentMessage = response.data.message;
                    } else {
                        this.equipmentErrors = response.data.message;
                    }
                });
        },

        /**
         *
         *
         * @param {*} params
         */
        setQuery(params) {
            this.query = params;
        },

        /**
         *
         *
         * @param {number} id
         */
        deleteEquipment(id) {
            this.axios.delete(`/api/equipment/${id}`).then((response) => {
                if (response.data.data == "complete") {
                    this.equipmentMessage = response.data.message;
                    this.getEquipments();
                } else {
                    this.equipmentErrors = response.data.message;
                }
            });
        },
    },
});
