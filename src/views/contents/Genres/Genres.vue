<template>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col">
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-indigo-500"></div>
                </div>
                <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                    <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">Genres</h1>
                    <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0">The book is of fundamental importance for the development of societies and for the intellectual growth of individuals. It is what allows human beings to record important facts of their history and pass on such facts to later societies, acting as a vector of knowledge.</p>
                </div>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <div class="mb-10"><router-link to="/genres/create">
                    <img src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
                </router-link></div>
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl" id="name">
                                Name</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="genre in genres" :key="genre.id">
                            <td class="px-4 py-3">{{ genre.name }}</td>
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
            genres: [],
        }
    },
    mounted() {
        api.get('genres').then(response => {
            this.genres = response.data;
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