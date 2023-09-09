<template>
  <v-hover v-slot="{ hover }" >
    <v-card
        class="mx-auto Bricolage-Regular rounded-xl"
        outlined
        hover
        :elevation="hover ? 6 : 2"
        :class="{ 'on-hover': hover }"
    >
        <v-img src="../assets/images/tarjeta.jpeg"/>
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