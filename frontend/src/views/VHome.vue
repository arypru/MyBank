<template>
  <div>
    <v-navbar/>

    <v-container rounded-xl style="background: white" class="mt-4 py-8 px-13">
      <v-section-transferencia/>
      <v-section-products/>

      <div>
        <v-titulo-home titulo="Tarjetas"/>
        <div class="d-flex flex-row justify-space-beetwen mt-8">
          <v-tarjeta-card/>
          <v-tarjeta-card/>
          <v-tarjeta-card/>
        </div>
      </div>

    </v-container>
  </div>
</template>


<script>
import VNavbar from "../components/VNavbar"
import VSectionTransferencia from "../components/VSectionTransferencia"
import VSectionProducts from "../components/VSectionProducts"
import VTituloHome from "../components/VTituloHome"
import VTarjetaCard from "../components/VTarjetaCard"

export default {
  components:{VNavbar,VSectionTransferencia,VSectionProducts,VTituloHome,VTarjetaCard},


}
</script>