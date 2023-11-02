<template >
  <div class="template">
    <div class="row" style="height: 100vh">
      <div class="col-0 col-md-6 flex justify-center content-center">
        <img
          src="../assets/student.jpg"
          style="height: 100vh"
          alt="login-image"
        />
      </div>
      <div
        v-bind:class="{
          'justify-center': $q.screen.md || $q.screen.sm || $q.screen.xs,
        }"
        class="col-12 col-md-6 flex content-center"
      >
        <q-card
          v-bind:style="$q.screen.lt.sm ? { width: '80%' } : { width: '50%' }"
        >
          <q-card-section>
            <q-avatar
              rounded
              size="115px"
              width="115px"
              class="absolute-center shadow-10"
            >
              <img src="../assets/logo-horus.jpeg" alt="avatar" />
            </q-avatar>
          </q-card-section>
          <q-card-section>
            <div class="q-pt-xl">
              <div class="col text-h6 ellipsis flex justify-center">
                <h5 class="text-uppercase q-my-none text-weight-regular">
                  Minha Horus
                </h5>
              </div>
            </div>
          </q-card-section>
          <q-card-section>
            <q-form class="q-gutter-md" @submit.prevent="submitForm">
              <q-input label="Usuário" v-model="login.email"> </q-input>
              <q-input label="Senha" v-model="login.password" type="password">
              </q-input>
              <div>
                <q-btn
                  color="orange-7"
                  class="full-width"
                  width="150px"
                  label="Login"
                  type="submit"
                ></q-btn>
                <div class="text-center q-mt-sm q-gutter-lg">
                  <router-link class="text-black" to="/login"
                    >Esqueceu a senha?</router-link
                  >
                </div>
              </div>
            </q-form>
          </q-card-section>
        </q-card>
      </div>
    </div>
  </div>
</template>

<script>
import { useQuasar } from "quasar";
import { useRouter } from "vue-router";

let $q;
const router = useRouter();
export default {
  name: "LoginPage",

  data() {
    return {
      login: {
        email: null,
        password: null,
      },
    };
  },

  mounted() {
    $q = useQuasar;
  },

  methods: {
    submitForm() {
      var data = { email: this.login.email, password: this.login.password };
      this.$api.post("login", data).then((response) => {
        console.log("response", response);
        this.$router.push("/home");
        //localStorage.setItem("token", response.data.access_token);
      });
    },
  },
};
</script>

<style scoped>
.template {
  background-color: #fff3e0;
}
.wave {
  position: fixed;
  height: 100%;
  left: 0;
  bottom: 0;
  z-index: -1;
}
</style>