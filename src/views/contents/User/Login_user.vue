<template>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-10 py-20 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap" id="section">
                <img alt="ecommerce" id="image-login" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center" src="https://img.freepik.com/vetores-gratis/ilustracao-do-conceito-de-login-movel_114360-135.jpg?w=740&t=st=1675537065~exp=1675537665~hmac=1eab993b9d76a2db11572c3e994cc94c92b9a6944bce47d6e5bdcf8435fd3e10">
                
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-14 mt-6 lg:mt-0">
                    <h2 class="text-lg title-font text-gray-900 mb-4">Login</h2>
                    <h2 class="text-base text-gray-500 mb-10">Bem vindo de volta, por favor entre na sua conta.</h2>
                    
                        <div class="relative mb-5">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                            </div>
                            <input v-model="email" type="email" id="email" class="block w-11/12 p-3 pl-10 text-sm border border-gray-300 rounded-lg " placeholder="Email" required>
                        </div>

                        <div class="relative mb-5">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                </svg>
                            </div>
                            <input v-model="password" type="password" id="password" class="block w-11/12 p-3 pl-10 text-sm border border-gray-300 rounded-lg " placeholder="Password" required>
                        </div>
                        
                        <button @click="submit" class="w-11/12 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
                        <p class="text-xs text-gray-500 mt-3">Ainda não tem conta? <a href=""><router-link to="/register">Casdastre-se</router-link></a>.</p>
                    </div>
            </div>
        </div>
    </section>
</template>

<script>
import api from '@/services/api';
import router from '@/router/index.js'

export default {
    name: 'Login_user',
    data() {
        return {
            email: "",
            password: "",
        };
    },
    methods: {
        submit() {
        var data = {
            email: this.email,
            password: this.password,
        }
        api.post('/login', data).then(response => {
            localStorage.setItem('token',response.data.token)
            router.push('/')
        }).catch((error)=>{
            console.log(error.response.status)
        })
    }   
    }
}
</script>


<style scoped>
    #section {
        background-color: azure;
    }
    @media (max-width: 1100px){

        #image-login{
            display: none;
        }
    }
</style>