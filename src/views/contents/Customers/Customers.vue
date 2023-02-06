<template>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col">
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-indigo-500"></div>
                </div>
                <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                    <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">Customers</h1>
                    <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0">The book is of fundamental importance for the development of societies and for the intellectual growth of individuals. It is what allows human beings to record important facts of their history and pass on such facts to later societies, acting as a vector of knowledge.</p>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="mb-10"><router-link to="/customers/create">
                    <img src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
                </router-link></div>
                <div class="lg:w-1/3 lg:mb-0 mb-6 p-4" v-for="customer in customers" :key="customer.id">
                    <div class="h-full text-center">
                        <img alt="testimonial"
                            class="w-20 h-20 mb-8 object-cover object-center rounded-full inline-block border-2 border-gray-200 bg-gray-100"
                            src="https://dummyimage.com/302x302">
                        <p class="leading-relaxed"></p>
                        <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-6 mb-4"></span>
                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">{{ customer.name }}</h2>
                        <p class="text-gray-500">Gênero favorito: {{ customer.favorite_genre }}</p>
                    </div>
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
            console.log(response.data);
        })
    }
};
</script>

<style scoped>
img {
    width: 2.8em;
}
</style>