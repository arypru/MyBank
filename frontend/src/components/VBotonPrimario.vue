<template>
  <v-btn class="black--text" color="amber accent-2" large rounded block>
    {{ textoBoton }}
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
