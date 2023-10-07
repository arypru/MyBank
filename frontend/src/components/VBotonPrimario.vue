<template>
  <v-btn block @click="$emit('click')" :to=linkPrimario class="white--text" color="teal lighten-1"  rounded>
    <h3 class="font-weight-regular white--text text-capitalize">{{ textoBoton }}</h3>
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
