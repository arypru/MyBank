<template>
  <div>
    <VTituloHome titulo="Nueva Transferencia"/>

    <v-stepper v-model="e6" vertical>

      <v-stepper-step :complete="e6 > 1" step="1" color="teal lighten-1">
        <h4 class="Bricolage-Regular my-2">Cuenta Origen</h4>
        <v-divider></v-divider>

      </v-stepper-step>
      <v-stepper-content step="1">

        Seleccione una cuenta desde donde quiere realizar la transferencia

        <div class="d-flex flex-row align-content-center my-3 flex-wrap">
          <div v-for="item in cuentasMyBank" :key="item.id">
            <v-hover v-slot="{ hover }">
              <v-card
                  @click="seleccionarCuentaOrigen(item)"
                  class="mx-2 my-3 rounded-xl Bricolage-Regular"
                  max-width="220"
                  outlined
                  hover
                  :elevation="hover ? 4 : 2"
                  :class="hover ? 'teal lighten-5' : ''"

              >
                <v-list-item three-line>
                  <v-list-item-content>
                    <div class="text-overline mb-2">
                      CA Caja de Ahorro
                    </div>
                    <v-list-item-title class="text-h5">
                      <p class="Bricolage-SemiBold teal--text text--lighten-1">{{ item.saldoDisponible }}</p>
                    </v-list-item-title>
                    <v-list-item-subtitle>
                      <p class="Bricolage-SemiBold">{{ item.CBU }}</p>
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-card>
            </v-hover>
          </div>
        </div>

        <v-btn color="teal lighten-1" class="white--text" @click="e6 = 2">
          Continuar
        </v-btn>
      </v-stepper-content>

      <v-stepper-step
          :complete="e6 > 2"
          step="2"
          color="teal lighten-1"
      >
        <h4 class="Bricolage-Regular my-2">Cuenta Destino</h4>
      </v-stepper-step>
      <v-stepper-content step="2">
        Seleccione la cuenta a la que quiere transferir

        <div class="d-flex flex-row align-content-center my-3 flex-wrap">
          <div v-for="item in cuentasPropias" :key="item.id">
            <v-hover v-slot="{ hover }">
              <v-card
                  @click="seleccionarCuentaDestino(item)"
                  class="mx-2 my-3 rounded-xl Bricolage-Regular"
                  max-width="220"
                  outlined
                  hover
                  :elevation="hover ? 4 : 2"
                  :class="hover ? 'teal lighten-5' : ''"

              >
                <v-list-item three-line>
                  <v-list-item-content>
                    <div class="text-overline mb-2">
                      CA Caja de Ahorro
                    </div>
                    <v-list-item-title class="text-h5">
                      <p class="Bricolage-SemiBold teal--text text--lighten-1">{{ item.saldoDisponible }}</p>
                    </v-list-item-title>
                    <v-list-item-subtitle>
                      <p class="Bricolage-SemiBold">{{ item.CBU }}</p>
                      <p class="Bricolage-SemiBold">BanCO</p>
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-card>
            </v-hover>
          </div>
        </div>


        <v-btn color="teal lighten-1" class="white--text" @click="e6 = 3">
          Continuar
        </v-btn>
      </v-stepper-content>

      <v-stepper-step
          color="teal lighten-1"
          :complete="e6 > 3"
          step="3"
      >
        <h4 class="Bricolage-Regular my-2">Detalle de la transferencia</h4>
      </v-stepper-step>
      <v-stepper-content step="3">

        <v-label-input textoLabel="Importe"/>
        <v-text-file v-model="transf.importe" inputTypeValue="number" icon="mdi-cash-multiple"
                     placeholderText="Ingrese su usuario"/>

        <v-label-input textoLabel="Referencia"/>
        <v-combobox v-model="transf.referencia" :items="referencias" outlined color="teal lighten-1"
                    prepend-inner-icon="mdi-star-outline">
        </v-combobox>

        <v-label-input textoLabel="Descripción"/>
        <v-text-file v-model="transf.descripcion" inputTypeValue="text" icon="mdi-text"
                     placeholderText="Ingrese su usuario"/>

        <v-btn
            color="teal lighten-1"
            @click="confirmarOperacion()"
        >
          Continuar
        </v-btn>
      </v-stepper-content>

      <v-stepper-step color="teal lighten-1" step="4">
        <h4 class="Bricolage-Regular my-2">Transferencia Exitosa!</h4>
      </v-stepper-step>
      <v-stepper-content step="4">

        <div class="d-flex flex-row justify-space-around align-content-center my-3 flex-wrap">

          <div>
            <h4 class="Bricolage-Regular my-2">Datos cuenta origen</h4>
            <v-card class="mx-2 my-3 rounded-xl Bricolage-Regular pa-6" elevation="4">

              <h4 class="my-2">Titular: {{transferenciaOrigen.nombreTitular}}  {{transferenciaOrigen.apellidoTitular}}</h4>
              <h4 class="my-2">Dni: {{transferenciaOrigen.dniTitular}}</h4>
              <h4 class="my-2">Numero de Cuenta: {{transferenciaOrigen.numeroCuenta}}</h4>
              <h4 class="my-2">Alias: {{transferenciaOrigen.alias}}</h4>
              <h4 class="my-2">Banco: {{transferenciaOrigen.descripcionBanco}}</h4>

            </v-card>
          </div>


          <div>
            <h4 class="Bricolage-Regular my-2">Datos cuenta destino</h4>

            <v-card class="mx-2 my-3 rounded-xl Bricolage-Regular pa-6" elevation="4">

              <h4 class="my-2">Titular: {{transferenciaDestino.nombreTitular}}  {{transferenciaDestino.apellidoTitular}}</h4>
              <h4 class="my-2">Dni: {{transferenciaDestino.dniTitular}}</h4>
              <h4 class="my-2">Numero de Cuenta: {{transferenciaDestino.numeroCuenta}}</h4>
              <h4 class="my-2">Alias: {{transferenciaDestino.alias}}</h4>
              <h4 class="my-2">Banco: {{transferenciaDestino.descripcionBanco}}</h4>

            </v-card>
          </div>


          <div>
            <h4 class="Bricolage-Regular my-2">Datos transferencia</h4>

            <v-card class="mx-2 my-3 rounded-xl Bricolage-Regular pa-6" elevation="4">

              <h4 class="my-2">{{transferenciaPropia.tipo_transaccion}}</h4>
              <h4 class="my-2">Importe: {{transferenciaPropia.importe}}</h4>
              <h4 class="my-2">Refencia: {{transferenciaPropia.referencia}}</h4>
              <h4 class="my-2">Descripcion: {{transferenciaPropia.descripcion}}</h4>
              <h4 class="my-2">Fecha Operacion: {{transferenciaPropia.fecha_op}}</h4>

            </v-card>
          </div>

        </div>

        <v-row no-gutters justify="center">
          <v-btn
              color="teal lighten-1"
              @click="volverATransferir()"
              class="white--text mr-12"
          >
            Volver a transferir
          </v-btn>

          <v-btn color="teal lighten-1" text @click="volverAInicio()">
            Volver a Inicio
          </v-btn>
        </v-row>


      </v-stepper-content>
    </v-stepper>

  </div>
</template>

<script>
import VTituloHome from "@/components/VTituloHome";
import VLabelInput from "@/components/VLabelInput";
import VTextFile from "@/components/VTextFile";
import {mapActions, mapGetters} from "vuex";
import router from "@/router";

export default {
  components: {VTituloHome, VLabelInput, VTextFile},

  data() {
    return {
      e6: 1,
      referencias: ['Alquileres', 'Aportes de Cap', 'Cuotas', 'Expensas', 'Facturas',
        'Haberes', 'Honorarios', 'Op Inmobiliaria', 'Préstamos', 'Seguros', 'Varios'
      ],

      transf: {
        cuenta_origen_id: '',
        cuenta_dest_id: '',
        importe: '',
        referencia: '',
        descripcion: '',
        moneda_id: ''
      }
    }
  },

  computed: {
    ...mapGetters(['cuentasMyBank', 'cuentasPropias', 'user', 'transferenciaOrigen','transferenciaDestino','transferenciaPropia']),
  },

  methods: {
    ...mapActions(['getCuentasMyBank', 'getCuentasPropias', 'transferenciasPropias']),

    seleccionarCuentaOrigen(item) {
      this.transf.cuenta_origen_id = item.id
      this.e6 = 2
    },

    seleccionarCuentaDestino(item) {
      console.log(item)
      this.transf.cuenta_dest_id = item.id
      this.transf.moneda_id = item.tipocuenta_id
      this.e6 = 3
    },

    confirmarOperacion() {
      this.transferenciasPropias(this.transf)
      this.e6 = 4
    },

    volverATransferir(){

      this.transf = {
        cuenta_origen_id: '',
            cuenta_dest_id: '',
            importe: '',
            referencia: '',
            descripcion: '',
            moneda_id: ''
      }
      this.e6 = 1
    },

    volverAInicio(){

      this.transf = {
        cuenta_origen_id: '',
        cuenta_dest_id: '',
        importe: '',
        referencia: '',
        descripcion: '',
        moneda_id: ''
      }
      this.e6 = 1

      router.push({name:'Home'})
    }
  },


  mounted() {
    this.getCuentasMyBank(this.user.id);
    this.getCuentasPropias(this.user.id);
  },
}
</script>