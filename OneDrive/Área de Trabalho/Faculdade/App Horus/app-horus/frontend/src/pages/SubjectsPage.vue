<template >
  <q-page class="flex flex-center" padding>
    <q-form class="q-gutter-md" @submit.prevent="submitForm">
      <q-input label="Nome da Disciplina" v-model="subject_name"> </q-input>
      <q-select
        @click.prevent="getCourses"
        v-model="course_id"
        :options="options"
        option-label="name"
        label="Curso"
      />
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
  name: "SubjectsPage",

  data() {
    return {
      subject_name: null,
      courses: [],
      options: [],
      course_id: null,
    };
  },

  mounted() {
    $q = useQuasar;
  },

  methods: {
    submitForm() {
      var data = { name: this.subject_name, course_id: this.course_id.id };
      console.log(data);
      this.$api.post("subjects", data).then((response) => {
        console.log("response", response);
      });
    },
    getCourses() {
      this.$api.get("courses").then((response) => {
        console.log("response", response.data[0].name);
        this.options = response.data;
      });
    },
  },
};
</script>
    
    <style scoped>
</style>