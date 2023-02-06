<template>
  <Navbar />
  <router-view />
  <Baseboard />
  
</template>

<script>
import api from './services/api';
import Navbar from './views/layouts/Navbar.vue';
import Baseboard from './views/layouts/Baseboard.vue';
import router from './router/index.js'

export default {
  name: 'App',
  components: {
    Navbar,
    Baseboard
  },

  methods: {
    validate() {
      api.post('/me').then((response)=>{
        if (response.data.status == 200) {
          router.push({ path: '/login'})
        }
        
      })
    }
  },
  created(){
    this.validate()
    var list = ['home']

    if(!list.includes(localStorage.getItem('route'))){
      this.validate()
    }
  }
}
</script>

<style>
</style>
