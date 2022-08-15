<template>
    <div>
        <Layout></Layout>
         <div class="content">
        <Loading v-show="loading"></Loading>
        <v-col cols="12" v-show="!loading">
            <Header :title="title" :icon="icon" />
            <v-card width="100%"  class=" mt-3">
                <v-card-header>
                    <v-card-header-text>
                        <v-card-title>{{ news.title}}</v-card-title>
                        <v-card-subtitle>{{ news.created_at }}</v-card-subtitle>
                    </v-card-header-text>
                </v-card-header>
                <v-card-text>
                    {{ news.content }}
                </v-card-text>
            </v-card>
            <v-row justify="center" class="mt-3" >
                  <v-btn color="black" to="/news">一覧に戻る</v-btn>
            </v-row>
        </v-col>
         </div>
    </div>
</template>

<script setup lang="ts">
import { useRouter, useRoute, onBeforeRouteLeave } from "vue-router";
import { onMounted, ref, computed } from "vue";
import Loading from "../gloval/Loading.vue";
import Layout from "../layout/Layout.vue";
import Header from "../gloval/Header.vue";
import { axiosGet, axiosPost } from "../plugins/axios";
// import Loading from 'vue-loading-overlay';
import "vue-loading-overlay/dist/vue-loading.css";
const title = "News";
const icon = "mdi-bell";
const route = useRoute();
const news:any = ref({});
const router = useRouter();
const goNews = () => {
    router.push('/news')
}

onMounted(() => {
    try{
        const newsParams:any = route.params.news;
         news.value = JSON.parse(newsParams);
    }
    catch{
        //TODO newsParams= undefined
        // throw Error;
        goNews();
    }
});

// setTimeout(() => {
//     console.log(news);
//     console.log(typeof news);
// }, 2000);

// interface Props {
//     news: [];
//     label?: string;
//     type?: "text" | "password" | "email" | "number";
//     placeholder?: string;
//     disabled?: boolean;
// }
</script>

<style></style>
