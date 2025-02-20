<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref, onMounted } from 'vue';

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};

const isLoaded = ref(false);

onMounted(() => {
  setTimeout(() => {
    isLoaded.value = true;
  }, 1000); 
});

</script>



<template>
    <div class="flex items-center justify-center min-h-screen min-w-[100vw] overflow-hidden bg-[#EBECF0]">
        <div class="flex flex-col items-center justify-center">
            <div class="relative" v-if="isLoaded">
                <div class="bg-[#9AE2D6] w-full h-full absolute bottom-[-6px] left-[-6px] rounded z-10"></div>
                <div class="w-full bg-surface-0 py-10 px-8 sm:px-8 rounded relative z-20">
                    <div class="text-center mb-8">
                        <div class="flex justify-center mb-10">
                            <svg class="h-[50px]" xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1" x="0" y="0" viewBox="0 0 143.9 48.4" xml:space="preserve"><path d="M33.6 44.6H1.9c-1.1 0-1.9-.9-1.9-1.9V7.4c0-1.1.9-1.9 1.9-1.9h31.6c1.1 0 1.9.9 1.9 1.9v35.2c.1 1.1-.8 2-1.8 2z" fill="#9ae2d6"/><path d="M37.1 41H5.5c-1.1 0-1.9-.9-1.9-1.9V3.9C3.5 2.8 4.4 2 5.5 2h31.6c1.1 0 1.9.8 1.9 1.9v35.2c0 1-.8 1.9-1.9 1.9z" fill="#1aab9a"/><path d="M34.8 36.4H15.3c-.7 0-1.6-.1-2.5-.4-.9-.3-1.7-.7-2.5-1.3-.8-.6-1.4-1.4-1.9-2.4s-.8-2.1-.8-3.5V9.3c0-.4.1-.7.2-1.1.1-.3.3-.6.6-.9.2-.2.5-.4.9-.6.3-.1.7-.2 1.1-.2h24.4V12H13.2v16.8c0 .7.2 1.2.6 1.6.4.4.9.6 1.6.6h19.5v5.4zm-2.4-12.2H15.3v-5.4h17.1v5.4z" fill="#fff"/><path class="st3" d="M74.6 27.4c0 1.1-.1 2-.4 2.9s-.6 1.6-1.1 2.3-1 1.2-1.6 1.7c-.6.5-1.2.8-1.9 1.1-.6.3-1.3.5-1.9.6s-1.3.2-1.9.2H45v-5.4h20.9c1 0 1.8-.3 2.4-.9.6-.6.9-1.4.9-2.5 0-.5-.1-1-.2-1.4s-.4-.8-.7-1.1c-.3-.3-.6-.5-1-.7-.4-.2-.9-.2-1.4-.2H53.4c-.9 0-1.8-.2-2.8-.5-1-.3-2-.8-2.8-1.5-.9-.7-1.6-1.6-2.2-2.7-.6-1.1-.9-2.5-.9-4.1s.3-3 .9-4.1c.6-1.1 1.3-2 2.2-2.7.9-.7 1.8-1.2 2.8-1.5 1-.3 2-.5 2.8-.5h18.4v5.4H53.4c-1 0-1.8.3-2.4.9-.6.6-.9 1.4-.9 2.5 0 1 .3 1.9.9 2.5.6.6 1.4.9 2.4.9h12.4c.6 0 1.2.1 1.9.2s1.3.4 1.9.7c.6.3 1.3.7 1.8 1.2.6.5 1.1 1 1.5 1.7.5.7.8 1.4 1.1 2.2.4.8.6 1.8.6 2.8zM107.2 16.4c0 1.2-.2 2.3-.5 3.3s-.7 1.8-1.2 2.6c-.5.7-1.1 1.4-1.8 1.9s-1.4 1-2.1 1.3c-.7.3-1.5.6-2.2.7-.8.2-1.5.2-2.1.2H95v9.8h-5.4v-9.8h-2.2c-.7 0-1.4-.1-2.1-.2-.8-.2-1.5-.4-2.2-.7-.7-.3-1.5-.8-2.1-1.3-.7-.5-1.3-1.2-1.8-1.9s-.9-1.6-1.2-2.6-.5-2.1-.5-3.3v-10h5.4v10c0 .7.1 1.3.3 1.9.2.6.5 1 .9 1.4s.9.7 1.5.9c.6.2 1.2.3 1.9.3h9.8c.5-.1 1-.2 1.6-.3.5-.1 1-.4 1.5-.7.4-.3.8-.8 1.1-1.3.3-.6.4-1.3.4-2.3v-10h5.4v10.1zM140.7 27.4c0 1.1-.1 2-.4 2.9-.3.9-.6 1.6-1.1 2.3-.4.7-1 1.2-1.6 1.7-.6.5-1.2.8-1.9 1.1-.6.3-1.3.5-1.9.6-.7.1-1.3.2-1.9.2H111v-5.4h21c1 0 1.8-.3 2.4-.9.6-.6.9-1.4.9-2.5 0-.5-.1-1-.2-1.4s-.4-.8-.7-1.1c-.3-.3-.6-.5-1-.7-.4-.2-.9-.2-1.4-.2h-12.4c-.9 0-1.8-.2-2.8-.5-1-.3-2-.8-2.8-1.5-.9-.7-1.6-1.6-2.2-2.7s-.9-2.5-.9-4.1.3-3 .9-4.1 1.3-2 2.2-2.7c.9-.7 1.8-1.2 2.8-1.5 1-.3 2-.5 2.8-.5H138v5.4h-18.4c-1 0-1.8.3-2.4.9-.6.6-.9 1.4-.9 2.5 0 1 .3 1.9.9 2.5.6.6 1.4.9 2.4.9H132c.6 0 1.2.1 1.9.2s1.3.4 1.9.7c.6.3 1.3.7 1.8 1.2.6.5 1.1 1 1.6 1.7.4.7.8 1.4 1.1 2.2s.4 1.8.4 2.8z"/></svg>
                        </div>
                    </div>

                    <form @submit.prevent="submit">
                        <div>
                            <label for="email1" class="block text-surface-900 text font-medium mb-1">Логин</label>
                            <InputText id="email1" type="text" placeholder="test@mail.uz" class="w-full md:w-[24rem] mb-3 border-radius-login" v-model="form.email" />
                            <Message v-if="form.errors.email" class="" severity="error">{{ form.errors.email }}</Message>

                            <label for="password1" class="block text-surface-900 font-medium text mb-1 mt-3">Пароль</label>
                            <Password id="password1" v-model="form.password" placeholder="*******" :toggleMask="true" class="mb-4 border-radius-login" fluid :feedback="false"></Password>
                            <Message v-if="form.errors.password" class="" severity="error">{{ form.errors.password }}</Message>

                            <div class="flex items-center justify-between mt-2 mb-8 gap-8">
                                <div class="flex items-center">
                                    <Checkbox v-model="form.remember" id="rememberme1" binary class="mr-2"></Checkbox>
                                    <label for="rememberme1">Запомнить</label>
                                </div>                                
                            </div>
                            <Button type="submit" label="Войти" class="w-full bg-[#1AAB9A!important] border-radius-login"></Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.pi-eye {
    transform: scale(1.6);
    margin-right: 1rem;
}

.pi-eye-slash {
    transform: scale(1.6);
    margin-right: 1rem;
}

.border-radius-login {
    border-radius: 0.25rem !important;
}
</style>
