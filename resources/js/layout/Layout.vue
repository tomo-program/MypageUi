<template>
    <div>
        <v-app-bar color="black" density="compact">
            <template v-slot:prepend>
                <v-app-bar-nav-icon
                    @click.stop="drawer = !drawer"
                    class="d-flex d-sm-none"
                >
                </v-app-bar-nav-icon>
            </template>
            <v-row justify="center">
                <h2>MyPage</h2>
            </v-row>
        </v-app-bar>
        <v-navigation-drawer v-model="drawer" bottom>
            <v-card class="mx-auto" width="256" theme="dark" tile>
                <v-layout>
                    <v-navigation-drawer permanent absolute>
                        <v-list nav dense active-color="blue lighten-2">
                            <v-list-item
                                v-for="(item, i) in items"
                                :to="item.link"
                                :key="i"
                                :value="item"
                                active-color="blue lighten-2"
                                link
                            >
                                <v-list-item-avatar>
                                    <v-icon
                                        color="blue lighten-2"
                                        :icon="item.icon"
                                    ></v-icon>
                                </v-list-item-avatar>

                                <v-list-item-title v-text="item.text">
                                </v-list-item-title>
                            </v-list-item>
                            <div class="d-flex justify-center">
                                <v-btn @click="logout" color="blue lighten-2" width="80%"> Logout </v-btn>
                            </div>
                        </v-list>
                    </v-navigation-drawer>
                    <v-main style="height: 800px"></v-main>
                </v-layout>
            </v-card>
        </v-navigation-drawer>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref,ComponentCustomProperties } from "vue";
import { axiosGet, axiosPost } from "../plugins/axios";
import { useStore } from 'vuex'
import { useRouter, useRoute, onBeforeRouteLeave } from "vue-router";
// import { ComponentCustomProperties } from 'vue'
import { Store } from 'vuex'

export default defineComponent({
    data() {
        return {
            drawer: false,
            group: null,
            selectedItem: 0,
            items: [
                { text: "Home", icon: "mdi-home", link: "/" },
                { text: "News", icon: "mdi-bell", link: "/news" },
                { text: "Profile", icon: "mdi-account", link: "/profile" },
                { text: "Fee", icon: "mdi-cash-check", link: "/fee" },
                { text: "Data", icon: "mdi-chart-bar", link: "/data" },
                {
                    text: "Inquiry",
                    icon: "mdi-chat-question",
                    link: "/inquiry",
                },
                // { text: "Logout",icon: "mdi-chat-question",link: "/logout",},
            ],
        };
    },

    methods: {
        handleResize: function (): void {
            if (window.innerWidth >= 600) {
                this.drawer = true;
            } else {
                this.drawer = false;
            }
        },
        logout(){
            axiosPost("/api/user/logout").then((response) => {  
                if(response.result){
                    const store = useStore();

                    console.log(response,store);
                    this.$store.commit('logout');
                };
            })
            .then(()=>{
                const router = useRouter();
                console.log(this);

                 this.$router.push("/user/login")
            });
        }
    },
    created() {
        window.addEventListener("resize", this.handleResize);
        this.handleResize();
    },
    destroyed() {
        window.removeEventListener("resize", this.handleResize);
    },

    watch: {
        group() {
            this.drawer = false;
        },
    },
});
</script>
