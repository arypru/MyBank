<template>
 <div>
   <v-titulo-home titulo="Transferencias"/>

   <v-row class="my-2">
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
      </v-col>

     <v-col lg="6" cols="12" class="d-flex flex-column justify-center">
       <v-boton-primario class="my-2" texto-icon="mdi-plus" texto-boton="Nueva Transferencia"/>
       <v-boton-primario class="my-2" texto-icon="mdi-account-multiple-outline" texto-boton="Ver Beneficiarios"/>
     </v-col>
   </v-row>

   <v-tabla :headers="headers" :items="desserts"/>

 </div>
</template>

<script>
import VTituloHome from "@/components/VTituloHome";
import VTextFile from "@/components/VTextFile";
import VLabelInput from "@/components/VLabelInput";
import VBotonPrimario from "@/components/VBotonPrimario";
import VTabla from "@/components/VTabla";

export default {
  components:{VTituloHome, VTextFile, VLabelInput, VBotonPrimario,VTabla},

  data(){
    return{
      headers: [
        { text: 'Nro Operacion', align: 'center', value: 'id' },
        { text: 'Nro cuenta', align: 'center', value: 'id' },
        { text: 'Tipo Transaccion',align: 'center', value: 'tipo_transaccion' },
        { text: 'Referencia',align: 'center', value: 'referencia' },
        { text: 'Fecha',align: 'center', value: 'fecha_op' },
        { text: 'Moneda', align: 'center',value: 'moneda_Desp' },
        { text: 'Saldo', align: 'center',value: this.mostrarSaldos('saldoAnteriorOrigen','saldoActualizadoOrigen') },
        { text: 'Alias', align: 'center', value: 'alias' },
        { text: 'Titular', align: 'center', value: 'nombreTitular' },
        { text: 'Estado', align: 'center',value: 'estado' },
        { text: 'Descrip', align: 'center',value: 'descripcion' },
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

  methods: {
    mostrarSaldos(saldoAnt, saldoAct){
      return saldoAnt + saldoAct
    }
  }

}
</script>