<script setup>
import { useForm } from "@inertiajs/vue3";
import { watchEffect } from "vue";

const props = defineProps({
    show: Boolean,
    title: String,
    partner: Object,
});

const emit = defineEmits(["close"]);

const form = useForm({
    id:null,
    name: null,
    link: null,
    image: null,    
});

// To handle the file
const onFileSelect = (event) => {
    if (event.files && event.files[0]) {
        form.image = event.files[0]; // Set the file directly to form.image
    }
};

const update = () => {    
    form.post(route("partners.update", form.id), {
        preserveScroll: true,
        onSuccess: () => {
            emit("close");
            form.reset();
        },
        onError: () => null,
        onFinish: () => null,
    });
};

watchEffect(() => {
    if (props.show) {
        form.errors = {}
        form.id = props.partner?.id
        form.name = props.partner?.name
        form.link = props.partner?.link
    }
});
</script>

<template>
     <Dialog v-model:visible="props.show" position="top" modal header="Редактировать" :style="{ width: '40rem' }" :closable="true">
        <form @submit.prevent="update">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-y-1 mb-3">
                    <label for="name">Название</label>
                    <InputText id="name" v-model="form.name" class="flex-auto" autocomplete="off" placeholder="Wedigital" />    
                    <small v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</small>  
                </div>
                <div class="flex flex-col gap-y-1 mb-3">
                    <label for="link">Ссылка</label>
                    <InputText id="link" v-model="form.link" class="flex-auto" autocomplete="off" placeholder="https://wedigital.uz" />
                    <small v-if="form.errors.link" class="text-red-500">{{ form.errors.link }}</small>  
                </div>
                <div class="flex flex-col gap-y-1 mb-3">
                    <label for="image">Логотип</label>
                    <FileUpload @select="onFileSelect" name="image" accept="image/*" :maxFileSize="100000000">
                        <template #header="{ chooseCallback, clearCallback, files }">
                            <div class="flex flex-wrap justify-between items-center flex-1 gap-4">
                                <div class="flex gap-2">
                                    <Button @click="chooseCallback()" icon="pi pi-images" rounded outlined severity="secondary"></Button>
                                    <Button @click="clearCallback()" icon="pi pi-times" rounded outlined severity="danger" :disabled="!files || files.length === 0"></Button>
                                </div>                                
                            </div>
                        </template>
                        <template #empty>
                            <span>Перетащите файлы сюда для загрузки..</span>
                        </template>
                    </FileUpload>
                    <small v-if="form.errors.image" class="text-red-500">{{ form.errors.image }}</small>  
                </div>
                <div class="flex justify-end gap-2">
                    <Button type="button" label="Отменить" severity="secondary" @click="emit('close')"></Button>
                    <Button type="submit" label="Сохранить"></Button>
                </div> 
            </div>
        </form>
    </Dialog>
</template>
