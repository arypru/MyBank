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
              <p class="Bricolage-SemiBold">Descripción: {{ cuenta.descripcion }}</p>

            </div>

            <div id="DatosTitular" class="">
              <p class="Bricolage-SemiBold">Titular: {{ cuenta.apellidoTitular }} {{ cuenta.nombreTitular }}</p>
              <p class="Bricolage-SemiBold">Dni: {{ cuenta.dniTitular }} </p>
              <p class="Bricolage-SemiBold">Tipo cuenta: {{ cuenta.acronimoTipoCuenta }}
                {{ cuenta.tipoCuentaDescrip }}</p>
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
              <v-card-text class="pa-12" >

                <div v-if="success">
                  <v-img class="d-flex justify-center" height="auto" width="auto" :src=sucessIcon />
                </div>
                <div v-else>
                  <v-img height="350" width="350" :src=errorIcon />
                </div>

                <h2 class="Bricolage-Bold text-center">{{ mostrar_msg }}</h2>
              </v-card-text>

              <v-card-actions class="d-flex justify-center">
                <v-btn color="teal lighten-1 text-center" text @click="showModalAlias = false">
                  Cerrar
                </v-btn>
              </v-card-actions>

            </v-card>
          </div>

          <div v-else>
            <v-card rounded-xl>
              <v-card-text class="pa-12">
                <v-label-input class="my-4" texto-label="Escriba el nuevo alias"></v-label-input>
                <v-text-file v-model="cuentaAlias.alias" icon="mdi-pencil" placeholder-text="......" :value="cuenta.alias"/>
              </v-card-text>
              <v-card-actions class="d-flex justify-center">
                <v-spacer></v-spacer>
                <v-btn color="teal lighten-1" text @click="showModalAlias = false">
                  Cerrar
                </v-btn>
                <v-btn color="teal lighten-1" outlined @click="updateAlias()">
                  Cambiar
                </v-btn>
              </v-card-actions>
            </v-card>
          </div>

        </v-dialog>

        <v-dialog
            overlay-color="black"
            transition="dialog-top-transition"
            max-width="600"
            v-model="showModalDescrip"
            persistent
        >
          <template v-slot:activator="{ on, attrs }">
            <v-boton-primario v-bind="attrs" v-on="on" @click="abrirModalModificarDescrip()" class="my-2" texto-icon="mdi-text" texto-boton="Modificar Descripción"/>
          </template>

          <div v-if="this.$store.getters.openModal">
            <v-card rounded-xl>

              <v-card-text class="pa-12" >
                <div v-if="success">
                  <v-img class="d-flex justify-center" height="auto" width="auto" :src=sucessIcon />
                </div>
                <div v-else>
                  <v-img height="350" width="350" :src=errorIcon />
                </div>
                <h2 class="Bricolage-Bold text-center">{{ mostrar_msg }}</h2>
              </v-card-text>

              <v-card-actions class="d-flex justify-center">
                <v-spacer></v-spacer>
                <v-btn color="teal lighten-1" text @click="showModalDescrip = false">
                  Cerrar
                </v-btn>
              </v-card-actions>
            </v-card>
          </div>


          <div v-else>
            <v-card rounded-xl>
              <v-card-text class="pa-12">
                <v-label-input class="my-4" texto-label="Escriba la nueva descripcion"></v-label-input>
                <v-text-file v-model="cuentaDescrip.descripcion" icon="mdi-pencil" placeholder-text="nuevo alias" :value="cuenta.alias"/>
              </v-card-text>
              <v-card-actions class="d-flex justify-center">
                <v-spacer></v-spacer>
                <v-btn color="teal lighten-1" text @click="showModalDescrip = false">
                  Cerrar
                </v-btn>
                <v-btn
                    color="teal lighten-1"
                    outlined
                    @click="updateDescripcion()"
                >
                  Cambiar
                </v-btn>
              </v-card-actions>
            </v-card>
          </div>

        </v-dialog>


        <v-boton-primario @click="darBajaCuenta(cuenta.idCuenta)" class="my-2" texto-icon="mdi-close"
                          texto-boton="Desactivar Cuenta"/>

      </v-col>
    </v-row>
    <v-titulo-home class="my-6" titulo="Movimientos"/>

    <v-row justify="center" class="mb-5">
      <v-col lg="6" cols="12">
        <v-btn :color="ingreso ? 'teal lighten-1 white--text' : 'white'" @click="ingreso = true" class="ma-2 " block rounded>
          Ingresos
          <v-icon right>mdi-arrow-up-thick</v-icon>
        </v-btn>
      </v-col>
      <v-col lg="6" cols="12">
        <v-btn :class="ingreso ? 'white' : 'teal lighten-1 white--text'" @click="ingreso = false" class="ma-2" block rounded>
          Egresos
          <v-icon right>mdi-arrow-down-thick</v-icon>
        </v-btn>
      </v-col>
    </v-row>

    {{this.$store.getters.cuenta.idCuenta}}
    <div v-if="ingreso">
      <v-tabla :loading="loadingT" nodatatext="Al parecer no contiene ingresos. :( " :headers="headers" :items="ver_ingresos"/>
    </div>

    <div v-else>
      <v-tabla :loading="loadingT" nodatatext="Al parecer no contiene egresos. Realiza una transferencia para registrar egresos" :headers="headers" :items="ver_egresos"/>
    </div>
  </div>


</template>

<script>

import VTituloHome from "@/components/VTituloHome";
import VBotonPrimario from "@/components/VBotonPrimario";
import VLabelInput from "@/components/VLabelInput";
import VTextFile from "@/components/VTextFile";
import success from "../assets/images/succes.svg"
import error from "../assets/images/error.svg"
import VTabla from "@/components/VTabla";


import {mapActions, mapGetters} from "vuex";

export default {
  components: {VTituloHome, VBotonPrimario, VLabelInput, VTextFile, VTabla},

  data() {
    return {
      showModalAlias: false,
      showModalDescrip: false,

      sucessIcon : success,
      errorIcon : error,

      ingreso: true,

      cuentaAlias: {
        alias: '',
        idCuenta: this.$store.getters.cuenta.idCuenta
      },

      cuentaDescrip: {
        descripcion: '',
        idCuenta: this.$store.getters.cuenta.idCuenta
      },

      headers: [
        { text: 'Nro Operacion', align: 'center', value: 'id' },
        { text: 'Fecha',align: 'center', value: 'fecha_op' },
        { text: 'Tipo Transaccion',align: 'center', value: 'tipo_transaccion' },
        { text: 'Referencia',align: 'center', value: 'referencia' },
        { text: 'Descrip', align: 'center',value: 'descripcion' },
        { text: 'Destino alias', align: 'center', value: 'aliasDestino' },
        { text: 'Importe', align: 'center', value: 'importe' },
        { text: 'Estado', align: 'center',value: 'estado' },
      ],

    }
  },

  computed: {
    ...mapGetters(['cuenta', 'openModalAlias', 'mostrar_msg','openModal','success', 'user','ver_egresos','ver_ingresos','loadingT']),
  },

  mounted() {
    this.verDetalleCuenta(this.$route.params.id);
    this.cargarMovimientos()
  },

  methods: {
    ...mapActions(['limpiarEstadoModal','verDetalleCuenta', 'darBajaCuenta', 'cerrarModalAlias','modificarAlias','modificarDescripcion', 'verMovimientos']),

    cargarMovimientos(){
      let movimientos = {
        idUsuario: this.$store.getters.usuario.id,
        cuentaNumero: this.$route.params.id
      }
       this.verMovimientos(movimientos)
    },

    abrirModalModificarDescrip(){
      this.limpiarEstadoModal()
      this.showModalDescrip = true;
    },

    abrirModalModificarAlias() {
      this.limpiarEstadoModal()
      this.showModalAlias = true;
    },

    updateDescripcion(){
      this.modificarDescripcion(this.cuentaDescrip)
    },

    updateAlias(){
      this.modificarAlias(this.cuentaAlias)
    }
  },
}
</script>

<style>
.v-dialog{
  background-color:white;
}

.v-card {
  transition: opacity .4s ease-in-out;
}

.show-btns {
  color: rgba(255, 255, 255, 1) !important;
}
</style>
