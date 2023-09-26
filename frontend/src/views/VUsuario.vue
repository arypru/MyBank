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
              <p class="d-inline"> {{persona.nombre}} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Apellido: </p>
              <p class="d-inline"> {{persona.apellido}}</p>
            </div>


            <div>
              <p class="d-inline Bricolage-SemiBold">DNI: </p>
              <p class="d-inline"> {{persona.dni}}</p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">CUIL: </p>
              <p class="d-inline"> {{persona.cuil}} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Dirección: </p>
              <p class="d-inline"> {{persona.direccion}}</p>
            </div>
            <div>
              <p class="d-inline Bricolage-SemiBold">Telefono: </p>
              <p class="d-inline"> {{persona.telefono}} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Sexo: </p>
              <p class="d-inline"> {{persona.sexo}} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Edad: </p>
              <p class="d-inline"> {{persona.edad}} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Fecha de Nacimiento: </p>
              <p class="d-inline">{{persona.fecha_nacimiento}} </p>
            </div>

          </div>
          <div class="d-flex justify-center flex-column">
            <v-img height="200" width="200" :src="this.userIcon"/>

            <div>
              <p class="d-inline Bricolage-SemiBold">Alta: </p>
              <p class="d-inline"> {{persona.alta}} </p>
            </div>

            <div>
              <p class="d-inline Bricolage-SemiBold">Ultima modificacion: </p>
              <p class="d-inline"> {{persona.modificado}} </p>
            </div>

          </div>
        </div>
      </div>

      <div v-if="tab === 1">
        <v-subtitulo subtitulo="Configuración de su cuenta"></v-subtitulo>

        <v-label-input textoLabel="Nombre de usuario"/>
        <v-text-file inputTypeValue="text"  icon="mdi-account" placeholderText="Nombre de usuario"/>

        <v-label-input textoLabel="Correo Electronico"/>
        <v-text-file inputTypeValue="text"  icon="mdi-account" placeholderText="Correo Electronico"/>

        <v-label-input textoLabel="Ingrese su nueva contraseña"/>
        <v-text-file inputTypeValue="text"  icon="mdi-account" placeholderText="nueva contraseña"/>

        <v-label-input textoLabel="Repita su contraseña"/>
        <v-text-file inputTypeValue="text"  icon="mdi-account" placeholderText="Repita su contraseña"/>
      </div>

      <div v-if="tab === 2">
        <v-subtitulo subtitulo="Detalle de Sesion Activa"></v-subtitulo>

        <div>
          <p class="d-inline Bricolage-SemiBold">Nombre del equipo: </p>
          <p class="d-inline"> Maria</p>
        </div>

        <div>
          <p class="d-inline Bricolage-SemiBold">Sistema Operativo: </p>
          <p class="d-inline"> Maria</p>
        </div>

        <div>
          <p class="d-inline Bricolage-SemiBold">Dirección IP: </p>
          <p class="d-inline"> Maria</p>
        </div>

        <v-subtitulo subtitulo="Detalle completo de inicios de sesion asociados a su cuenta"></v-subtitulo>

      </div>
    </v-tabs-items>

  </div>
</template>

<script>
import VSubtitulo from "@/components/VSubtitulo";
import VUserIcon from "../assets/images/user_icon.png";
import VTextFile from "@/components/VTextFile";
import VLabelInput from "@/components/VLabelInput";
import {mapActions, mapGetters} from "vuex";


export default {
  components: {VSubtitulo, VTextFile, VLabelInput},
  data () {
    return {
      userIcon: VUserIcon,
      tab: null,
      itemsTabs: [
        'Sobre Mí', 'Configuración de cuenta', 'Detalle de Sesión',
      ] }
  },

  computed: {
    ...mapGetters(['persona']),
  },

  methods: {
    ...mapActions(['getInformacionPersonal'])
  },

  mounted() {
    this.getInformacionPersonal(this.$route.params.id);
  },


}
</script>

<style>
p{
  color:#2D2D2D;
}
</style>
