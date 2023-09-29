<template>
  <div class="p-12">
    <v-titulo-home titulo="Transferencias"/>
    <div class="d-flex flex-row justify-space-between align-center my-8">
      <div v-for="(item, i) in itemsCard" :key="i">
        <v-boton-card :link="item.link" :texto="item.text" :imagenurl="item.imagenurl"/>
      </div>
    </div>
  </div>
</template>

<script>
import VBotonCard from "../components/VBotonCard"
import VTituloHome from "../components/VTituloHome"

import newtransfer from "../assets/images/transferencia-bancaria.svg";
import vertransfer from "../assets/images/factura.svg";
import verbenef from "../assets/images/cuenta-de-usuario.svg"

export default {
  components:{VBotonCard,VTituloHome},

  data () {
    return {
      itemsCard: [
        { text: `Nueva` + `\n` + `Transferencia`, imagenurl: newtransfer, link: '/nueva-transferencia' },
        { text: `Ver` + `\n` + `Transferencias`, imagenurl: vertransfer, link: ''},
        { text: `Ver` + `\n` + `Beneficiarios`, imagenurl: verbenef, link:''},
      ],
    }
  }

}
</script>