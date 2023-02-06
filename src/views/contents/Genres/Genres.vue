<template>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Genres</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">The book is of fundamental importance for the
                    development of societies and for the intellectual growth of individuals. It is what allows human
                    beings to record important facts of their history and pass on such facts to later societies, acting
                    as a vector of knowledge.</p>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <div class="mb-10"><router-link to="/genres/create">
                        <img src="https://cdn-icons-png.flaticon.com/512/9218/9218728.png" alt="register">
                    </router-link></div>

                <table v-if="genres" class="table-auto w-full text-center whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-red-900 text-sm bg-gray-300"
                                id="name">Name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-red-900 text-sm bg-gray-300"
                                id="name">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="genre in genres" :key="genre.id">
                            <td class="px-4 py-3">{{ genre.name }}</td>
                            <td class="flex justify-center flex-row flex-grow-0 text-gray-900">
                                <a href="" class="p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a href="" class="p-4 text-red">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>

                </table>

                <table v-else class="table w-full text-center whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 w-full py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"
                                id="alert">There are no registered textual genres yet   </th>
                        </tr>
                    </thead>
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
        })
    }
};
</script>

<style scoped>
img {
    width: 2.8em;
}
</style>