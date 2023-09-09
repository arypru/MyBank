<template>
  <v-hover v-slot="{ hover }" >
    <v-btn
        width="344"
        height="90"
        :class="hover ? 'teal--text text--lighten-1 ' : 'grey--text text--darken-3 '"
        class=" rounded-xl transparent text-capitalize"
        :href="link"
    >
      <div class="d-flex flex-row align-center">
         <v-img height="60" width="60" class="mr-5" :src="imagenurl"/>
          <pre><h3>{{texto}}</h3></pre>
      </div>
    </v-btn>
  </v-hover>
</template>
<script>
export default {
  name: 'BotonHorizontal',
  props: {
    texto: String,
    imagenurl:String,
    link: String,
    target: null,
  },
}
</script>

<style>
pre{
  font-family: Bricolage-Regular,sans-serif;
}
</style>