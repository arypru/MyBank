<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <v-titulo Titulo="Transferencias"></v-titulo>
    <v-subtitulo subtitulo="Prueba de transferencia"></v-subtitulo>
  </div>
</template>

<script>
import VTitulo from "@/components/VTitulo";
import VSubtitulo from "@/components/VSubtitulo";

export default {
  name: 'App',
  components: {
    VTitulo,
    VSubtitulo
  }
}
</script>

<style>
</style>
