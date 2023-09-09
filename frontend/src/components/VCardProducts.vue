<template>
  <v-hover v-slot="{ hover }" >
    <v-card
        class="mx-auto Bricolage-Regular rounded-xl"
        max-width="344"
        outlined
        hover
        :elevation="hover ? 6 : 2"
        :class="{ 'on-hover': hover }"
    >

      <v-list-item three-line class="text-center">
        <v-list-item-content>
          <div class="text-overline mb-2">
            CC 000964875411352415
          </div>
          <v-list-item-title class="text-h4">
            <p class="Bricolage-SemiBold teal--text text--lighten-1">$ 7854,785</p>
          </v-list-item-title>
          <v-list-item-subtitle>
            <p class="Bricolage-SemiBold">aliasss</p>
          </v-list-item-subtitle>

          <v-card-actions class="d-flex justify-center">
            <v-btn
                color="teal lighten-1"
                outlined
                rounded
                text
                class="text-capitalize"
            >
              Ver movimientos
            </v-btn>
          </v-card-actions>

        </v-list-item-content>

        <v-list-item-avatar
            tile
            size="55"
            class="d-flex align-center"
        >
          <v-img  src="../assets/images/cartera.svg"/>
        </v-list-item-avatar>
      </v-list-item>


    </v-card>
  </v-hover>

</template>

<script>

</script>

<style>
.v-card {
  transition: opacity .4s ease-in-out;
}

.v-card:not(.on-hover) {
  opacity: 0.7;
}

.show-btns {
  color: rgba(255, 255, 255, 1) !important;
}
</style>