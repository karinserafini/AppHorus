<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated style="background-color: #f99b24">
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title> Minha Horus </q-toolbar-title>

        <span class="material-icons md-48">logout</span>
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" show-if-above bordered>
      <q-list>
        <q-item-label header> Olá, Karin </q-item-label>

        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import EssentialLink from "components/EssentialLink.vue";

const linksList = [
  /*{
    title: "Minhas Notas",
    //caption: "quasar.dev",
    icon: "school",
    link: "https://quasar.dev",
  },*/
  {
    title: "Confirmar presença",
    //caption: "github.com/quasarframework",
    icon: "camera",
    link: "/#/callpage/",
  },
  {
    title: "Disciplinas",
    //caption: "chat.quasar.dev",
    icon: "class",
    link: "/#/subjects/",
  },

  {
    title: "Realizar chamada",
    //caption: "chat.quasar.dev",
    icon: "qr_code_scanner",
    link: "/#/qrcodegenerator/",
  },
  {
    title: "Cursos",
    //caption: "chat.quasar.dev",
    icon: "notes",
    link: "/#/courses/",
  },
  {
    title: "Usuários",
    //caption: "chat.quasar.dev",
    icon: "person",
    link: "/#/users/",
  },
];

export default defineComponent({
  name: "MainLayout",

  components: {
    EssentialLink,
  },

  setup() {
    const leftDrawerOpen = ref(false);

    return {
      essentialLinks: linksList,
      leftDrawerOpen,
      toggleLeftDrawer() {
        leftDrawerOpen.value = !leftDrawerOpen.value;
      },
    };
  },
});
</script>
