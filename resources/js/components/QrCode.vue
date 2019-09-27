<template>
  <div>
    <!-- <qrcode value="David De Leon"></qrcode> -->

    <!-- <a href="{`data:image/png;base64, ${this.image}`}" download="QRCode"> -->
    <div id="Div_contain_image">
      <qrcode v-model="userPassword" tag="img"></qrcode>
    </div>

    <!-- <h3>{{ userPassword }}</h3> -->
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