<template>
  <div>
    <v-app-bar max-width="auto" color="white" elevation="0" file>
      <v-row class="d-flex flex-row justify-space-between align-center px-8">
        <v-img  max-height="50" max-width="110" src="../assets/images/logosintexto.png" />
        <v-item-navbar/>
        <v-dropdown/>
      </v-row>
    </v-app-bar>

    <v-container fluid style="background: white" class="mt-8">
      <div>
        <h2 style="color:black">Transferencias</h2>
        <v-divider></v-divider>
        <v-boton-primario textoBoton="Nueva Transferencia"/>
        <v-boton-primario textoBoton="Ver Transferencias"/>
        <v-boton-primario textoBoton="Añadir Beneficiario"/>
      </div>

      <div>
        <h2 style="color:black">Productos</h2>
        <v-divider></v-divider>

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
        <h2 style="color:black">Tarjetas</h2>
        <v-divider></v-divider>
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
import VDropdown from "../components/VDropdown";
import VItemNavbar from "../components/VItemNavbar";

export default {
  components:{VBotonPrimario,VDropdown,VItemNavbar}
}
</script>