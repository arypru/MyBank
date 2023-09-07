<template>
  <div>
    <v-navbar/>

    <v-container  style="background: white" class="mt-8">
      <div>
        <v-titulo-home titulo="Transferencias"/>
        <v-boton-primario textoBoton="Nueva Transferencia"/>
        <v-boton-primario textoBoton="Ver Transferencias"/>
        <v-boton-primario textoBoton="Añadir Beneficiario"/>
      </div>

      <div>
        <v-titulo-home titulo="Transferencias"/>

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
        <v-titulo-home titulo="Transferencias"/>
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


    </v-container>
  </div>
</template>


<script>
import VBotonPrimario from "../components/VBotonPrimario";
import VNavbar from "../components/VNavbar"
import VTituloHome from "../components/VTituloHome"
export default {
  components:{VBotonPrimario,VNavbar,VTituloHome}
}
</script>