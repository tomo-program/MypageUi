<template>
    <div>
        <Layout></Layout>
        <div class="content">
        <Loading v-show="loading"></Loading>
        <v-col cols="12" v-show="!loading">
            
                <Header :title="title" :icon="icon" />

                <v-card
                    v-for="one in news"
                    :key="one.id"
                    class="mx-auto mt-3"
                    width="100%"
                    :to="{
                        name: 'NewsDetail',
                        params: { id: one.id, news: JSON.stringify(one) },
                    }"
                >
                    <template v-slot:title>{{ one.title }}</template>
                    <v-card-text>{{ one.created_at }}</v-card-text>
                </v-card>
            
        </v-col>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref, computed } from "vue";
import Loading from "../gloval/Loading.vue";
import Header from "../gloval/Header.vue";
import Layout from "../layout/Layout.vue";
import { axiosGet, axiosPost } from "../plugins/axios";
// import Loading from 'vue-loading-overlay';
import "vue-loading-overlay/dist/vue-loading.css";
const title = "News";
const icon = "mdi-bell";
const news: any = ref([]);
let loading = ref(false);

onMounted(() => {
    loading.value = true;
    axiosGet("/api/news").then((result) => {
        news.value = result;
        for(var i=0; i <news.value.length; i++){
            news.value[i].created_at=news.value[i].created_at.trim().substr(0,10);
        }
        setTimeout(() => {
            loading.value = false;
        }, 400);
    });
});
</script>

<style></style>
