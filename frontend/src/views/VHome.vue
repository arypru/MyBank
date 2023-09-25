<template>
    <div>

      <v-col cols="auto">
        <v-dialog
            transition="dialog-top-transition"
            max-width="600"
            v-model="this.$store.getters.openModal"
        >
            <v-card>
              <v-card-text>
                <div class="text-h2 pa-12">{{msg}}</div>
              </v-card-text>
              <v-card-actions class="justify-end">
                <v-btn
                    text
                    @click="cerrarModal"
                >Entendido</v-btn>
              </v-card-actions>
            </v-card>
        </v-dialog>
      </v-col>

      <v-section-transferencia/>
      <v-section-products/>
    </div>
</template>

<script>
import VSectionTransferencia from "../components/VSectionTransferencia"
import VSectionProducts from "../components/VSectionProducts"
import {mapGetters, mapActions} from "vuex";

export default {
  components:{VSectionTransferencia,VSectionProducts},

  computed: {
    ...mapGetters(['openModal','msg']),
  },

  methods: {
    ...mapActions(['cerrarModal'])
  }
}
</script>