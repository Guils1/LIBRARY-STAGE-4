<template>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Books</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">The book is of fundamental importance for the
                    development of societies and for the intellectual growth of individuals. It is what allows human
                    beings to record important facts of their history and pass on such facts to later societies, acting
                    as a vector of knowledge.</p>
            </div>


            <div class="mb-10"><router-link to="/books/create">
                    <img id="img" src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
                </router-link></div>


                
            <div v-if="books" class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                <div class="p-4 md:w-1/3 sm:mb-0 mb-6" v-for="book in books" :key="book.id">
                    <div class="rounded-lg h-64 w-full overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full"
                            src="https://fiverr-res.cloudinary.com/t_mobile_web_2,q_auto,f_auto/gigs/176798931/original/38d9fab8b8c73b1299c35a2372d77243a45a6211.jpg">
                    </div>
                    <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{ book.name }} </h2>
                    <p class="text-base leading-relaxed mt-2">{{ book.description }}</p>
                    <a class="text-indigo-500 inline-flex items-center mt-3">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>


            <div v-else class="bg-blue-100 border-t border-b border-blue-100 text-orange-800 px-4 py-3" role="alert">
                <p class="font-bold text-center">There are no books registered yet</p>
                <p class="text-sm text-center">Let's not leave this empty, right? Register a book right now.</p>
            </div>
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
        })
    }
};
</script>

<style scoped>
#img {
    width: 2.8em;
}
</style>