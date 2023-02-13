<template>
    <div class="w-full h-screen">
        <div
            class="container mx-auto h-full flex flex-1 justify-center items-start md:items-center lg:items-center xl:items-center 2xl:items-center">
            <div class="w-full max-w-lg">
                <div class="max-w-xl m-4  p-10 bg-white rounded shadow-xl ">
                    <template v-if="this.useEquipment.Equipment">
                        <div>id: {{ this.useEquipment.Equipment.id }}</div>
                        <div>Тип: {{ this.useEquipment.Equipment.equipment_type_id }}</div>
                        <div>Серийный номер: {{ this.useEquipment.Equipment.serial_number }}</div>
                        <div>Примечание: {{ this.useEquipment.Equipment.note }}</div>
                    </template>
                    <template v-if="this.useEquipment.EquipmentErrors">
                        <div>{{ this.useEquipment.EquipmentErrors.message }}</div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {useEquipmentStore} from "../stores/EquipmentStore"
export default {
    name: 'ShowEquipment',
    setup() {
        const useEquipment = useEquipmentStore();
        return { useEquipment};
    },
    mounted() {
        this.useEquipment.getEquipment(this.$route.params.id)
    },
}
</script>

<style scoped>

</style>
