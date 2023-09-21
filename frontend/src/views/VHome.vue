<template>
    <v-container rounded-xl style="background: white" class="mt-4 py-8 px-13">
      <v-section-transferencia/>
      <v-section-products/>
      <v-section-tarjeta/>
    </v-container>
</template>

<script>
import VSectionTransferencia from "../components/VSectionTransferencia"
import VSectionProducts from "../components/VSectionProducts"
import VSectionTarjeta from "../components/VSectionTarjeta"


export default {
  components:{VSectionTransferencia,VSectionProducts,VSectionTarjeta},
}
</script>