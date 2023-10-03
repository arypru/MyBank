<template>
 <div>
   <v-titulo-home titulo="Transferencias"/>

   <v-row class="my-2">

     <!--
     <v-col lg="4" cols="12" align-self="center">
       <v-label-input class="mb-2" texto-label="CUIT Beneficiario"/>
       <v-text-file icon="mdi-account-outline" placeholder-text="CUIT del beneficiario" value="g"/>
     </v-col>
     <v-col lg="2" cols="12" align-self="center">
       <v-btn elevation="2" class="white--text" color="teal lighten-1" fab>
         <v-icon>
           mdi-magnify
         </v-icon>
       </v-btn>
      </v-col>-->

     <v-col lg="6" cols="12" class="d-flex flex-column justify-center">
       <v-boton-primario linkPrimario="/nueva-transferencia" class="my-2" texto-icon="mdi-plus" texto-boton="Nueva Transferencia"/>
       <!--<v-boton-primario class="my-2" texto-icon="mdi-account-multiple-outline" texto-boton="Ver Beneficiarios"/>-->
     </v-col>
   </v-row>

   <v-tabla :headers="headers" :items="transferencias"/>
 </div>
</template>

<script>
import VTituloHome from "@/components/VTituloHome";
import VBotonPrimario from "@/components/VBotonPrimario";
import VTabla from "@/components/VTabla";
import {mapActions, mapGetters} from "vuex";

export default {
  components:{VTituloHome, VBotonPrimario,VTabla},

  data(){
    return{
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

      desserts: [
        {
          id: 'Frozen Yogurt',
          tipo_transaccion: 159,
          referencia: 6.0,
          fecha_op: 44,
          saldoAnteriorOrigen: 24,
          saldoActualizadoOrigen:44,
          estado: 4.0,
          moneda_Desp: 1,
          descripcion: 'ola',
          nombreTitular: 'pepe',
        }
      ]
    }
  },

  computed: {
    ...mapGetters(['transferencias']),
  },

  mounted() {
    this.verTransferencias(this.$route.params.id);
  },

  methods: {

    ...mapActions(['verTransferencias']),

    mostrarSaldos(saldoAnt, saldoAct){
      return saldoAnt + saldoAct
    }
  }

}
</script>