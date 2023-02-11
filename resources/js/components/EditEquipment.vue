<template>
    <div class="m-10 w-full h-screen">
        <div
            class="container mx-auto h-full flex flex-1 justify-center items-start md:items-center lg:items-center xl:items-center 2xl:items-center">
            <div class="w-full max-w-lg">
                <div class="max-w-xl   py-5 bg-white rounded shadow-xl ">
                    <template v-if="this.equipment">
                        <div class="w-full flex justify-between p-2">
                            <div>id: {{ this.equipment.id }}</div>
                            <div @click="save()" class="cursor-pointer">Сохранить</div>
                        </div>
                        <div class="px-3">
                            <table>
                                <tr>
                                    <td>Тип:</td>
                                    <td>
                                        <input type="text" placeholder="Тип оборудования(id)"
                                            v-model="this.equipment.equipment_type_id"
                                            class="bg-gray-200 m-2 rounded p-1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Серийный номер:</td>
                                    <td><input type="text" placeholder="Серийный номер"
                                            v-model="this.equipment.serial_number" class="bg-gray-200 m-2 rounded p-1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Примечание:</td>
                                    <td><input type="text" placeholder="Примечание" v-model="this.equipment.note"
                                            class="bg-gray-200 m-2 rounded p-1"></td>
                                </tr>
                            </table>
                            <div>
                            </div>
                        </div>
                    </template>
                    <div class="flex justify-center items-center">
                        <template v-if="this.errors">
                            <div class="break-words w-96">{{ this.errors.message }}</div>
                        </template>
                        <template v-if="this.msg">
                            <div class="break-words w-96">{{ this.msg }}</div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "EditEquipment",
    data() {
        return {
            id: null,
            equipment: null,
            errors: null,
            msg: null,
        }
    },
    methods: {
        save() {
            this.axios.put(`/api/equipment/${this.id}`, { 'data': [{ ...this.equipment }] })
                .then(response => {
                    if (response.data == "complete") {
                        this.errors = null;
                        this.msg = "Успешно сохранено";
                    } else {
                        this.msg = response.data;
                    }
                })
        }
    },
    mounted() {
        this.id = this.$route.params.id
        axios.get(`/api/equipment/${this.id}`)
            .then(response => {
                console.log(response);
                if (response.data.status != 'error') {
                    this.equipment = response.data.data
                } else {
                    this.errors = response.data
                }
            })
            .catch(error => {
                console.error(error);
            })
    },
}
</script>

<style scoped>

</style>
