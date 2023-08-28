<template>
  <div>
    <h4>{{ textoLabel }}</h4>
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
h4{
  letter-spacing: 0.06em;
  font-weight: 400;
}
</style>