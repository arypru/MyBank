<template>
  <div>
    <v-navbar/>

    <v-container rounded-xl style="background: white" class="mt-8 pa-13">

      <div class="p-12">
        <v-titulo-home titulo="Transferencias"/>
        <div class="d-flex flex-row justify-space-between align-center my-8">
          <div v-for="(item, i) in itemsCard" :key="i">
            <v-boton-card :texto="item.text" :imagenurl="item.imagenurl"/>
          </div>
        </div>
      </div>

      <!--
      <div>
        <v-titulo-home titulo="Productos"/>

        <div class="d-flex flex-row">
          <v-card
              class="mx-auto"
              max-width="344"
              outlined
          >
            <v-list-item three-line>
              <v-list-item-content>
                <div class="text-overline mb-4">
                  OVERLINE
                </div>
                <v-list-item-title class="text-h5 mb-1">
                  Headline 5
                </v-list-item-title>
                <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
              </v-list-item-content>

              <v-list-item-avatar
                  tile
                  size="80"
                  color="grey"
              ></v-list-item-avatar>
            </v-list-item>

            <v-card-actions>
              <v-btn
                  outlined
                  rounded
                  text
              >
                Button
              </v-btn>
            </v-card-actions>
          </v-card>

          <v-card
              class="mx-auto"
              max-width="344"
              outlined
          >
            <v-list-item three-line>
              <v-list-item-content>
                <div class="text-overline mb-4">
                  OVERLINE
                </div>
                <v-list-item-title class="text-h5 mb-1">
                  Headline 5
                </v-list-item-title>
                <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
              </v-list-item-content>

              <v-list-item-avatar
                  tile
                  size="80"
                  color="grey"
              ></v-list-item-avatar>
            </v-list-item>

            <v-card-actions>
              <v-btn
                  outlined
                  rounded
                  text
              >
                Button
              </v-btn>
            </v-card-actions>
          </v-card>

          <v-card
              class="mx-auto"
              max-width="344"
              outlined
          >
            <v-list-item three-line>
              <v-list-item-content>
                <div class="text-overline mb-4">
                  OVERLINE
                </div>
                <v-list-item-title class="text-h5 mb-1">
                  Headline 5
                </v-list-item-title>
                <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
              </v-list-item-content>

              <v-list-item-avatar
                  tile
                  size="80"
                  color="grey"
              ></v-list-item-avatar>
            </v-list-item>

            <v-card-actions>
              <v-btn
                  outlined
                  rounded
                  text
              >
                Button
              </v-btn>
            </v-card-actions>
          </v-card>
        </div>


      </div>

      <div>
        <v-titulo-home titulo="Tarjetas"/>
        <div class="d-flex flex-row">
          <v-card
              class="mx-auto"
              max-width="344"
              outlined
          >
            <v-list-item three-line>
              <v-list-item-content>
                <div class="text-overline mb-4">
                  OVERLINE
                </div>
                <v-list-item-title class="text-h5 mb-1">
                  Headline 5
                </v-list-item-title>
                <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
              </v-list-item-content>

              <v-list-item-avatar
                  tile
                  size="80"
                  color="grey"
              ></v-list-item-avatar>
            </v-list-item>

            <v-card-actions>
              <v-btn
                  outlined
                  rounded
                  text
              >
                Button
              </v-btn>
            </v-card-actions>
          </v-card>

          <v-card
              class="mx-auto"
              max-width="344"
              outlined
          >
            <v-list-item three-line>
              <v-list-item-content>
                <div class="text-overline mb-4">
                  OVERLINE
                </div>
                <v-list-item-title class="text-h5 mb-1">
                  Headline 5
                </v-list-item-title>
                <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
              </v-list-item-content>

              <v-list-item-avatar
                  tile
                  size="80"
                  color="grey"
              ></v-list-item-avatar>
            </v-list-item>

            <v-card-actions>
              <v-btn
                  outlined
                  rounded
                  text
              >
                Button
              </v-btn>
            </v-card-actions>
          </v-card>

          <v-card
              class="mx-auto"
              max-width="344"
              outlined
          >
            <v-list-item three-line>
              <v-list-item-content>
                <div class="text-overline mb-4">
                  OVERLINE
                </div>
                <v-list-item-title class="text-h5 mb-1">
                  Headline 5
                </v-list-item-title>
                <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
              </v-list-item-content>

              <v-list-item-avatar
                  tile
                  size="80"
                  color="grey"
              ></v-list-item-avatar>
            </v-list-item>

            <v-card-actions>
              <v-btn
                  outlined
                  rounded
                  text
              >
                Button
              </v-btn>
            </v-card-actions>
          </v-card>
        </div>
      </div>-->

    </v-container>
  </div>
</template>


<script>
import VNavbar from "../components/VNavbar"
import VTituloHome from "../components/VTituloHome"
import VBotonCard from "../components/VBotonCard"

import newtransfer from "../assets/images/transferencia-bancaria.svg";
import vertransfer from "../assets/images/factura.svg";
import verbenef from "../assets/images/cuenta-de-usuario.svg"

export default {
  components:{VNavbar,VTituloHome,VBotonCard},

  data () {
    return {
      itemsCard: [
        { text: `Nueva` + `\n` + `Transferencia`, imagenurl: newtransfer, link: '' },
        { text: `Ver` + `\n` + `Transferencias`, imagenurl: vertransfer, link: ''},
        { text: `Ver` + `\n` + `Beneficiarios`, imagenurl: verbenef, link:''},
      ],
    }
  }
}
</script>