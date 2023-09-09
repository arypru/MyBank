<template>
  <div>
    <v-titulo-home titulo="Productos"/>

    <div class="d-flex flex-row justify-space-between align-center my-8">
      <div v-for="(item, i) in itemsProduct" :key="i">
        <v-card-products/>
      </div>
    </div>

  </div>
</template>

<script>
import VCardProducts from "../components/VCardProducts"
import VTituloHome from "../components/VTituloHome"

export default {

  components:{VCardProducts,VTituloHome},
  data () {
    return {
      itemsProduct: [
        { text: `Nueva` + `\n` + `Transferencia`, link: '' },
        { text: `Ver` + `\n` + `Transferencias`,  link: ''},
        { text: `Ver` + `\n` + `Beneficiarios`, link:''},
      ],
    }
  }
}
</script>