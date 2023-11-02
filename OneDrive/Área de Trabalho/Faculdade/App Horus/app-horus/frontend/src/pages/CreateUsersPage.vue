<template >
  <q-page class="flex flex-center" padding>
    <q-form class="q-gutter-md" @submit.prevent="submitForm">
      <q-input label="Nome do Usuário" v-model="name"> </q-input>
      <q-input label="Email" v-model="email"> </q-input>
      <q-input label="Senha" v-model="password"> </q-input>
      <q-select
        @click.prevent="getPermissions"
        v-model="permission_name"
        :options="options"
        option-label="name"
        label="Selecione a permissão"
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
  name: "CreateUsersPage",

  data() {
    return {
      name: null,
      email: null,
      password: null,
      options: [],
      permission_name: null,
    };
  },

  mounted() {
    $q = useQuasar;
  },

  methods: {
    submitForm() {
      var data = {
        name: this.name,
        email: this.email,
        password: this.password,
        permission_name: this.permission_name.name,
      };
      console.log(data);
      this.$api.post("user/create", data).then((response) => {
        console.log("response", response);
        //this.$router.push("/home");
        //localStorage.setItem("token", response.data.access_token);
      });
    },
    getPermissions() {
      //var data = { course_id: this.course_id, name: subject_name };
      this.$api.get("permissions").then((response) => {
        console.log("response", response.data[0].name);
        this.options = response.data;
        //this.$router.push("/home");
        //localStorage.setItem("token", response.data.access_token);
      });
    },
  },
};
</script>
      
      <style scoped>
</style>