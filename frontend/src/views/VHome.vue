<template>
  <div>
    <v-navbar/>
    <v-container rounded-xl style="background: white" class="mt-4 py-8 px-13">
      <v-section-transferencia/>
      <v-section-products/>
      <v-section-tarjeta/>
    </v-container>
  </div>
</template>

<script>
import VNavbar from "../components/VNavbar"
import VSectionTransferencia from "../components/VSectionTransferencia"
import VSectionProducts from "../components/VSectionProducts"
import VSectionTarjeta from "../components/VSectionTarjeta"

export default {
  components:{VNavbar,VSectionTransferencia,VSectionProducts,VSectionTarjeta},
}
</script>