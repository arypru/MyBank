<template>
  <div class="d-flex flex-column align-center my-2">
    <v-img height="180" width="220" :src=logo />
  </div>
</template>

<script>
import logoMyBank from "../assets/images/logoMyBank.png"

export default {
  name: 'TextFile',
  data () {
    return {
      logo: logoMyBank
    }
  }
}
</script>