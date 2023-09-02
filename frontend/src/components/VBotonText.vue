<template>
  <v-btn large rounded block width="auto" class="my-8 px-8 py-5" text color="teal lighten-1" >
      <h3><pre>{{texto}}</pre></h3>
    <v-icon right>{{ icontext }}</v-icon>
  </v-btn>
</template>

<script>
export default {
  props: {
    texto: {
      type: String,
      required: true,
    },
    icontext: {
      type:String,
      required: true,
    }
  }
}
</script>


<style>
pre{
  font-family: 'Bricolage Grotesque';
}

</style>
