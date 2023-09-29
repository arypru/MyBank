<template>
  <div>
    <v-tabs color="teal lighten-1" v-model="tab" grow>
      <v-tab v-for="item in itemsTabs" :key="item">
        {{ item }}
      </v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">

      <div v-if="tab === 0">
        <v-subtitulo subtitulo="Información Personal"></v-subtitulo>

        <div class="d-flex flex-row Bricolage-Regular justify-space-around ">
          <div>
            <div>
              <p class="d-inline Bricolage-SemiBold">Nombres: </p>
              <p class="d-inline"> {{ persona.nombre }} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Apellido: </p>
              <p class="d-inline"> {{ persona.apellido }}</p>
            </div>


            <div>
              <p class="d-inline Bricolage-SemiBold">DNI: </p>
              <p class="d-inline"> {{ persona.dni }}</p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">CUIL: </p>
              <p class="d-inline"> {{ persona.cuil }} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Dirección: </p>
              <p class="d-inline"> {{ persona.direccion }}</p>
            </div>
            <div>
              <p class="d-inline Bricolage-SemiBold">Telefono: </p>
              <p class="d-inline"> {{ persona.telefono }} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Sexo: </p>
              <p class="d-inline"> {{ persona.sexo }} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Edad: </p>
              <p class="d-inline"> {{ persona.edad }} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Fecha de Nacimiento: </p>
              <p class="d-inline">{{ persona.fecha_nacimiento }} </p>
            </div>

          </div>
          <div class="d-flex justify-center flex-column">
            <v-img height="200" width="200" :src="this.userIcon"/>

            <div>
              <p class="d-inline Bricolage-SemiBold">Alta: </p>
              <p class="d-inline"> {{ persona.alta }} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Ultima modificacion: </p>
              <p class="d-inline"> {{ persona.modificado }} </p>
            </div>

          </div>
        </div>
      </div>

      <div v-if="tab === 1">
        <v-subtitulo subtitulo="Configuración de su cuenta"></v-subtitulo>

        <v-row justify="center">
          <v-col cols="6">
            <v-label-input textoLabel="Nombre de usuario"/>
            <v-row no-gutters justify="center">
              <v-col cols="9">
                <v-text-field
                    outlined
                    class="d-inline"
                    v-model="user.nombre_user"
                    :disabled="!update.nombre_user"
                    type="text"
                    color="teal lighten-1"
                ></v-text-field>
              </v-col>
              <v-col cols="3" class="my-2 px-6">
                <v-btn color="teal lighten-1" class="d-inline" elevation="2" icon
                       @click="update.nombre_user = !update.nombre_user">
                  <div v-if="update.nombre_user">
                    <v-icon>mdi-pencil-off</v-icon>
                  </div>
                  <div v-else>
                    <v-icon>mdi-pencil</v-icon>
                  </div>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
          <v-col cols="6">
            <v-alert outlined color="teal lighten-1">
              <div>
                <p class="d-inline Bricolage-SemiBold">Ultima Actualizacion: </p>
                <p class="d-inline"> {{ usuario.ultima_modificacion }} </p>
              </div>

              <div>
                <p class="d-inline Bricolage-SemiBold">Usuario dado de alta el: </p>
                <p class="d-inline"> {{ usuario.alta }} </p>
              </div>
            </v-alert>
          </v-col>
        </v-row>

        <v-row justify="center">
          <v-col cols="6">
            <v-label-input textoLabel="Correo Electronico"/>
            <v-row no-gutters justify="center">
              <v-col cols="9">
                <v-text-field
                    outlined
                    class="d-inline"
                    v-model="user.correo"
                    :disabled="!update.correo"
                    type="text"
                    color="teal lighten-1"
                ></v-text-field>
              </v-col>
              <v-col cols="3" class="my-2 px-6">
                <v-btn color="teal lighten-1" class="d-inline" elevation="2" icon
                       @click="update.correo = !update.correo">
                  <div v-if="update.correo">
                    <v-icon>mdi-pencil-off</v-icon>
                  </div>
                  <div v-else>
                    <v-icon>mdi-pencil</v-icon>
                  </div>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
          <v-col cols="6">
            <v-label-input textoLabel="Telefono"/>
            <v-row no-gutters justify="center">
              <v-col cols="9">
                <v-text-field
                    outlined
                    class="d-inline"
                    v-model="user.tel"
                    :disabled="!update.tel"
                    type="text"
                    color="teal lighten-1"
                ></v-text-field>
              </v-col>
              <v-col cols="3" class="my-2 px-6">
                <v-btn color="teal lighten-1" class="d-inline" elevation="2" icon @click="update.tel = !update.tel">
                  <div v-if="update.tel">
                    <v-icon>mdi-pencil-off</v-icon>
                  </div>
                  <div v-else>
                    <v-icon>mdi-pencil</v-icon>
                  </div>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
        </v-row>

        <v-row justify="center">
          <v-col cols="6">
            <v-label-input textoLabel="Ingrese su nueva contraseña"/>
            <v-row no-gutters justify="center">
              <v-col cols="9">
                <v-text-field
                    outlined
                    class="d-inline"
                    v-model="user.pass"
                    :disabled="!update.pass"
                    type="text"
                    color="teal lighten-1"
                ></v-text-field>
              </v-col>
              <v-col cols="3" class="my-2 px-6">
                <v-btn color="teal lighten-1" class="d-inline" elevation="2" icon @click="update.pass = !update.pass">
                  <div v-if="update.pass">
                    <v-icon>mdi-pencil-off</v-icon>
                  </div>
                  <div v-else>
                    <v-icon>mdi-pencil</v-icon>
                  </div>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
          <v-col cols="6">
            <v-label-input textoLabel="Repita su contraseña"/>
            <v-row no-gutters justify="center">
              <v-text-field
                  outlined
                  class="d-inline"
                  v-model="user.passv2"
                  :disabled="!update.pass"
                  type="text"
                  color="teal lighten-1"
              ></v-text-field>
            </v-row>
          </v-col>
        </v-row>

        <v-row justify="center" class="my-12">
          <v-boton-primario type="submit" textoBoton="Modificar" textoIcon="mdi-menu-right"/>
        </v-row>
      </div>


      <div v-if="tab === 2">
        <v-subtitulo subtitulo="Detalle de Sesion Activa"></v-subtitulo>
        <v-row no-gutters justify="center" align-content="center">
          <v-col cols="12" lg="4" align-self="center">
            <h4 class="teal--text lighten-1-text d-inline Bricolage-SemiBold">{{ sesionActiva.ultimaConexion }} </h4>

            <div>
              <p class="d-inline Bricolage-SemiBold">Nombre del equipo: </p>
              <p class="d-inline"> {{ sesionActiva.servicioNombre }}</p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Sistema Operativo: </p>
              <p class="d-inline"> {{ sesionActiva.os }}</p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Dirección IP: </p>
              <p class="d-inline"> {{ sesionActiva.ip }}</p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Navegador: </p>
              <p class="d-inline"> {{ sesionActiva.browser }}</p>
            </div>
          </v-col>

          <v-col cols="12" lg="8">
            <v-tabla :items="historialSesiones" :headers="headers"/>
          </v-col>

        </v-row>

      </div>
    </v-tabs-items>

  </div>
</template>

<script>
import VSubtitulo from "@/components/VSubtitulo";
import VUserIcon from "../assets/images/user_icon.png";
import VLabelInput from "@/components/VLabelInput";
import VBotonPrimario from "@/components/VBotonPrimario";
import {mapActions, mapGetters} from "vuex";
import VTabla from "@/components/VTabla";


export default {
  components: {VSubtitulo, VLabelInput, VBotonPrimario,VTabla},
  data() {
    return {
      userIcon: VUserIcon,
      tab: null,
      itemsTabs: [
        'Sobre Mí', 'Configuración de cuenta', 'Detalle de Sesión',
      ],
      update: {
        nombre_user: false,
        correo: false,
        tel: false,
        pass: false,
      },

      user: {
        nombre_user: this.$store.getters.usuario.nombre_user,
        correo: this.$store.getters.usuario.email,
        tel: this.$store.getters.usuario.telefono,
        pass: '---------- ',
        passv2: ' ---------- ',
      },

      headers: [
        { text: 'Fecha y Hora', align: 'center', value: 'ultimaConexion' },
        { text: 'Equipo',align: 'center', value: 'servicioNombre' },
        { text: 'Ip',align: 'center', value: 'ip' },
        { text: 'Navegador',align: 'center', value: 'browser' },
        { text: 'Sist Op.', align: 'center',value: 'os' },
      ],



    }

  },

  computed: {
    ...mapGetters(['persona', 'usuario', 'sesionActiva','historialSesiones']),
  },

  methods: {
    ...mapActions(['getInformacionPersonal', 'getConfiguracionCuenta', 'getSesionActiva','getHistorialSesiones']),
  },
  mounted() {
    this.getInformacionPersonal(this.$route.params.id);
    this.getConfiguracionCuenta(this.$route.params.id);
    this.getSesionActiva(this.$route.params.id);
    this.getHistorialSesiones(this.$route.params.id);
  },


}
</script>

<style>
p {
  color: #2D2D2D;
}


</style>
