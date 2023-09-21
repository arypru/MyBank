<template>
  <div>
    <v-titulo-home titulo="Productos"/>
    <div class="d-flex flex-row align-content-center my-8 flex-wrap">
      <div v-for="(item,i) in cuentas" :key="i">
        <v-card-products :cuenta="item"/>
      </div>
    </div>

  </div>
</template>

<script>
import VCardProducts from "../components/VCardProducts"
import VTituloHome from "../components/VTituloHome"
import {mapGetters, mapActions} from "vuex";

export default {

  components:{VCardProducts,VTituloHome},

  computed: mapGetters(['cuentas','user']),

  mounted() {
    this.verCuentasUsuarios(this.user.id);
  },

  methods: {
    ...mapActions(['verCuentasUsuarios']),
  },
}
</script>