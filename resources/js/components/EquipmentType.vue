<template>
    <div class="w-full flex-col flex justify-center items-center">
        <div>
        <select class="bg-gray-500 rounded text-white" @change="this.getEquipmentType(1, this.per_page)" v-model="this.per_page">
            <option value="5" default>5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option :value="this.equipmentTypes?.meta?.total">Все</option>
        </select>

        <table>
            <thead>
                <tr>
                    <td>Наименование типа</td>
                    <td>Маска серийного номера</td>
                </tr>
            </thead>
            <tbody>
                <template v-for="row, index in this.equipmentTypes.data" :key="index">
                    <tr>
                        <td>{{ row.type_name }}</td>
                        <td>{{ row.serial_number_mask }}</td>
                    </tr>
                </template>
            </tbody>
        </table>


        <TailwindPagination :data="this.equipmentTypes" @pagination-change-page="this.getEquipmentType">
        </TailwindPagination>
    </div>
    </div>
</template>

<script>
import { TailwindPagination } from 'laravel-vue-pagination';

export default {
    name: 'EquipmentType',
    data() {
        return {
            equipmentTypes: [],
            per_page: 5,
        }
    },
    methods: {
        getEquipmentType(page = 1, per_page = 5) {
            this.axios.get(`/api/equipment-type/?page=${page}&per_page=${per_page}`)
                .then(response => {
                    console.log(response);
                    this.equipmentTypes = response.data
                    console.log(this.equipmentTypes);
                    this.pagination = response.data.meta
                })
        },
    },
    mounted() {
        this.getEquipmentType()
    },
    components: {
        TailwindPagination,
    },
}
</script>

<style scoped>

</style>
