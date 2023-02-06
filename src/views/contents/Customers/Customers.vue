<template>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="bg-orange-100 border-l-4 border-gray-500 text-gray-700 p-4" role="alert">
                    <p class="font-bold">This page is under maintenance</p>
                    <p>Sorry for the inconvenience.<br>Our website is undergoing scheduled maintenance<br>Thank you for your understanding.</p>
                </div>
            </div>

            <div class="flex flex-col mt-20">
                <div class="h-1 bg-gray-200 rounded overflow-hidden mt-10">
                </div>
                <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                    <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0"></h1>
                    <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0"></p>
                </div>
            </div>
        
        </div>
    </section>
</template>

<script>
import api from '@/services/api.js';

export default {
    data() {
        return {
            customers: [],
        }
    },
    mounted() {
        api.get('customers').then(response => {
            this.customers = response.data;
        })
    }
};
</script>

<style scoped>
img {
    width: 2.8em;
}
</style>