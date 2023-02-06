<template>
    <header class="text-gray-600 body-font">

        <div class="container mx-auto flex flex-wrap p-2 flex-col md:flex-row items-center">
            <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <a class="mr-5 hover:text-gray-900">
                    <router-link to="/">
                        <img src="https://cdn-icons-png.flaticon.com/512/6490/6490332.png" alt="">
                    </router-link>
                </a>
                <a class="mr-5 hover:text-gray-900">
                    <router-link to="/authors">
                        <img src="https://cdn-icons-png.flaticon.com/512/1995/1995463.png" alt="">
                    </router-link>
                </a>
                <a class="mr-5 hover:text-gray-900">
                    <router-link to="/books">
                        <img src="https://cdn-icons-png.flaticon.com/512/3145/3145740.png" alt="">
                    </router-link>
                </a>
                <a class="mr-5 hover:text-gray-900">
                    <router-link to="/customers">
                        <img src="https://cdn-icons-png.flaticon.com/512/3239/3239045.png" alt="">
                    </router-link>
                </a>
                <a class="mr-5 hover:text-gray-900">
                    <router-link to="/genres">
                        <img src="https://cdn-icons-png.flaticon.com/512/8688/8688335.png" alt="">
                    </router-link>
                </a>
                <a class="mr-5 hover:text-gray-900">
                    <router-link to="/suppliers">
                        <img src="https://cdn-icons-png.flaticon.com/512/8897/8897936.png" alt="">
                    </router-link>
                </a>
                <a class="mr-5 hover:text-gray-900">
                    <a @click="logout">
                        <img src="https://cdn-icons-png.flaticon.com/512/9622/9622942.png" alt="">
                    </a>
                </a>
            </nav>
            <a
                class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
                <img id="img" src="https://cdn-icons-png.flaticon.com/512/5013/5013688.png" alt="">
            </a>
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
                <button v-show="show"
                    class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
                    {{ user.name }}
                </button>
            </div>
        </div>
    </header>
</template>

<script>
import api from '@/services/api.js';
// import { ref } from 'vue';

export default {
    data() {
        return {
            user: [],
            show: false
        }
    },
    mounted() {
        api.post('me').then(response => {
            this.user = response.data;
        })
    }
};
</script>

<style scoped>
a img {
    width: 1.5em;
}

#img {
    width: 2.6em;
}

header {
    background-image: linear-gradient(to right, #F24236, #080357);
}
</style>
