<template>
    <div class="m-10 w-full h-screen">
        <div
            class="container mx-auto h-full flex flex-1 justify-center items-start md:items-center lg:items-center xl:items-center 2xl:items-center">
            <div class="w-full max-w-lg">
                <div class="max-w-xl   py-5 bg-white rounded shadow-xl ">
                    <template v-if="this.useEquipment.Equipment">
                        <div class="w-full flex justify-between p-2">
                            <div>id: {{ this.useEquipment.Equipment.id }}</div>
                            <div @click="this.useEquipment.save(this.$route.params.id)" class="cursor-pointer">Сохранить</div>
                        </div>
                        <div class="px-3">
                            <table>
                                <tr>
                                    <td>Тип:</td>
                                    <td>
                                        <input type="text" placeholder="Тип оборудования(id)"
                                            v-model="this.useEquipment.Equipment.equipment_type_id"
                                            class="bg-gray-200 m-2 rounded p-1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Серийный номер:</td>
                                    <td><input type="text" placeholder="Серийный номер"
                                            v-model="this.useEquipment.Equipment.serial_number" class="bg-gray-200 m-2 rounded p-1">
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
                        <template v-if="this.useEquipment.EquipmentErrors">
                            <div class="break-words w-96">{{ this.useEquipment.EquipmentErrors }}</div>
                        </template>
                        <template v-if="this.useEquipment.EquipmentMessage">
                            <div class="break-words w-96">{{ this.useEquipment.EquipmentMessage }}</div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {useEquipmentStore} from "../stores/EquipmentStore"
import { mapWritableState } from "pinia";
export default {
    name: "EditEquipment",
    setup() {
        const useEquipment = useEquipmentStore();
        return { useEquipment};
    },
    computed: {
        ...mapWritableState(useEquipmentStore, ['equipment'])
    },
    mounted() {
        this.useEquipment.getEquipment(this.$route.params.id)
    },
}
</script>

<style scoped>

</style>
