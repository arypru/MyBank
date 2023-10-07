<template>
  <div>
    <v-btn large :href="link" rounded width="auto" class="my-4 px-8 py-5" text color="teal lighten-1" >
      <h4><pre class="Bricolage-Regular">{{texto}}</pre></h4>
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
    },
    link: {
      type: String,
      required: false,
    }
  }
}
</script>

