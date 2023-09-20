<template>

    <v-row class="px-12" align="center" justify="center" style="height:95vh" no-gutters>
        <v-col cols="12" lg="4" md="6">
          <v-card  class="px-12 py-10 rounded-xl">
            <v-logo heightProp="180" widthProp="220"/>

            <form @submit.prevent="onLogin">

              <v-label-input textoLabel="Usuario"/>
              <v-text-file inputTypeValue="text" v-model="auth.nombre_user" icon="mdi-account" placeholderText="Ingrese su usuario"/>

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

              <v-boton-primario type="submit" textoBoton="Ingresar" textoIcon="mdi-menu-right"/>
              <v-boton-text :click="showPasswordLogin" class="block" :texto=botontext icontext="mdi-cursor-default-click"/>

              <v-alert v-if="incompleteAuth || this.$store.getters.error" type="error">
                <div v-if="incompleteAuth">
                  Complete los campos nombre de usuario y contraseña antes de ingresar.
                </div>
                <div v-else>
                  {{this.$store.getters.message}}
                </div>

              </v-alert>

            </form>
              <v-divider inset></v-divider>
              <h4 class="text-center my-4"> <pre>{{quieroregistrarmetext}}</pre></h4>
              <v-boton-secundario  linkSecundario="/registrarse" textoBoton = "Quiero registrarme" textoIcon="mdi-menu-right"/>
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

import { mapActions, mapGetters } from 'vuex'

export default {
  components:{VTextFile,VBotonPrimario,VLabelInput,VLogo,VBotonSecundario,VBotonText},


  data () {
    return {
      auth:{
        nombre_user:"",
        password:""
      },
      incompleteAuth: false,
      validationErrors:{},
      processing:false,
      showPasswordLogin: false,
      imagenPortada: imagenLogin,
      botontext: `Si olvidaste tu contraseña` + `\n` + `Hace clic aca`,
      quieroregistrarmetext:`¿Qué esperas para registrarte?` + `\n` +`Te tomara solo unos minutos`
    }
  },

  computed: {
    ...mapGetters([
      "error",
      "message"
    ]),
  },

  methods:{
    ...mapActions({
      login: "login",
    }),

    onLogin() {
      console.log(this.auth)
      if(this.auth.nombre_user === "" || this.auth.password === ""){
        this.incompleteAuth = true;
      }else{
        this.incompleteAuth = false
        this.login(this.auth);
      }
    },

    changeIcon(){

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