<template>
  <v-text-field
      outlined
      prepend-inner-icon="mdi-map-marker"
      color="amber accent-4"
      :placeholder=placeholderText
  ></v-text-field>
</template>

<script>
export default {
  name: 'TextFile',
  props:{
    placeholderText: {
      type: String,
      required: true,
    }
  }
}
</script>