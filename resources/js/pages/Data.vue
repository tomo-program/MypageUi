<template>
    <div>
        <Layout></Layout>
        <v-col cols="12">
            <div class="content">
                <Header :title="title" :icon="icon" />
                <v-container mt-3>
                    <v-row class="mt-4">
                        <v-col cols="6">
                            <v-select
                                label="西暦"
                                :items="years"
                                v-model="form.year"
                                filled
                                dense
                            ></v-select>
                        </v-col>
                        <v-col cols="6">
                            <v-select
                                label="月"
                                :items="months"
                                v-model="form.month"
                                filled
                                dense
                            ></v-select>
                        </v-col>
                    </v-row>

                    <v-row
                        justify="center"
                        align-content="center"
                        v-show="PhoneData.m_data"
                    >
                        <v-col cols="12" md="6" class="d-flex align-center">
                            <!-- <v-row justify="center" align-content="center" height="100%"> -->
                            <!-- <v-container fill-height> -->
                            <v-card
                                class="mx-auto pb-6 pt-4"
                                color="black"
                                width="90%"
                                elevation="7"
                                v-show="PhoneData.m_data"
                            >
                                <v-row class="d-flex justify-center pb-3">
                                    <v-card-header class="text-center">
                                        <div>
                                            <div
                                                class="text-h4 text-overline mb-1"
                                            >
                                                {{ form.year }}年{{
                                                    form.month
                                                }}月のデータ使用料
                                            </div>
                                            <div class="text-h2">
                                                {{ PhoneData.m_data }}GB
                                            </div>
                                        </div>
                                    </v-card-header>
                                </v-row>
                                <v-row class="d-flex justify-center">
                                    <v-btn
                                        variant="outlined"
                                        height="16px"
                                        class="pa-2 hover-blue"
                                    >
                                        詳細を確認する
                                    </v-btn>
                                </v-row>
                            </v-card>
                            <!-- </v-container> -->
                            <!-- </v-row> -->
                        </v-col>
                        <v-col cols="12" md="6">
                            <div class="pie">
                                <div class="sub-text">残り</div>
                                <div class="main-text">
                                    {{ remainingData }}GB
                                </div>
                            </div>
                        </v-col>
                    </v-row>

                    <div v-show="PhoneData.message">
                        {{ PhoneData.message }}
                    </div>
                </v-container>
                <v-row justify="center" class="mt-3 pb-8">
                    <button class="btn">プランの確認・変更</button>
                </v-row>
            </div>
        </v-col>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, watch, reactive } from "vue";
import { axiosGet, axiosPost } from "../plugins/axios";
import Header from "../gloval/Header.vue";
import Layout from "../layout/Layout.vue";
// import BaseButton from "../components/atom/button/BaseButton.vue";

const name = "Data";
const title = "Data";
const icon = "mdi-chart-bar";
const form = reactive({
    year: "",
    month: "",
});
const PhoneData: any = ref([]);
let remainingData = ref();

form.year = new Date().getFullYear().toString();
form.month = String(new Date().getMonth() + 1);
const responce = axiosPost("/api/data", form).then((result) => {
    PhoneData.value = result;

    console.log(typeof PhoneData.value);
    const num = Math.round(
        (PhoneData.value.m_data / PhoneData.value.m_max_data) * 100
    );
    console.log(`${num}%`);
    document.documentElement.style.setProperty("--base-width", `${num}%`);
    remainingData.value =
        Math.round(
            (PhoneData.value.m_max_data - PhoneData.value.m_data) * 100
        ) / 100;
});

const years:any = computed(() => {
    const years = [];
    for (let year = 2018; year <= new Date().getFullYear(); year++) {
        years.push(year);
    }
    years.reverse();
    return years;
});
const months:any = computed(() => [...Array(12)].map((_, i) => i + 1));

document.documentElement.style.setProperty("--base-width", "90%");

watch(form, () => {
    if (!form.month || !form.year) {
        console.log("return");
        return;
    }
    // if(isNaN(parseInt(form.month)) || isNaN(parseInt(form.month))){
    //     console.log(isNaN(parseInt(form.month)));
    //     console.log("数字じゃない")
    // }

    const responce = axiosPost("/api/data", form).then((result) => {
        PhoneData.value = result;

        console.log(typeof PhoneData.value);
        const num = Math.round(
            (PhoneData.value.m_data / PhoneData.value.m_max_data) * 100
        );
        console.log(`${num}%`);
        document.documentElement.style.setProperty("--base-width", `${num}%`);
        remainingData.value =
            Math.round(
                (PhoneData.value.m_max_data - PhoneData.value.m_data) * 100
            ) / 100;
    });
    return;
});
</script>

<style></style>
