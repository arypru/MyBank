<template>
 <div>
   <v-titulo-home titulo="Transferencias"/>
 </div>
</template>

<script>
import VTituloHome from "@/components/VTituloHome";

export default {
  components:{VTituloHome},

  data(){
    return{
      headers: [
        { text: 'Fecha y Hora', align: 'center', value: 'ultimaConexion' },
        { text: 'Equipo',align: 'center', value: 'servicioNombre' },
        { text: 'Ip',align: 'center', value: 'ip' },
        { text: 'Navegador',align: 'center', value: 'browser' },
        { text: 'Sist Op.', align: 'center',value: 'os' },
      ],
    }
  }
}
</script>