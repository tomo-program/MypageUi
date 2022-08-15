<template>
    <v-app>
        <router-view />
    </v-app>
</template>

<script setup lang="ts">
import { useRouter, useRoute, onBeforeRouteLeave } from "vue-router";
import { useStore } from 'vuex'
  

const store = useStore();
store.commit("checkLoginStatus")

const router = useRouter()
//ブラウザバックを無効化
addEventListener("popstate", () => {
    router.push("/home")
})
</script>
