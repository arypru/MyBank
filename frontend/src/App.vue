<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <v-titulo Titulo="Transferencias"></v-titulo>
    <v-subtitulo subtitulo="Prueba de transferencia"></v-subtitulo>
    <v-label-input textoLabel="prueba label input"></v-label-input>
  </div>
</template>

<script>
import VTitulo from "@/components/VTitulo";
import VSubtitulo from "@/components/VSubtitulo";
import VLabelInput from "@/components/VLabelInput"

export default {
  name: 'App',
  components: {
    VTitulo,
    VSubtitulo,
    VLabelInput
  }
}
</script>

<style>
</style>
