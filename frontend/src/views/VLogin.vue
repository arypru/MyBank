<template>
    <v-row align="center" justify="center" style="height:100vh">
      <v-card class="pa-16 d-flex flex-row justify-center align-center" width="1000" elevation="2" outlined shaped>

        <v-col cols="12" lg="8" md="6">
          <v-card flat tile>
            <v-card-text> Imagen </v-card-text>
          </v-card>
        </v-col>

        <v-col cols="12" lg="4" md="6">
          <v-titulo  class="my-12" Titulo="My Bank Login"/>

          <v-label-input textoLabel="Usuario"/>
          <v-text-file placeholderText="Ingrese su usuario"/>

          <v-label-input textoLabel="Contraseña"/>
          <v-text-file placeholderText="Ingrese su contraseña"/>

          <v-boton-primario textoBoton="Ingresar" textoIcon="mdi-menu-right"/>

          <v-btn class="my-8" text color="primary">
            Recuperar Contraseña
          </v-btn>

          <v-card outlined>
            ¿No tenes usuario? Registrate ya mismo!
            <v-btn class="black--text" color="amber accent-2" large rounded block outlined>
              Quiero registrarme
              <v-icon right>mdi-menu-right</v-icon>
            </v-btn>
          </v-card>
        </v-col>

      </v-card>
    </v-row>
</template>

<script>
import VTitulo from "../components/VTitulo";
import VTextFile from "../components/VTextFile";
import VBotonPrimario from "../components/VBotonPrimario";
import VLabelInput from "../components/VLabelInput"

export default {
  components:{VTitulo,VTextFile,VBotonPrimario,VLabelInput}
}

</script>

<style>

</style>