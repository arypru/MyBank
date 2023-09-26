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
export default {
  data: () => ({
    selectedItem: 0,
    items: [
      { text: 'Inicio', icon: 'mdi-home', link:'/'  },
      { text: 'Transferencias', icon: 'mdi-account-group', link:'/transferencias'},
      { text: 'Productos', icon: 'mdi-card-account-details', link:'/productos'},
    ],
  }),
}
</script>