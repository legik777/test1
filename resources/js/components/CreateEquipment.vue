<template>
    <div>
        <div class="w-full items-center justify-center flex mt-10">
            <div class="w-3/4">
                <div class="w-full justify-between inline-flex">
                    <div @click="this.addRow() " class="cursor-pointer rounded border-solid border-2 border-gray-400  mx-3 p-1">Добавить строку+</div>
                    <div @click="this.addEquipments()" class="cursor-pointer rounded border-solid border-2 border-gray-400  mx-3 p-1">Сохранить</div>
                </div>
                <div class="w-full text-red-900 my-3 mx-2 items-center justify-center flex">{{ msg }}</div>
                <div class="w-full justify-center items-center flex">
                    <table>
                        <template v-for="row, index in equipmentsCount" :key="index">
                            <tr>
                                <td><input type="text" v-model="this.equipments[index].equipment_type_id"
                                        class="bg-gray-200 m-2 rounded p-1" placeholder="Тип оборудования(id)"></td>
                                <td><input type="text" v-model="this.equipments[index].serial_number"
                                        class="bg-gray-200 m-2 rounded p-1" placeholder="Серийный номер">
                                </td>
                                <td><input type="text" v-model="this.equipments[index].note"
                                        class="bg-gray-200 m-2 rounded p-1" placeholder="Примечание"></td>
                            </tr>
                        </template>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateEquipment',
    data() {
        return {
            equipmentsCount: 0,
            equipments: [],
            msg:null,
        }
    },
    methods: {
        addRow() {
            this.equipmentsCount++
            this.equipments.push({ 'equipment_type_id': null, 'serial_number': null, 'note': null })
        },
        addEquipments() {
            this.error = null;
            this.axios.post('/api/equipment', { 'data': this.equipments })
                .then(response => {
                    if (response.data == "complete") {
                        this.msg = "Успешно сохранено"
                    } else {
                        this.msg = response.data
                    }
                })
        }
    },
    mounted() {
        this.addRow()
    }
}
</script>

<style scoped>

</style>
