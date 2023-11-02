<template>
  <div class="flex justify-center" style="margin-top: 100px">
    <q-form class="q-gutter-md" @submit.prevent="submitForm">
      <div>
        <q-btn
          color="orange-7"
          class="full-width"
          width="150px"
          label="Salvar"
          type="Gerar Qr Code"
        ></q-btn>
      </div>
    </q-form>
    <qrcode-vue :value="value" :size="size" level="H" />
  </div>
</template>
<script>
import QrcodeVue from "qrcode.vue";
import { defineComponent } from "vue";
import { useQuasar } from "quasar";
import { useRouter } from "vue-router";
const router = useRouter();
export default defineComponent({
  name: "QrCodeGenerator",

  components: {
    QrcodeVue,
  },
  data() {
    return {
      value: "https://example.com",
      size: 300,
    };
  },

  methods: {
    submitForm() {
      //var data = { name: this.name_course };
      this.$api.get("qrcode").then((response) => {
        console.log("response", response.data);
        //this.options = response.data;
      });
    },
  },
});
</script>
<style>
</style>