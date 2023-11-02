<template >
  <q-page class="flex flex-center" padding>
    <q-form class="q-gutter-md" @submit.prevent="submitForm">
      <q-input label="Nome do curso" v-model="name_course"> </q-input>
      <div>
        <q-btn
          color="orange-7"
          class="full-width"
          width="150px"
          label="Salvar"
          type="submit"
        ></q-btn>
      </div>
    </q-form>
  </q-page>
</template>
  
  <script>
import { useQuasar } from "quasar";
import { useRouter } from "vue-router";

let $q;
const router = useRouter();
export default {
  name: "CoursesPage",

  data() {
    return {
      name_course: null,
    };
  },

  mounted() {
    $q = useQuasar;
  },

  methods: {
    submitForm() {
      var data = { name: this.name_course };
      this.$api.post("courses", data).then((response) => {
        console.log("response", response);
      });
    },
  },
};
</script>
  
  <style scoped>
</style>