<template>
    <div>
        <!-- <h1>?????</h1> -->
        <!-- <v-card title="Title" subtitle="Subtitle" class="ma-10"></v-card> -->
        <v-defaults-provider>
            <v-card
                color="black"
                elevation=6
                class="mt-12"
            >
                <v-card-title>
                    <v-icon large left color="blue lighten-2" > {{icon}} </v-icon>
                    <span class="text-h6 ml-2 font-weight-light headerColor">{{title}}</span>
                </v-card-title>
            </v-card>
        </v-defaults-provider>
    </div>
</template>

<script setup lang="ts">
import { defineComponent, ref } from "vue";
import { toRefs } from 'vue'

interface Props {
  title: String,
  icon: String,
}
const props = defineProps<Props>();

</script>
