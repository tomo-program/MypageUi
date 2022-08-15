<template>
    <div>
        <Layout></Layout>
        <v-col cols="12">
            <div class="content">
                <Header :title="title" :icon="icon" />
                <v-container>
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

                    <v-card
                        class="mx-auto pb-6"
                        color="black"
                        max-width="344"
                        elevation="7"
                        v-show="MonthPrices.price"
                    >
                        <v-row justify="center">
                            <v-card-header class="text-center">
                                <div>
                                    <div class="text-h4 text-overline mb-1">
                                        {{ form.year }}年{{
                                            form.month
                                        }}月の携帯料金
                                    </div>
                                    <div class="text-h2 mb-4 double_line">
                                        {{ MonthPrices.price }}
                                    </div>
                                </div>
                            </v-card-header>
                             </v-row>

                          
                               <v-row class="d-flex justify-center" >
                                    <v-btn variant="outlined" height="16px" class="pa-2 hover-blue">
                                        詳細を確認する
                                    </v-btn>
                                </v-row>
                       
                       
                    </v-card>
                    <div v-show="MonthPrices.message">
                        {{ MonthPrices.message }}
                    </div>
                </v-container>
                <v-row justify="center" class="mt-3">
                    <button class="btn">ご請求情報の確認・変更</button>
                </v-row>
                <!-- <v-btn class="btn" color="primary">ご請求情報の確認・変更</v-btn> -->
            </div>
        </v-col>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, watch, reactive } from "vue";
import { axiosGet, axiosPost } from "../plugins/axios";
import Header from "../gloval/Header.vue";
import Layout from "../layout/Layout.vue";

const name = "Fee";
const title = "Fee";
const icon = "mdi-cash-check";
const MonthPrices: any = ref([]);
const error: any = ref([]);
const form = reactive({
    year: "",
    month: "",
});

form.year = new Date().getFullYear().toString();
form.month = String(new Date().getMonth()+1);
const responce = axiosPost("/api/price", form).then((result) => {
        MonthPrices.value = result;
});

const years:any = computed(() => {
    const years = [];
    for (let year = 2018; year <= new Date().getFullYear(); year++) {
        years.push(year);
    }
    years.reverse();
    return years;
});
const months:any = computed(() =>[...Array(12)].map((_, i) => i + 1));

watch(form, () => {
    if (!form.month || !form.year) {
        console.log("return");
        return;
    }
    const responce = axiosPost("/api/price", form).then((result) => {
        MonthPrices.value = result;
        console.log(typeof MonthPrices.value);
    });
    return;
});
</script>

<style></style>
