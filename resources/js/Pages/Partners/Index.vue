<script setup>
import AppLayout from "@/sakai/layout/AppLayout.vue";
import Create from "@/Pages/Partners/Create.vue";
import Edit from "@/Pages/Partners/Edit.vue";
import PageHeader from '@/Components/PageHeader.vue';
import { usePage, useForm } from '@inertiajs/vue3';

import { onMounted, reactive, ref, watch, computed } from "vue";
import pkg from "lodash";
import { router } from "@inertiajs/vue3";
const { _, debounce, pickBy } = pkg;
import { loadToast } from '@/composables/loadToast';

const props = defineProps({
    title: String,
    filters: Object,
    partners: Object,
    perPage: Number,
});

loadToast();

const deleteDialog = ref(false);
const form = useForm({});

const data = reactive({
    params: {
        search: props.filters.search,
        field: props.filters.field,
        order: props.filters.order,
        // perPage: props.perPage,
        createOpen: false,
        editOpen: false,
    },
    partner: null,
});

const deleteData = () => {
    deleteDialog.value = false;
    form.delete(route("partners.destroy", data.partner?.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
        onError: () => null,
        onFinish: () => null,
    });
}

const onPageChange = (event) => {
    router.get(route('partners.index'), { page: event.page + 1 }, { preserveState: true });
};

watch(
    () => _.cloneDeep(data.params),
    debounce(() => {
        let params = pickBy(data.params);
        router.get(route("partners.index"), params, {
            replace: true,
            preserveState: true,
            preserveScroll: true,
        });
    }, 150)
);
</script>
<template>
    <app-layout>
        <div class="card">
            <div class="flex justify-between mb-4">
                <page-header title="Партнеры"/>
                <Button label="Создать" severity="secondary" @click="data.createOpen = true" icon="pi pi-plus-circle" />
            </div>
            <Create
                :show="data.createOpen"
                @close="data.createOpen = false"                
            />
            <Edit
                :show="data.editOpen"
                @close="data.editOpen = false"
                :partner="data.partner"
            />
            
            <DataTable lazy :value="partners.data" paginator  :rows="partners.per_page" :totalRecords="partners.total" :first="(partners.current_page - 1) * partners.per_page"   @page="onPageChange"  tableStyle="min-width: 50rem">
                <template #header>
                    <div class="flex justify-start">
                        <IconField>
                            <InputIcon>
                                <i class="pi pi-search" />
                            </InputIcon>
                            <InputText v-model="data.params.search" placeholder="Поиск" />
                        </IconField>
                    </div>
                </template>
                <template #empty> No data found. </template>
                <template #loading> Loading data. Please wait. </template>

                <Column header="№">
                    <template #body="slotProps">
                        {{slotProps.index + 1}}
                    </template>
                </Column>

                <Column field="name" header="Название"></Column>
                <Column field="link" header="Ссылка"></Column>                
                <Column field="image" header="Логотип">
                    <template #body="slotProps">
                        <Image :src="slotProps.data.image_format" alt="Image" width="80" height="80" />
                    </template>
                </Column>
                <Column :exportable="false" style="width: 120px">
                    <template #body="slotProps">
                        <Button icon="pi pi-pencil" outlined rounded class="mr-2"  @click="(data.editOpen = true), (data.partner = slotProps.data)" />
                        <Button icon="pi pi-trash" outlined rounded severity="danger" @click="deleteDialog = true; data.partner = slotProps.data" />
                    </template>
                </Column>
            </DataTable>
            <Dialog v-model:visible="deleteDialog" :style="{ width: '450px' }" header="Подтвердить" :modal="true">
                <div class="flex items-center gap-4">
                    <i class="pi pi-exclamation-triangle !text-3xl" />
                    <span v-if="data.partner">Вы уверены, что хотите удалить?</span
                    >
                </div>
                <template #footer>
                    <Button label="Нет" icon="pi pi-times" text @click="deleteDialog = false" />
                    <Button label="Да" icon="pi pi-check" @click="deleteData" />
                </template>
            </Dialog>
        </div>
    </app-layout>
</template>
<style scoped lang="scss">
</style>
