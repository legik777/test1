<template >
    <div class="w-full flex-col flex justify-center items-center">
        <div class="inline-flex">
            <div class="my-4 mx-2">
                <RouterLink :to="{ name: 'equipment.type' }"
                    class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Типы оборудования
                </RouterLink>
            </div>
            <div class="my-4 mx-2">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer"
                    @click="this.$router.push({ name: 'equipment.create' })">
                    Добавить новое оборудование
                </a>
            </div>
        </div>
        <div>
            <select class="bg-gray-500 rounded text-white" @change="this.useEquipment.getEquipments(1, this.perPage)"
                v-model="this.perPage">
                <option value="5" default>5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option :value="this.equipments?.meta?.total">Все</option>
            </select>
            <table>
                <thead>
                    <tr>
                        <td>Код типа оборудования</td>
                        <td>Серийный номер</td>
                        <td>Примечание</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="row, index in this.equipments.data" :key="index">
                        <tr class="cursor-pointer"
                            @click="this.$router.push({ name: 'equipment.show', params: { id: row.id } })">
                            <td>{{ row.equipment_type_id }}</td>
                            <td>{{ row.serial_number }}</td>
                            <td>{{ row.note }}</td>
                            <td class="pl-3">
                                <PencilIcon
                                    @click.stop="this.$router.push({ name: 'equipment.edit', params: { id: row.id } })"
                                    class="h-4 w-4 hover:text-green-700" />
                            </td>
                            <td class="pl-3">
                                <TrashIcon @click.stop="this.useEquipment.deleteEquipment(row.id)"
                                    class="h-4 w-4 hover:text-red-700" />
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        <TailwindPagination class="p-2" :data="this.equipments" @pagination-change-page="this.useEquipment.getEquipments">
            <template v-slot:prev-nav>назад</template>
            <template v-slot:next-nav>вперёд</template>
        </TailwindPagination>
    </div>
</template>

<script>
import { TailwindPagination } from 'laravel-vue-pagination';
import { PencilIcon } from '@heroicons/vue/20/solid'
import { TrashIcon } from '@heroicons/vue/20/solid'
import { useEquipmentStore } from "../stores/EquipmentStore"
import { mapWritableState } from "pinia";

export default {
    name: 'Main',
    setup() {
        const useEquipment = useEquipmentStore();
        return { useEquipment };
    },
    computed: {
        ...mapWritableState(useEquipmentStore, ['equipments', 'perPage']),
    },
    mounted() {
        this.useEquipment.setQuery(this.$route.query)
        this.useEquipment.getEquipments()
    },
    components: {
        TailwindPagination,
        PencilIcon,
        TrashIcon,
    },
}
</script>

