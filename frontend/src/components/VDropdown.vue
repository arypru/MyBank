<template>
  <div class="text-center">
    <v-menu rounded="b-xl" offset-y>
      <template v-slot:activator="{ on, attrs }">
          <v-btn text
              v-ripple="false"
              color="transparent"
              elevation="0"
              file
              v-bind="attrs"
              v-on="on"
          >
            <v-hover v-slot="{ hover }" >
              <span class="black--text text-capitalize Bricolage-Regular" :class="hover ? 'teal--text lighten-1--text' : 'black--text'">
                {{ user.nombre_user }}<v-icon >mdi-menu-down</v-icon>
              </span>
            </v-hover>

          </v-btn>
      </template>

      <v-list>
        <v-list-item
            link
            v-for="item in items"
            :key="item.titulo"
            :href="item.link"
            @click="onLogout"
        >
          <v-hover v-slot="{ hover }" >
            <v-list-item-title :class="hover ? 'teal--text lighten-1--text' : 'black--text'" class="Bricolage-Regular py-3">
             {{ item.titulo}}
            </v-list-item-title>
          </v-hover>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {

  data: () => ({
    items: [
      { titulo: 'Mis Datos' , url:'', click: ''},
      { titulo: 'Salir', url:'/' , click:'onLogout' },
    ],
  }),

  computed: mapGetters(['user']),

  methods: {
    ...mapActions({
      salir: 'logout',
    }),


    onLogout() {
      this.salir();
    },
  },
}
</script>

<style scoped>
.v-menu__content {
  box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
}
</style>