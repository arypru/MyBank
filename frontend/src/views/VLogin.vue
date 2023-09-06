<template>

    <v-row class="px-12" align="center" justify="center" style="height:95vh" no-gutters>
        <v-col cols="12" lg="4" md="6">
          <v-card  class="px-12 py-10 rounded-xl">
            <v-logo heightProp="180" widthProp="220"/>
            <v-label-input textoLabel="Usuario"/>
            <v-text-file icon="mdi-account" placeholderText="Ingrese su usuario"/>

            <v-label-input textoLabel="Contraseña"/>
            <v-text-file icon="mdi-lock" placeholderText="Ingrese su contraseña"/>

              <v-boton-primario textoBoton="Ingresar" textoIcon="mdi-menu-right"/>
              <v-boton-text class="block" :texto=botontext icontext="mdi-cursor-default-click"/>

              <v-divider inset></v-divider>
              <h4 class="text-center my-4"> <pre>{{quieroregistrarmetext}}</pre></h4>
              <v-boton-secundario linkSecundario="/registrarse" textoBoton = "Quiero registrarme" textoIcon="mdi-menu-right"/>
          </v-card>
        </v-col>

        <v-col cols="12" lg="8" md="6">
            <v-img height="780" :src=imagenPortada class="text-white"/>
        </v-col>
    </v-row>

</template>

<script>
import VTextFile from "../components/VTextFile";
import VBotonPrimario from "../components/VBotonPrimario";
import VLabelInput from "../components/VLabelInput";
import imagenLogin from "../assets/images/portadaLogin.jpg";
import VLogo from "../components/VLogo";
import VBotonSecundario from "../components/VBotonSecundario"
import VBotonText from "../components/VBotonText"

export default {
  components:{VTextFile,VBotonPrimario,VLabelInput,VLogo,VBotonSecundario,VBotonText},

  data () {
    return {
      imagenPortada: imagenLogin,
      botontext: `Si olvidaste tu contraseña` + `\n` + `Hace clic aca`,
      quieroregistrarmetext:`¿Qué esperas para registrarte?` + `\n` +`Te tomara solo unos minutos`
    }
  }
}

</script>

<style>
pre{
  letter-spacing: 0.06em;
  font-weight: 400;
}
</style>