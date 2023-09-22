<template>
  <v-btn :to=linkPrimario class="white--text" color="teal lighten-1 text-capitalize"  rounded>
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
    },

    linkPrimario: {
     type: String,
     required: false,
    }
  },

}
</script>
