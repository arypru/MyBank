<template>
  <div>
    <v-btn large rounded width="auto" class="my-4 px-8 py-5" text color="teal lighten-1" >
      <h3><pre>{{texto}}</pre></h3>
      <v-icon right>{{ icontext }}</v-icon>
    </v-btn>
  </div>

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
      required: false,
    }
  }
}
</script>


<style>
pre{
  font-family: 'Bricolage Grotesque';
}

</style>
