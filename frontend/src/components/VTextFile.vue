<template>
  <div>
    <v-text-field
        outlined
        :prepend-inner-icon="icon"
        color="teal lighten-1"
        :type="inputType"
        :placeholder=placeholderText
        v-model="inputValue"
        @input="emitInput"
    ></v-text-field>
  </div>
</template>

<script>
export default {
  name: 'TextFile',
  props:{
    inputTypeValue:{
      type: String,
      required: false,
    },
    value:{
      type: String,
      required:false
    },
    placeholderText: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: false,
    },
  },

  data(){
    return {
      inputValue: this.value || '',
      inputType: this.inputTypeValue,
    };
  },

  methods:{
    emitInput() {
      this.$emit('input', this.inputValue);
    },
  }
}
</script>