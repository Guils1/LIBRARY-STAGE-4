<template>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Suppliers</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Suppliers are not only related to the quality of a company's products and services, but also play an important role in ensuring that delivery deadlines are met. And this is directly related to availability.</p>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <div class="mb-10"><router-link to="/suppliers/create">
                    <img src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
                </router-link></div>
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                Name</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Email</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Address</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Contact</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="supplier in suppliers" :key="supplier.id">
                            <td class="px-4 py-3">{{ supplier.name }}</td>
                            <td class="px-4 py-3">{{ supplier.email }}</td>
                            <td class="px-4 py-3">{{ supplier.address }}</td>
                            <td class="px-4 py-3 text-gray-900">{{ supplier.contact_phone }}</td>
                            <td class="px-4 py-3 text-gray-900">
                                <a href="">Edit</a>
                                <a href="" class="ml-2">Delete</a>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </section>
</template>

<script>
import api from '@/services/api.js';

export default {
    data() {
        return {
            suppliers: [],
        }
    },
    mounted() {
        api.get('suppliers').then(response => {
            this.suppliers = response.data;
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