<template>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col">
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-indigo-500"></div>
                </div>
                <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                    <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">Books</h1>
                    <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0">The book is of fundamental importance for the development of societies and for the intellectual growth of individuals. It is what allows human beings to record important facts of their history and pass on such facts to later societies, acting as a vector of knowledge.</p>
                </div>
            </div>
            <div class="mb-10"><router-link to="/books/create">
                <img src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
            </router-link></div>
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4" >
                <div class="p-4 md:w-1/3 sm:mb-0 mb-6" v-for="book in books" :key="book.id">
                    <div class="rounded-lg h-64 w-full overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full"
                            src="data:image/jpeg;base64,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">
                    </div>
                    <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{ book.name }} </h2>
                    <p class="text-base leading-relaxed mt-2">Swag shoivdigoitch literally meditation subway tile tumblr
                        cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
                    <a class="text-indigo-500 inline-flex items-center mt-3">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div >
            
        </div>  
    </section>
</template>

<script>
import api from '@/services/api.js';

export default {
    data() {
        return {
            books: [],
        }
    },
    mounted() {
        api.get('books').then(response => {
            this.books = response.data;
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