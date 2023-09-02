<template>
  <div>
    <h3>{{ textoLabel }}</h3>
  </div>
</template>

<script>
export default {
  props: {
    textoLabel: {
      type: String,
      required: true,
    }
  }
}
</script>

<style>
h3{
  letter-spacing: 0.08em;
  font-weight: 400;
}
</style>