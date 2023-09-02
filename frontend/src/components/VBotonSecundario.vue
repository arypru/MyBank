<template>
  <v-btn class="black--text" color="teal lighten-1" large rounded block outlined>
    <h3>{{ textoBoton }}</h3>
    <v-icon right>{{ textoIcon }}</v-icon>
  </v-btn>
</template>

<script>
export default {
  props: {
    textoBoton: {
      type: String,
      required: true,
    },

    textoIcon: {
      type: String,
      required: true,
    }
  }
}
</script>
