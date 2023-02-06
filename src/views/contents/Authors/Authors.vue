<template>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Authors</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Writers not only contribute to the cultural
                    formation of a place, but also to people's learning process. After all, many of the books produced
                    by the writers are used in the classroom to discuss aspects related to Brazil and other countries.
                </p>
            </div>

            <div class="mb-10"><router-link to="/authors/create">
                    <img id="img" src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
                </router-link></div>

            <div v-if="authors" class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full" v-for="author in authors" :key="author.id">
                    <a href="" @click="author">
                        <a class="block relative h-48 rounded overflow-hidden" href="">
                            <img alt="authors" class="object-cover object-center w-full h-full block"
                                src="https://i.em.com.br/qLHzeECVDHr522qtpIOK67YMQtk=/790x/smart/imgsapp.em.com.br/app/noticia_127983242361/2020/06/26/1159973/20200625184351361767e.jpg">
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 ml-3">Autor</h3>
                            <h2 class="text-gray-900 title-font text-lg font-medium ml-3">{{ author.name }}</h2>
                            <p class="mt-1 ml-3">{{ author.biography }}</p>
                        </div>
                    </a>
                </div>
            </div>

            <div v-else class="bg-blue-100 border-t border-b border-blue-100 text-orange-800 px-4 py-3"
                role="alert">
                <p class="font-bold text-center">There are no registered authors yet</p>
                <p class="text-sm text-center">Let's not leave this empty, right? Register an author right now.</p>
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
        })
    }
};
</script>

<style scoped>
#img {
    width: 2.8em;
}
</style>