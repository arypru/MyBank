<template>
  <h3 class="blue">{{ subtitulo }}</h3>
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
  letter-spacing: 0.06em;
  font-weight: 600;
}
</style>