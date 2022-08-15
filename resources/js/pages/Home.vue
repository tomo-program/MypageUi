<template>
    <div>
        <Layout></Layout>
        <Loading v-show="loading"></Loading>
        <v-col cols="12" v-show="!loading">
            <div class="content">
                <Header :title="title" :icon="icon" />
                <v-card class="mt-3" color="black" elevation="6">
                    <v-table>
                        <thead>
                            <tr>
                                <th class="text-left pa-0">
                                    <v-card-title>
                                        <v-icon color="blue lighten-2">
                                            mdi-bell
                                        </v-icon>
                                        <span class="ml-2 headerColor"
                                            >News</span
                                        >
                                    </v-card-title>
                                </th>
                                <th class="text-left pa-0">
                                    <v-card-title>
                                        <v-icon color="blue lighten-2">
                                            mdi-calendar
                                        </v-icon>
                                        <span class="ml-2 headerColor"
                                            >Date</span
                                        >
                                    </v-card-title>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="one in News"
                                :key="one.id"
                                class="fa fa-check"
                            >
                                <td class="font-weight-bold">
                                    <router-link
                                        :to="{
                                            name: 'NewsDetail',
                                            params: {
                                                id: one.id,
                                                news: JSON.stringify(one),
                                            },
                                        }"
                                        >{{ one.title }}
                                    </router-link>
                                </td>
                                <td>
                                    {{ one.created_at }}
                                </td>
                            </tr>
                        </tbody>
                    </v-table>
                </v-card>

                <v-row class="pb-3">
                    <v-col cols="12" md="6">
                        <HomeCard
                            :title="cardProfile.title"
                            :icon="cardProfile.icon"
                            :contents="cardProfile.contents"
                            :Link="cardProfile.link"
                        />
                    </v-col>
                    <v-col cols="12" md="6">
                        <HomeCard
                            :title="cardFee.title"
                            :icon="cardFee.icon"
                            :contents="cardFee.contents"
                            :Link="cardFee.link"
                        />
                    </v-col>
                    <v-col cols="12" md="6">
                        <HomeCard
                            :title="cardData.title"
                            :icon="cardData.icon"
                            :contents="cardData.contents"
                            :Link="cardData.link"
                        />
                    </v-col>
                    <v-col cols="12" md="6">
                        <HomeCard
                            :title="cardInquiry.title"
                            :icon="cardInquiry.icon"
                            :contents="cardInquiry.contents"
                            :Link="cardInquiry.link"
                        />
                    </v-col>
                </v-row>
            </div>
        </v-col>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref, provide } from "vue";
import Loading from "../gloval/Loading.vue";
import Header from "../gloval/Header.vue";
import Layout from "../layout/Layout.vue";
import HomeCard from "../components/molecules/card/HomeCard.vue";
import { axiosGet, axiosPost } from "../plugins/axios";
import "vue-loading-overlay/dist/vue-loading.css";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const router = useRouter();

const title = "Home";
const icon = "mdi-home";

const cardProfile = {
    title: "お客様情報",
    icon: "mdi-account",
    contents: "お客さまの情報を確認することができます。",
    link: "Profile",
};
const cardFee = {
    title: "料金",
    icon: "mdi-cash-check",
    contents: "お客さまの料金を確認することができます。",
    link: "Fee",
};
const cardData = {
    title: "データ使用料",
    icon: "mdi-chart-bar",
    contents: "お客さまのデータ使用料を確認することができます。",
    link: "Data",
};
const cardInquiry = {
    title: "お問い合わせ",
    icon: " mdi-chat-question",
    contents: "お問い合わせをすることができます。",
    link: "Inquiry",
};

const pushLink = (id: string) => {
    console.log(`news/${id}`);
    router.push(`news/${id}`);
    // console.log(`news/${id}`);
};

// provide('plofileLink', 'Plofile')

let loading = ref(false);
const response: any = ref([]);
const News: any = ref([]);
const store = useStore();

onMounted(() => {
    loading.value = true;
    store.commit("checkLoginStatus");

    // store.commit('increment')
    console.log("statuis", store.state.isLogin);
    axiosGet("/api/home").then((result) => {
        response.value = result;
        // 2022-06-01T11:11:11.000000Z -> 2022-06-01
        for (var i = 0; i < response.value.news.length; i++) {
            response.value.news[i].created_at = response.value.news[
                i
            ].created_at
                .trim()
                .substr(0, 10);
        }
        if (response.value.news) {
            News.value = response.value.news;
        }
        setTimeout(() => (loading.value = false), 500);
    });
});
</script>

<style></style>
