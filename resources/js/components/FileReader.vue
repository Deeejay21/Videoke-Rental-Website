<template>
  <div>
    <qrcode-capture @decode="onDecode" />

    <!-- <p class="decode-result">Scanned result:</p> -->

    <div for="qr_password" class="decode-result pt-2">Scanned Result:</div>
    <input v-model="result" readonly type="password" name="qr_password" class="form-control col-6" />
  </div>
</template>

<script>
import { QrcodeCapture } from "vue-qrcode-reader";

export default {
  components: { QrcodeCapture },

  data() {
    return {
      result: ""
    };
  },

  methods: {
    onDecode(result) {
      this.result = result;
    }
  }
};
</script>