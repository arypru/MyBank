<template>
  <div>
    <div v-if="currentRoute === '/login'">
      <v-main>
        <router-view/>
      </v-main>
    </div>

    <div v-else>
      <v-navbar/>
      <v-main class="mt-2 mb-8 mx-4 mx-sm-16">
        <router-view/>
      </v-main>
    </div>
  </div>
</template>
<script>
import VNavbar from "@/components/VNavbar";

export default {
  components: {VNavbar},

  data: () => ({
    value: 'recent',
    currentRoute: window.location.pathname
  }),


}
</script>