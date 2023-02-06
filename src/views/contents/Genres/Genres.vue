<template>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Genres</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">The book is of fundamental importance for the development of societies and for the intellectual growth of individuals. It is what allows human beings to record important facts of their history and pass on such facts to later societies, acting as a vector of knowledge.</p>
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