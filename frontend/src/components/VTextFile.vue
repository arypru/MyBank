<template>
  <v-text-field
      outlined
      :prepend-inner-icon="icon"
      color="teal lighten-1"
      :placeholder=placeholderText
      v-model="inputValue"
      @input="emitInput"
  ></v-text-field>
</template>

<script>
export default {
  name: 'TextFile',
  props:{
    value:{
      type: String,
      required:true
    },
    placeholderText: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: true,
    }
  },

  data(){
    return {
      inputValue: this.value || '',
    };
  },

  methods:{
    emitInput() {
      // Can add validation here
      this.$emit('input', this.inputValue);
    },
  }
}
</script>