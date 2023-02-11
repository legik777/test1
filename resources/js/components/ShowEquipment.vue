<template>
    <div class="w-full h-screen">

        <div
            class="container mx-auto h-full flex flex-1 justify-center items-start md:items-center lg:items-center xl:items-center 2xl:items-center">
            <div class="w-full max-w-lg">
                <div class="max-w-xl m-4  p-10 bg-white rounded shadow-xl ">
                    <template v-if="this.equipment">
                        <div>id: {{ this.equipment.id }}</div>
                        <div>Тип: {{ this.equipment.equipment_type_id }}</div>
                        <div>Серийный номер: {{ this.equipment.serial_number }}</div>
                        <div>Примечание: {{ this.equipment.note }}</div>
                    </template>
                    <template v-if="this.errors">
                        <div>{{ this.errors.message }}</div>
                    </template>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'ShowEquipment',
    data() {
        return {
            id: null,
            equipment: null,
            errors: null,
        }
    },
    mounted() {
        this.id = this.$route.params.id;
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
