<template>
    <div>
        <Layout></Layout>
        <div class="content">
            <Loading v-show="loading"></Loading>
            <v-col cols="12" v-show="!loading" justify="center">
                <Header :title="title" :icon="icon" />
                <div class="mt-4 ml-2">お客様の情報は下記の通りです。</div>
                <v-card class="mt-4">
                    <v-table class="pa-4">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">ご契約者さまのお名前</td>
                                <td>{{ User.name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">ご契約者さまのメールアドレス</td>
                                <td>{{ User.email }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">ご契約者さまの電話番号</td>
                                <td>{{ User.tel1 }}-{{ User.tel2 }}-{{ User.tel3 }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">ご契約者さまのプラン名</td>
                                <td>{{ User.plan }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">ご契約者さまの会員ランク</td>
                                <td>{{ User.rank }}</td>
                            </tr>
                        </tbody>
                    </v-table>
                </v-card>
            </v-col>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref, computed } from "vue";
import Header from "../gloval/Header.vue";
import Layout from "../layout/Layout.vue";
import Loading from "../gloval/Loading.vue";
import axios, { AxiosInstance } from "axios";
import { axiosGet, axiosPost } from "../plugins/axios";

const name = "Profile";
const title = "Profile";
const icon = "mdi-account";
let loading = ref(false);
const User: any = ref([]);
const desserts = [
    {
        name: "Frozen Yogurt",
        calories: 159,
    },
    {
        name: "Ice cream sandwich",
        calories: 237,
    },
    {
        name: "Eclair",
        calories: 262,
    },
    {
        name: "Cupcake",
        calories: 305,
    },
    {
        name: "Gingerbread",
        calories: 356,
    },
    {
        name: "Jelly bean",
        calories: 375,
    },
    {
        name: "Lollipop",
        calories: 392,
    },
    {
        name: "Honeycomb",
        calories: 408,
    },
    {
        name: "Donut",
        calories: 452,
    },
    {
        name: "KitKat",
        calories: 518,
    },
];

onMounted(() => {
    loading.value = true;
    axiosGet("/api/user").then((result) => {
        User.value = result;
        console.log(result);
        // for(var i=0; i <User.value.length; i++){
        //     User.value[i].created_at=User.value[i].created_at.trim().substr(0,10);
        // }
        console.log(User.value);
        setTimeout(() => {
            loading.value = false;
        }, 400);
    });
});
</script>

<style></style>
