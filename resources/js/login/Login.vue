<template>
    <div >
         <v-row justify="center" align-content="center" class="pt-16 center">
             <v-card  color="white" width="80%">
            <v-form reactive="form" lazy-validation @submit.prevent="login">
                <v-text-field
                    label="email"
                    required
                    v-model="form.email"
                    type="text"
                    id="input-email"
                ></v-text-field>

                <v-text-field
                    label="password"
                    required
                    v-model="form.password"
                    type="password"
                    autocomplete="new-password"
                    id="input-password"
                ></v-text-field>
                <v-row justify="center" align-content="center" class="pb-8">
                    <v-btn class="btn"  type="submit">
                      <v-icon color="blue lighten-2"> mdi-login </v-icon>
                      <span class=" headerColor ">ログイン</span>
                    </v-btn>
                </v-row>
            </v-form>
        </v-card>

         </v-row>
        
    </div>
</template>

<script setup lang="ts">
import axios, { AxiosInstance } from "axios";
import { axiosGet, axiosPost } from "../plugins/axios";
import { useRouter, useRoute, onBeforeRouteLeave } from "vue-router";
import { ref, computed, watch, reactive } from "vue";
import { useStore } from 'vuex'
const store = useStore();
const router = useRouter();

const form = reactive({
    email: "",
    password: "",
});

const form2 = reactive({
    email: "",
    password: "",
    name: "",
});

function hello() {
    axiosGet("/api/hello");
}
function login() {
    console.log(form);
    axiosPost("/api/user/login", form).then((response) => {
        if(response.result){
            store.commit('login');
        };
    })
    .then(()=>{
        router.push("/")});
}

</script>
