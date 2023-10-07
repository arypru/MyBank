<template>
  <v-row align="center" justify="center" style="height:95vh" class="px-16">

    <v-col cols="12" lg="5" md="6" align-self="center" justify="center">
      <v-card class="px-12 py-10 rounded-xl d-flex justify-center flex-column" width="500" height="650">
        <v-logo heightProp="180" widthProp="220"/>

        <form @submit.prevent="onLogin">

          <v-label-input textoLabel="Usuario"/>
          <v-text-file inputTypeValue="text" v-model="auth.nombre_user" icon="mdi-account"
                       placeholderText="Ingrese su usuario"/>

          <v-label-input textoLabel="Contraseña"/>
          <v-text-field
              color="teal lighten-1"
              outlined
              placeholderText="Ingrese su contraseña"
              v-model="auth.password"
              :prepend-inner-icon="showPasswordLogin ? 'mdi-eye' : 'mdi-eye-off'"
              :type="showPasswordLogin ? 'text' : 'password' "
              @click:prepend-inner="showPasswordLogin = !showPasswordLogin"
          ></v-text-field>

          <v-row justify="center">
            <v-boton-primario type="submit" textoBoton="Ingresar" textoIcon="mdi-menu-right"/>
            <v-boton-text link="/recuperar-constrasena" :click="showPasswordLogin" class="block" :texto=botontext
                          icontext="mdi-cursor-default-click"/>

          </v-row>

          <v-alert outlined type="error" border="left" class="my-4 Bricolage-SemiBold"
                   v-if="incompleteAuth || this.$store.getters.error">
            <div v-if="incompleteAuth">
              Complete los campos nombre de usuario y contraseña antes de ingresar.
            </div>
            <div v-else>
              {{ this.$store.getters.message }}
            </div>
          </v-alert>


        </form>
        <!--
          <v-divider inset></v-divider>
          <h4 class="text-center my-4"> <pre>{{quieroregistrarmetext}}</pre></h4>
          <v-boton-secundario  linkSecundario="/registrarse" textoBoton = "Quiero registrarme" textoIcon="mdi-menu-right"/>
     -->
      </v-card>
    </v-col>

    <v-col align-self="center" cols="12" lg="7" md="6">
      <v-img height="720" width="720" :src=imagenPortada class="text-white"/>
    </v-col>
  </v-row>

</template>

<script>
import VTextFile from "../components/VTextFile";
import VBotonPrimario from "../components/VBotonPrimario";
import VLabelInput from "../components/VLabelInput";
import imagenLogin from "../assets/images/login.svg";
import VLogo from "../components/VLogo";
//import VBotonSecundario from "../components/VBotonSecundario"
import VBotonText from "../components/VBotonText"

import {mapActions, mapGetters} from 'vuex'

export default {
  components: {VTextFile, VBotonPrimario, VLabelInput, VLogo, VBotonText},

  data() {
    return {
      auth: {
        nombre_user: "",
        password: ""
      },
      incompleteAuth: false,
      validationErrors: {},
      processing: false,
      showPasswordLogin: false,
      imagenPortada: imagenLogin,
      botontext: `Si olvidaste tu contraseña` + `\n` + `Hace clic aca`,
      quieroregistrarmetext: `¿Qué esperas para registrarte?` + `\n` + `Te tomara solo unos minutos`
    }
  },

  computed: {
    ...mapGetters([
      "error",
      "message",
      "alerta"
    ]),

  },

  methods: {
    ...mapActions({
      login: "login",
    }),

    onLogin() {
      if (this.auth.nombre_user === "" || this.auth.password === "") {
        this.incompleteAuth = true;
      } else {
        this.incompleteAuth = false
        this.login(this.auth);
      }
    },

  }

}

</script>

<style>
pre {
  letter-spacing: 0.06em;
  font-weight: 400;
}
</style>