<template>
  <v-row align="center" justify="center" style="height:100vh" class="d-flex flex-column">

    <v-card class="px-8 py-5" elevation="2" shaped width="80%">

      <v-card-title class="text-center  d-flex justify-space-between">
        <v-btn to="/login" large rounded width="auto" class="my-8 px-8 py-5" text color="teal lighten-1" >
          <v-icon left>mdi-menu-left</v-icon>
          <h3><pre>Volver</pre></h3>
        </v-btn>

        <span>
          <h2 class="registro">Creación de Usuario</h2>
          <h2 class="registro">Home Banking</h2>
        </span>

        <v-img  max-height="90" max-width="180" src="../assets/images/logosintexto.png" />

      </v-card-title>

      <v-stepper v-model="e1">
        <v-stepper-header>

          <v-stepper-step color="teal lighten-1" :complete="e1 > 1" step="1">
              Ingreso de <br> Datos
          </v-stepper-step>

          <v-divider></v-divider>

          <v-stepper-step color="teal lighten-1" :complete="e1 > 2" step="2">
            Validación de <br> Identidad
          </v-stepper-step>

          <v-divider></v-divider>

          <v-stepper-step color="teal lighten-1" :complete="e1 > 3" step="3">
              Generación de <br> Usuario
          </v-stepper-step>

          <v-divider></v-divider>


          <v-stepper-step color="teal lighten-1" step="4">
              Listo!
          </v-stepper-step>

        </v-stepper-header>

        <v-stepper-items class="py-5 d-flex">
          <v-stepper-content step="1">

            <v-label-input textoLabel="Ingresa tu DNI"/>
            <v-text-file icon="mdi-account" placeholderText="Por ejemplo: 784561235"/>

            <v-label-input textoLabel="Ingresa tu Correo Electronico"/>
            <v-text-file icon="mdi-at" placeholderText="Por ejemplo: email@hotml.com"/>

            <v-label-input textoLabel="Ingresa tu número de celular"/>
            <v-text-file icon="mdi-phone" placeholderText="Por ejemplo: +549874124578"/>

            <div class="d-flex justify-center">

              <v-btn @click="e1 = 2"  class="white--text" color="teal lighten-1" large rounded>
                <h3>Continuar</h3>
                <v-icon right>mdi-menu-right</v-icon>
              </v-btn>

            </div>

          </v-stepper-content>

          <v-stepper-content step="2">

            <p>¿cual de estas tarjetas te pertenecen?</p>

            <div class="d-flex justify-center">
              <v-btn @click="e1 = 3"  class="white--text" color="teal lighten-1" large rounded>
                <h3>Continuar</h3>
                <v-icon right>mdi-menu-right</v-icon>
              </v-btn>
            </div>
          </v-stepper-content>

          <v-stepper-content step="3">

            <v-label-input textoLabel="Nombre de usuario"/>
            <v-text-file icon="mdi-account" placeholderText="Por ejemplo: 784561235"/>

            <v-label-input textoLabel="Contraseña"/>
            <v-text-file icon="mdi-key" placeholderText="Por ejemplo: 784561235"/>

            <v-label-input textoLabel="Repetir contraseña"/>
            <v-text-file icon="mdi-key" placeholderText="Por ejemplo: 784561235"/>

            <v-label-input textoLabel="Ingresa una clave"/>
            <v-text-file icon="mdi-key" placeholderText="Por ejemplo: 784561235"/>

            <div class="d-flex justify-center">
              <v-btn @click="e1 = 4"  class="white--text" color="teal lighten-1" large rounded>
                <h3>Continuar</h3>
                <v-icon right>mdi-menu-right</v-icon>
              </v-btn>
            </div>
          </v-stepper-content>


          <v-stepper-content step="4">

            Usuario creado con èxito!
            <div class="d-flex justify-center">
              <v-btn to="/login"  class="white--text" color="teal lighten-1" large rounded>
                <h3>Ingresar</h3>
                <v-icon right>mdi-menu-right</v-icon>
              </v-btn>

            </div>

          </v-stepper-content>
        </v-stepper-items>
      </v-stepper>

    </v-card>
  </v-row>

</template>


<script>
import VTextFile from "../components/VTextFile";
import VLabelInput from "../components/VLabelInput";
//import VLogo from "../components/VLogo";

export default {
  components: {VTextFile,VLabelInput},
  data () {
    return {
      e1: 1,
    }
  },

  methods:{
    someEvent(){
      alert("olaregistro")
    }
  }
}
</script>

<style>
.registro{
  letter-spacing: 0.06em;
  font-weight: 400;
  color: #2D2D2D;
}
</style>