<template>
  <v-text-field
      outlined
      :prepend-inner-icon="icon"
      color="teal lighten-1"
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
    },
    icon: {
      type: String,
      required: true,
    }
  }
}
</script>