<template>
  <div>
    <v-titulo-home titulo="Tarjetas"/>
    <div class="d-flex flex-row justify-space-beetwen mt-8">
      <v-tarjeta-card/>
      <v-tarjeta-card/>
      <v-tarjeta-card/>
    </div>
  </div>
</template>

<script>
import VTituloHome from "../components/VTituloHome"
import VTarjetaCard from "../components/VTarjetaCard"

export default {
  components: {VTituloHome,VTarjetaCard}
}
</script>