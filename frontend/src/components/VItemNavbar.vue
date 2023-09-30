<template>
    <v-list flat max-width="110">
      <v-list-item-group
          v-model="selectedItem"
          color="teal lighten-1"
          class="d-flex flex-row justify-center align-items Bricolage-Regular"
      >
        <v-list-item
            v-for="(item, i) in items"
            :key="i"
            :href="item.link"
            max-width="110"
        >
              <v-list-item-icon>
                <v-icon v-text="item.icon"></v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title v-text="item.text"></v-list-item-title>
              </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
</template>

<script>
import {mapGetters} from "vuex";

export default {
  data () {
    return {
      selectedItem: 0,
      items: [
        { text: 'Inicio', icon: 'mdi-home', link:'/'  },
        { text: 'Transferencias', icon: 'mdi-account-group', link:'/transferencias/'+`${this.$store.getters.user.id}`},
      ],
    }
  },

  computed: {
    ...mapGetters(['user']),
  },
}
</script>