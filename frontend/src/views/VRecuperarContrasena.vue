<template>
  <div class="mt-2 mb-8 mx-4 mx-sm-16 d-flex justify-center flex-row">
    <v-container rounded-xl style="background: white" class="mt-4 py-8 px-13">
      <v-row align="center" no-gutters>

        <v-col lg="6" cols="12" justify="center" class="px-12 py-10 rounded-xl d-flex justify-center flex-column">
          <v-logo heightProp="180" widthProp="220"/>

          <v-stepper v-model="e6" vertical>
            <v-stepper-step :complete="e6 > 1" step="1" color="teal lighten-1">
              <h4 class="Bricolage-Regular my-2">Revisa tu correo</h4>
              <v-divider></v-divider>
            </v-stepper-step>

            <v-stepper-content step="1">

              <v-row no-gutters justify="center">
                <v-img height="100" contain :src="emailIcon"></v-img>
                <p class="Bricolage-Regular">Se te envio un código de 4 dígitos a tu correo electronico.</p>

                <div>
                  <v-btn color="teal lighten-1" class="white--text" @click="e6 = 2">
                    Recibi el correo
                  </v-btn>
                  <v-btn text color="teal lighten-1" class="white--text" @click="e6 = 2">
                    Reenviar
                  </v-btn>
                </div>
              </v-row>

            </v-stepper-content>


            <v-stepper-step :complete="e6 > 2" step="2" color="teal lighten-1">
              <h4 class="Bricolage-Regular my-2">Ingresar código</h4>
              <v-divider></v-divider>
            </v-stepper-step>

            <v-stepper-content step="2">
              <p class="Bricolage-Regular">Ingresa el código que recibiste</p>
              <div class="ma-auto position-relative" style="max-width: 300px">
                <v-otp-input length="4" color="teal lighten-1" v-model="otp" :disabled="loading"
                             @finish="onFinish"></v-otp-input>
                <v-overlay absolute :value="loading">
                  <v-progress-circular indeterminate color="primary"></v-progress-circular>
                </v-overlay>
              </div>

              <v-btn @click="e6 = 3" color="teal lighten-1" class="white--text">
                Confirmar
              </v-btn>
            </v-stepper-content>

            <v-stepper-step color="teal lighten-1" :complete="e6 > 3" step="3">
              <h4 class="Bricolage-Regular my-2">Recuperar contraseña</h4>
            </v-stepper-step>

            <v-stepper-content step="3">
              <v-label-input texto-label="Ingresa una nueva contraseña"></v-label-input>
              <v-text-file icon="mdi-lock-outline" placeholder-text="......"/>

              <v-label-input texto-label="Repite la contraseña"></v-label-input>
              <v-text-file icon="mdi-lock-outline" placeholder-text="......"/>

              <v-btn @click="e6 = 4" color="teal lighten-1" class="white--text">
                Confirmar
              </v-btn>

            </v-stepper-content>

            <v-stepper-step color="teal lighten-1" :complete="e6 > 4" step="4">
              <h4 class="Bricolage-Regular my-2">Listo!</h4>
            </v-stepper-step>

            <v-stepper-content step="4">
              <v-row justify="center" no-gutters>
                <v-img width="100" height="100" contain :src="checkIcon"/>
                <p class="Bricolage-SemiBold my-4">Se cambio con éxito la contraseña!</p>
                <v-boton-primario linkPrimario="/login" type="submit" textoBoton="Ingresar" textoIcon="mdi-menu-right"/>
              </v-row>
            </v-stepper-content>

          </v-stepper>

        </v-col>


        <v-col lg="6" cols="12" justify="center">
          <v-img :src="forgotPass"/>
        </v-col>

      </v-row>
    </v-container>
  </div>
</template>

<script>
import VLogo from "@/components/VLogo";
import forgotPass from "../assets/images/forgot-pass.svg";
import emailIcon from "../assets/images/email.png"
import checkIcon from "../assets/images/check.svg"
import VTextFile from "../components/VTextFile";
import VLabelInput from "../components/VLabelInput";
import VBotonPrimario from "@/components/VBotonPrimario";

export default {
  components: {VLogo, VTextFile, VLabelInput, VBotonPrimario},

  data: () => ({
    forgotPass: forgotPass,
    emailIcon: emailIcon,
    checkIcon: checkIcon,
    loading: false,
    snackbar: false,
    snackbarColor: 'default',
    otp: '',
    text: '',
    expectedOtp: '133707',
    e6: 1,
  }),

  methods: {
    onFinish(rsp) {
      this.loading = true
      setTimeout(() => {
        this.loading = false
        this.snackbarColor = (rsp === this.expectedOtp) ? 'success' : 'warning'
        this.text = `Processed OTP with "${rsp}" (${this.snackbarColor})`
        this.snackbar = true
      }, 3500)
    },
  },
}
</script>