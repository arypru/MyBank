<template>
  <v-app-bar max-width="auto" color="white" elevation="0" file>
    <v-row class="d-flex flex-row justify-space-between align-center px-8">
      <v-img  max-height="50" max-width="110" src="../assets/images/logosintexto.png" />
      <v-item-navbar/>
      <v-dropdown/>
    </v-row>
  </v-app-bar>
</template>

<script>
import VDropdown from "../components/VDropdown";
import VItemNavbar from "../components/VItemNavbar";

export default {
  components:{VDropdown,VItemNavbar}
}

</script>
