<template lang="">
    <a class="mr-5 hover:text-gray-900">
        
    </a>
    <section class="text-gray-600 body-font">
        
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col">
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-indigo-500"></div>
                </div>
                <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                    <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">Authors</h1>
                    <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0">Writers not only contribute to the cultural formation of a place, but also to people's learning process. After all, many of the books produced by the writers are used in the classroom to discuss aspects related to Brazil and other countries.</p>
                </div>
            </div>
            <div class="mb-10"><router-link to="/authors/create">
                <img src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
            </router-link></div>
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full" v-for="author in authors" :key="author.id">
                    <a href="" @click="author">
                        <a class="block relative h-48 rounded overflow-hidden" href="">
                        <img alt="authors" class="object-cover object-center w-full h-full block" src="">
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 ml-3">Autor</h3>
                            <h2 class="text-gray-900 title-font text-lg font-medium ml-3">{{author.name}}</h2>
                            <p class="mt-1 ml-3">{{author.biography}}</p>
                        </div>
                    </a>
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
            authors: [],
        }
    },
    methods: {
        author() {

        }
    },
    mounted() {
        api.get('authors').then(response => {
            this.authors = response.data;
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