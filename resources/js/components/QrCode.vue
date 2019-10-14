<template>
  <div>
    <div id="Div_contain_image">
      <qrcode v-model="userPassword" tag="img"></qrcode>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import VueQrcode from "@chenfengyuan/vue-qrcode";

Vue.component(VueQrcode.name, VueQrcode);

export default {
  components: { Vue },
  props: ["userPassword"],

  methods: {}
};
</script>