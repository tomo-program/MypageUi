<template>
    <div>
        <v-app>
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
                            </v-list>
                        </v-navigation-drawer>
                        <v-main style="height: 800px"></v-main>
                    </v-layout>
                </v-card>
            </v-navigation-drawer>

            <v-main>
                <router-view />
            </v-main>
        </v-app>
    </div>
</template>

<script setup lang="ts">
import Header from "./gloval/Header.vue";
import { ref,watch,} from "vue";


        let drawer = false;
        // const group = null;
        const selectedItem = 0;
        const items  = [
                { text: "Home", icon: "mdi-home", link: "/" },
                { text: "News", icon: "mdi-bell", link: "/news" },
                { text: "Profile",icon: "mdi-account",link: "/profile",},
                { text: "Fee", icon: "mdi-cash-check", link: "/fee" },
                { text: "Data", icon: "mdi-chart-bar", link: "/data" },
                { text: "Inquiry",icon: "mdi-chat-question",link: "/inquiry",},
            ];
            const handleResize = ()=>{
                if (window.innerWidth >= 600) {
                drawer = true
                } else {
                drawer = false
                }
            };

            window.addEventListener('resize', handleResize);
            handleResize();

            // watch(group, () => {
            //     drawer = false;
            // })
</script>
