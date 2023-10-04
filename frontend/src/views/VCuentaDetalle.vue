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
            <h3 class="Bricolage-SemiBold text-center teal--text text--lighten-1">{{ cuenta.acronimoTipoCuenta }}
              {{ cuenta.numeroCuenta }}</h3>
            <h3 class="Bricolage-Bold text-center teal--text text--lighten-1">{{ cuenta.monedaSimbolo }}
              {{ cuenta.saldoDisponible }}</h3>
            <div v-if="cuenta.isFavorita">
              <v-icon>mdi-star</v-icon>
            </div>
            <div v-else>
              <v-icon>mdi-star-outline</v-icon>
            </div>
          </div>

          <div class="d-flex flex-row justify-space-around align-content-center">
            <div id="DatosCuenta" class="">
              <p class="Bricolage-SemiBold">CBU: {{ cuenta.CBU }}</p>
              <p class="Bricolage-SemiBold">ALIAS: {{ cuenta.alias }}</p>
              <p class="Bricolage-SemiBold">Tipo cuenta: {{ cuenta.acronimoTipoCuenta }}
                {{ cuenta.tipoCuentaDescrip }}</p>
            </div>

            <div id="DatosTitular" class="">
              <p class="Bricolage-SemiBold">Titular: {{ cuenta.apellidoTitular }} {{ cuenta.nombreTitular }}</p>
              <p class="Bricolage-SemiBold">Dni: {{ cuenta.dniTitular }} </p>
            </div>
          </div>

        </v-card>
      </v-col>

      <v-col lg="4" cols="12" class="d-flex flex-column justify-center">
        <v-dialog
            overlay-color="black"
            transition="dialog-top-transition"
            max-width="600"
            v-model="showModalAlias"
            persistent
        >
          <template v-slot:activator="{ on, attrs }">
            <v-boton-primario v-bind="attrs"
                              v-on="on" @click="abrirModalModificarAlias()" class="my-2" texto-icon="mdi-pencil"
                              texto-boton="Modificar ALIAS"/>
          </template>

          <div v-if="this.$store.getters.openModal">
            <v-card rounded-xl>
              <v-card-text class="pa-12">
                <h4>Cambio de alias con éxito</h4>
              </v-card-text>

              <v-card-actions>
                <v-btn
                    color="teal lighten-1"
                    text
                    @click="showModalAlias = false"
                >
                  Cerrar
                </v-btn>
              </v-card-actions>
            </v-card>
          </div>

          <div v-else>
            <v-card rounded-xl>
              <v-card-text class="pa-12">
                <v-label-input class="my-4" texto-label="Escriba el nuevo alias"></v-label-input>
                <v-text-file v-model="cuentaAlias.alias" icon="mdi-pencil" placeholder-text="nuevo alias" :value="cuenta.alias"/>
              </v-card-text>
              <v-card-actions class="d-flex justify-center">
                <v-spacer></v-spacer>
                <v-btn
                    color="teal lighten-1"
                    text
                    @click="showModalAlias = false"
                >
                  Cerrar
                </v-btn>
                <v-btn
                    color="teal lighten-1"
                    outlined
                    @click="updateAlias()"
                >
                  Cambiar
                </v-btn>
              </v-card-actions>
            </v-card>
          </div>

        </v-dialog>




        <v-boton-primario class="my-2" texto-icon="mdi-text" texto-boton="Modificar Descripción"/>
        <v-boton-primario @click="darBajaCuenta(cuenta.idCuenta)" class="my-2" texto-icon="mdi-close"
                          texto-boton="Desactivar Cuenta"/>

      </v-col>
    </v-row>
    <v-titulo-home titulo="Movimientos"/>
  </div>


</template>

<script>

import VTituloHome from "@/components/VTituloHome";
import VBotonPrimario from "@/components/VBotonPrimario";
import VLabelInput from "@/components/VLabelInput";
import VTextFile from "@/components/VTextFile";

import {mapActions, mapGetters} from "vuex";

export default {
  components: {VTituloHome, VBotonPrimario, VLabelInput, VTextFile},

  data() {
    return {
      showModalAlias: false,

      cuentaAlias: {
        alias: '',
        idCuenta: this.$store.getters.cuenta.idCuenta
      }

    }
  },

  computed: {
    ...mapGetters(['cuenta', 'openModalAlias', 'msg','openModal']),

  },

  mounted() {
    this.verDetalleCuenta(this.$route.params.id);
  },

  methods: {
    ...mapActions(['limpiarEstadoModal','verDetalleCuenta', 'darBajaCuenta', 'cerrarModalAlias','modificarAlias']),

    abrirModalModificarAlias() {
      this.limpiarEstadoModal()
      this.showModalAlias = true;
    },

    updateAlias(){
      this.modificarAlias(this.cuentaAlias)
    }
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
