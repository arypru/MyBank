<template>
  <div>
    <v-row>
      <v-col lg="8" cols="12">
          <v-card
              class="mx-2 my-3 Bricolage-Regular rounded-xl"
              outlined
              hover
          >

            <div id="headerCard" class="d-flex justify-space-around flex-row my-8">
                <h3 class="Bricolage-SemiBold text-center teal--text text--lighten-1">{{cuenta.acronimoTipoCuenta}} {{cuenta.numeroCuenta}}</h3>
                <h3 class="Bricolage-Bold text-center teal--text text--lighten-1">{{cuenta.monedaSimbolo}} {{cuenta.saldoDisponible}}</h3>
                <div v-if="cuenta.isFavorita">
                  <v-icon>mdi-star</v-icon>
                </div>
              <div v-else>
                <v-icon>mdi-star-outline</v-icon>
              </div>
            </div>

            <div class="d-flex flex-row justify-space-around align-content-center">
              <div id="DatosCuenta" class="">
                <p class="Bricolage-SemiBold">CBU:  {{cuenta.CBU}}</p>
                <p class="Bricolage-SemiBold">ALIAS:  {{cuenta.alias}}</p>
                <p class="Bricolage-SemiBold">Tipo cuenta:  {{cuenta.acronimoTipoCuenta}}  {{cuenta.tipoCuentaDescrip}}</p>
              </div>

              <div id="DatosTitular" class="">
                <p class="Bricolage-SemiBold">Titular:  {{cuenta.apellidoTitular}}  {{cuenta.nombreTitular}}</p>
                <p class="Bricolage-SemiBold">Dni:  {{cuenta.dniTitular}} </p>
              </div>
            </div>

          </v-card>
      </v-col>
      <v-col lg="4" cols="12" class="d-flex flex-column justify-center">

        <v-boton-primario class="my-2" texto-icon="mdi-pencil" texto-boton="Modificar ALIAS"/>
        <v-boton-primario class="my-2" texto-icon="mdi-text" texto-boton="Modificar Descripción"/>
        <v-boton-primario class="my-2" texto-icon="mdi-close" texto-boton="Desactivar Cuenta"/>

      </v-col>
    </v-row>

    <v-titulo-home titulo="Movimientos"/>
  </div>


</template>

<script>

import VTituloHome from "@/components/VTituloHome";
import VBotonPrimario from "@/components/VBotonPrimario";

import {mapActions, mapGetters} from "vuex";
export default {
  components: {VTituloHome,VBotonPrimario},

  computed: {
    ...mapGetters(['cuenta']),
  },

  mounted() {
    this.verDetalleCuenta(this.$route.params.id);
  },

  methods: {
    ...mapActions(['verDetalleCuenta']),
  },
}
</script>

<style>
.v-card {
  transition: opacity .4s ease-in-out;
}

.v-card:not(.on-hover) {
  opacity: 0.7;
}

.show-btns {
  color: rgba(255, 255, 255, 1) !important;
}
</style>