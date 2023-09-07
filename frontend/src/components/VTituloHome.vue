<template>
  <div>
    <h2>{{ titulo }}</h2>
    <v-divider></v-divider>
  </div>
</template>

<script>
export default {
  props: {
    titulo: {
      type: String,
      required: true,
    }
  }
}
</script>

<style>
h2{
  letter-spacing: 0.06em;
  color:#2D2D2D;
}
</style>