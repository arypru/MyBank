<template>
    <div>
      <v-section-transferencia/>
      <v-section-products/>
      <v-section-tarjeta/>
    </div>
</template>

<script>
import VSectionTransferencia from "../components/VSectionTransferencia"
import VSectionProducts from "../components/VSectionProducts"
import VSectionTarjeta from "../components/VSectionTarjeta"


export default {
  components:{VSectionTransferencia,VSectionProducts,VSectionTarjeta},
}
</script>