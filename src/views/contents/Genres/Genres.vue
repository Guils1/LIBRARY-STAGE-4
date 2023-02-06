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
            <div class="-my-8 divide-y-2 divide-gray-100">
                <div class="mb-10"><router-link to="/genres/create">
                    <img src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
                </router-link></div>
                <div class="py-8 flex flex-wrap md:flex-nowrap" v-for="genre in genres" :key="genre.id">
                    <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                        <span class="font-semibold title-font text-gray-700">{{ genre.name }}</span>
                        <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
                    </div>
                    <div class="md:flex-grow">
                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Bitters hashtag waistcoat fashion
                            axe chia unicorn</h2>
                        <p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist
                            pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke
                            vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>
                        <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
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