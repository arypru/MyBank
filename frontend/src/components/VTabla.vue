<template>
  <div>
    <v-data-table
        :page.sync="page"
        disable-sort
        hide-default-footer
        :headers="this.headers"
        :items="Object.values(items)"
        :items-per-page="10"
        class="elevation-4 mytable"
        @page-count="pageCount = $event"
    ></v-data-table>

    <div v-if="pageCount > 0" class="text-center pt-2">
      <v-pagination
          v-model="page"
          :length="pageCount"
          color="teal lighten-1"
      ></v-pagination>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    headers:{
      type: Array,
      required: true
    },
    items: {
      type: Array,
      required: false
    }
  },

  data(){
    return{
      page:1,
      pageCount:0,
      search: ''
    }
  }
}
</script>

<style>
.mytable thead {
  background-color: #26A69A !important;
  font-family: "Bricolage-SemiBold",serif !important;
  color: white;
}

.v-data-table{
  max-width: initial;
  margin-right: 20px;
}

.v-data-table > .v-data-table__wrapper > table > tbody > tr > td {
  font-family: "Bricolage-Regular",serif !important;
  padding: 12px !important;
}

.v-data-table > .v-data-table__wrapper > table > thead > tr > th > span {
  color: white;
}

.v-data-table > .v-data-table__wrapper > table > tbody > tr:hover{
  background-color: #B2DFDB !important;
}

</style>