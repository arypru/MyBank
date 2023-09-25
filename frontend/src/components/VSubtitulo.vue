<template>
  <div class="my-5">
    <h3 class="Bricolage-SemiBold text-center">{{ subtitulo }}</h3>
    <v-divider></v-divider>
  </div>
</template>

<script>
export default {
  props: {
    subtitulo: {
      type: String,
      required: true,
    }
  }
}
</script>

<style>
h3{
  color:#2D2D2D;
}
</style>