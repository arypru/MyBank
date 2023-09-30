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
            class="Bricolage-Regular text-center"
            link
            v-for="item in items"
            :key="item.titulo"
            @click="handleItemClick(item)"
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
      { titulo: 'Mis Datos', click: 'showPerfil'},
      { titulo: 'Salir', click: 'onLogout' },
    ],
  }),

  computed: mapGetters(['user']),

  methods: {
    ...mapActions({
      salir: 'logout',
    }),

    handleItemClick(item) {
      let user = this.user
      if(item.titulo === 'Mis Datos'){
        this.$router.push('/usuario/'+`${user.id}`)
      }else{
        this.salir();
      }
    },
  },
}
</script>

<style scoped>
.v-menu__content {
  box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
}
</style>