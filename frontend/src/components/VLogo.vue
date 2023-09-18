<template>
  <div class="d-flex flex-column align-center my-2">
    <v-img :height="heightProp" :width="widthProp" :src=logo />
  </div>
</template>

<script>
import logoMyBank from "../assets/images/logoMyBank.png"

export default {
  name: 'TextFile',
  props:{
    heightProp: {
      type: String,
      required: true
    },
    widthProp:{
      type: String,
      required: true
    }
  },
  data () {
    return {
      logo: logoMyBank
    }
  }
}
</script>