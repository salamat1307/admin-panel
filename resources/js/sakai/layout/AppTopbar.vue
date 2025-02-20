<script setup>
import { useLayout } from '@/sakai/layout/composables/layout';
import AppConfigurator from './AppConfigurator.vue';
import NavLink from "@/Components/NavLink.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
const { onMenuToggle, toggleDarkMode, isDarkTheme } = useLayout();
</script>
<style>
.st0{fill:#fff}
</style>

<template>
    <div class="layout-topbar">
        <div class="layout-topbar-logo-container">
            <nav-link href="/dashboard" class="layout-topbar-logo">
                <svg v-if="!isDarkTheme" xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1" x="0" y="0" viewBox="0 0 143.9 48.4" xml:space="preserve"><path d="M33.6 44.6H1.9c-1.1 0-1.9-.9-1.9-1.9V7.4c0-1.1.9-1.9 1.9-1.9h31.6c1.1 0 1.9.9 1.9 1.9v35.2c.1 1.1-.8 2-1.8 2z" fill="#9ae2d6"/><path d="M37.1 41H5.5c-1.1 0-1.9-.9-1.9-1.9V3.9C3.5 2.8 4.4 2 5.5 2h31.6c1.1 0 1.9.8 1.9 1.9v35.2c0 1-.8 1.9-1.9 1.9z" fill="#1aab9a"/><path d="M34.8 36.4H15.3c-.7 0-1.6-.1-2.5-.4-.9-.3-1.7-.7-2.5-1.3-.8-.6-1.4-1.4-1.9-2.4s-.8-2.1-.8-3.5V9.3c0-.4.1-.7.2-1.1.1-.3.3-.6.6-.9.2-.2.5-.4.9-.6.3-.1.7-.2 1.1-.2h24.4V12H13.2v16.8c0 .7.2 1.2.6 1.6.4.4.9.6 1.6.6h19.5v5.4zm-2.4-12.2H15.3v-5.4h17.1v5.4z" fill="#fff"/><path class="st3" d="M74.6 27.4c0 1.1-.1 2-.4 2.9s-.6 1.6-1.1 2.3-1 1.2-1.6 1.7c-.6.5-1.2.8-1.9 1.1-.6.3-1.3.5-1.9.6s-1.3.2-1.9.2H45v-5.4h20.9c1 0 1.8-.3 2.4-.9.6-.6.9-1.4.9-2.5 0-.5-.1-1-.2-1.4s-.4-.8-.7-1.1c-.3-.3-.6-.5-1-.7-.4-.2-.9-.2-1.4-.2H53.4c-.9 0-1.8-.2-2.8-.5-1-.3-2-.8-2.8-1.5-.9-.7-1.6-1.6-2.2-2.7-.6-1.1-.9-2.5-.9-4.1s.3-3 .9-4.1c.6-1.1 1.3-2 2.2-2.7.9-.7 1.8-1.2 2.8-1.5 1-.3 2-.5 2.8-.5h18.4v5.4H53.4c-1 0-1.8.3-2.4.9-.6.6-.9 1.4-.9 2.5 0 1 .3 1.9.9 2.5.6.6 1.4.9 2.4.9h12.4c.6 0 1.2.1 1.9.2s1.3.4 1.9.7c.6.3 1.3.7 1.8 1.2.6.5 1.1 1 1.5 1.7.5.7.8 1.4 1.1 2.2.4.8.6 1.8.6 2.8zM107.2 16.4c0 1.2-.2 2.3-.5 3.3s-.7 1.8-1.2 2.6c-.5.7-1.1 1.4-1.8 1.9s-1.4 1-2.1 1.3c-.7.3-1.5.6-2.2.7-.8.2-1.5.2-2.1.2H95v9.8h-5.4v-9.8h-2.2c-.7 0-1.4-.1-2.1-.2-.8-.2-1.5-.4-2.2-.7-.7-.3-1.5-.8-2.1-1.3-.7-.5-1.3-1.2-1.8-1.9s-.9-1.6-1.2-2.6-.5-2.1-.5-3.3v-10h5.4v10c0 .7.1 1.3.3 1.9.2.6.5 1 .9 1.4s.9.7 1.5.9c.6.2 1.2.3 1.9.3h9.8c.5-.1 1-.2 1.6-.3.5-.1 1-.4 1.5-.7.4-.3.8-.8 1.1-1.3.3-.6.4-1.3.4-2.3v-10h5.4v10.1zM140.7 27.4c0 1.1-.1 2-.4 2.9-.3.9-.6 1.6-1.1 2.3-.4.7-1 1.2-1.6 1.7-.6.5-1.2.8-1.9 1.1-.6.3-1.3.5-1.9.6-.7.1-1.3.2-1.9.2H111v-5.4h21c1 0 1.8-.3 2.4-.9.6-.6.9-1.4.9-2.5 0-.5-.1-1-.2-1.4s-.4-.8-.7-1.1c-.3-.3-.6-.5-1-.7-.4-.2-.9-.2-1.4-.2h-12.4c-.9 0-1.8-.2-2.8-.5-1-.3-2-.8-2.8-1.5-.9-.7-1.6-1.6-2.2-2.7s-.9-2.5-.9-4.1.3-3 .9-4.1 1.3-2 2.2-2.7c.9-.7 1.8-1.2 2.8-1.5 1-.3 2-.5 2.8-.5H138v5.4h-18.4c-1 0-1.8.3-2.4.9-.6.6-.9 1.4-.9 2.5 0 1 .3 1.9.9 2.5.6.6 1.4.9 2.4.9H132c.6 0 1.2.1 1.9.2s1.3.4 1.9.7c.6.3 1.3.7 1.8 1.2.6.5 1.1 1 1.6 1.7.4.7.8 1.4 1.1 2.2s.4 1.8.4 2.8z"/>
                </svg>
                <svg v-else version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 116.9 35.6" xml:space="preserve"><path class="st0" d="M30.7 0H4.9C3.8 0 3 .9 3 1.9v28.7c0 1.1.9 1.9 1.9 1.9h25.8c1.1 0 1.9-.9 1.9-1.9V1.9c0-1-.8-1.9-1.9-1.9zm-1.6 8.4H11v14.1c0 .6.2 1 .5 1.4s.8.5 1.4.5h16.3v4.5H12.8c-.6 0-1.3-.1-2.1-.3-.7-.2-1.4-.6-2.1-1.1s-1.2-1.2-1.6-2c-.4-.8-.6-1.8-.6-3V6.1c0-.3.1-.6.2-.9.2-.2.3-.5.5-.7.2-.2.5-.4.8-.5.3-.1.6-.2.9-.2h20.3v4.6zm-2 5.6v4.6H12.8V14h14.3z"/><path d="M4.9 32.6c-1.1 0-1.9-.9-1.9-1.9V3H2C.9 3 0 3.8 0 4.9v28.7c0 1.1.9 1.9 1.9 1.9h25.8c1.1 0 1.9-.9 1.9-1.9v-1H4.9z" fill="#dee0e0"/><path class="st0" d="M61.6 21.3c0 .9-.1 1.7-.3 2.4-.2.7-.5 1.3-.9 1.9-.4.5-.8 1-1.3 1.4-.5.4-1 .7-1.5.9-.5.2-1.1.4-1.6.5-.6.1-1.1.2-1.6.2H36.9v-4.5h17.4c.9 0 1.5-.3 2-.8s.7-1.2.7-2.1c0-.4-.1-.8-.2-1.1-.1-.3-.3-.6-.5-.9-.2-.3-.5-.5-.9-.6s-.7-.2-1.1-.2H44c-.7 0-1.5-.1-2.4-.4s-1.6-.7-2.4-1.3c-.7-.6-1.3-1.3-1.8-2.3-.5-.9-.7-2.1-.7-3.4s.2-2.5.7-3.4c.5-.9 1.1-1.7 1.8-2.3.7-.6 1.5-1 2.4-1.3s1.6-.4 2.4-.4h15.4v4.5H44c-.9 0-1.5.3-2 .8s-.7 1.2-.7 2.1c0 .9.2 1.6.7 2.1.5.5 1.1.8 2 .8h10.4c.5 0 1 .1 1.5.2s1.1.3 1.6.6 1.1.6 1.5 1c.5.4.9.9 1.3 1.4.4.5.7 1.2.9 1.9.3.6.4 1.4.4 2.3zM88.9 12c0 1-.1 2-.4 2.8s-.6 1.5-1 2.1c-.4.6-.9 1.1-1.5 1.6s-1.2.8-1.8 1.1c-.6.3-1.2.5-1.9.6-.6.1-1.2.2-1.8.2h-1.8v8.2h-4.6v-8.2h-1.8c-.6 0-1.1-.1-1.8-.2-.6-.1-1.3-.3-1.9-.6-.6-.3-1.2-.6-1.8-1.1-.6-.4-1.1-1-1.5-1.6-.4-.6-.8-1.3-1-2.2S64 13.1 64 12V3.7h4.5V12c0 .6.1 1.1.3 1.6.2.5.4.9.8 1.2s.7.6 1.2.8c.5.2 1 .3 1.6.3h8.2c.4-.1.9-.2 1.3-.3.5-.1.9-.3 1.2-.6.4-.3.7-.6.9-1.1.2-.5.4-1.1.4-1.9V3.7h4.5V12zM116.9 21.3c0 .9-.1 1.7-.3 2.4-.2.7-.5 1.3-.9 1.9-.4.5-.8 1-1.3 1.4-.5.4-1 .7-1.5.9-.5.2-1.1.4-1.6.5-.6.1-1.1.2-1.6.2H92.2v-4.5h17.4c.9 0 1.5-.3 2-.8s.7-1.2.7-2.1c0-.4-.1-.8-.2-1.1-.1-.3-.3-.6-.5-.9-.2-.3-.5-.5-.9-.6s-.7-.2-1.1-.2H99.2c-.7 0-1.5-.1-2.4-.4s-1.6-.7-2.4-1.3c-.7-.6-1.3-1.3-1.8-2.3-.5-.9-.7-2.1-.7-3.4s.2-2.5.7-3.4c.5-.9 1.1-1.7 1.8-2.3.7-.6 1.5-1 2.4-1.3s1.6-.4 2.4-.4h15.4v4.5H99.2c-.9 0-1.5.3-2 .8s-.7 1.2-.7 2.1c0 .9.2 1.6.7 2.1.5.5 1.1.8 2 .8h10.4c.5 0 1 .1 1.5.2s1.1.3 1.6.6 1.1.6 1.5 1c.5.4.9.9 1.3 1.4.4.5.7 1.2.9 1.9.4.6.5 1.4.5 2.3z"/></svg>
            </nav-link>
            <button class="layout-menu-button layout-topbar-action hidden" @click="onMenuToggle">
                <i class="pi pi-bars"></i>
            </button>
        </div>

        <div class="layout-topbar-actions">
            <div class="layout-config-menu">
                <button type="button" class="layout-topbar-action" @click="toggleDarkMode">
                    <i :class="['pi', { 'pi-moon': isDarkTheme, 'pi-sun': !isDarkTheme }]"></i>
                </button>
            </div>

            <button
                class="layout-topbar-menu-button layout-topbar-action"
                v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }"
            >
                <i class="pi pi-ellipsis-v"></i>
            </button>

            <div class="layout-topbar-menu hidden lg:block">
                <div class="layout-topbar-menu-content">
                    <div class="relative">
                        <button type="button" class="layout-topbar-action" v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }">
                            <i class="pi pi-user"></i>
                            <span>Profile</span>
                        </button>
                        <div class="hidden bg-white shadow-md absolute right-0 mt-2 w-48 py-2 rounded-md">
                            <DropdownLink :href="route('logout')" method="post" as="button">
                                            Выйти
                                        </DropdownLink>
                            <!-- <button class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
