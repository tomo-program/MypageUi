<template>
    <v-card class="mt-3 card" height="150px">
        <div class="back-color">
            <v-card-title>
                <v-icon color="blue lighten-2"> {{ icon }} </v-icon>
                <span class="ml-2 headerColor"> {{ title }}</span>
            </v-card-title>
        </div>

        <v-card-text> {{ contents }} </v-card-text>
        <BaseButton :Link="props.Link" :contents="buttonContents" />
    </v-card>
</template>

<script setup lang="ts">
import BaseButton from "../../../components/atom/button/BaseButton.vue";

interface Props {
    title: String;
    icon: String;
    contents: String;
    Link: String;
}
const props = defineProps<Props>();
console.log(props.Link);

const buttonContents="詳細を見る"
</script>
