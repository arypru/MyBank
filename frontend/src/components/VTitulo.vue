<template>
  <h1>{{ Titulo }}</h1>
</template>

<script>
export default {
  props: {
    Titulo: {
      type: String,
      required: true,
    }
  }
}
</script>

<style>
h1{
  letter-spacing: 0.06em;
}
</style>