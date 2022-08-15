<template>
    <div class="text-center homeButton">
        <v-btn rounded color="black" :to="{ name: props?.Link }" type="submit">
            <v-text class="blue">{{props.contents}}</v-text>
        </v-btn>
    </div>
</template>
<script setup lang="ts">
import { RouteRecordName } from "vue-router";

interface Props {
    Link?: RouteRecordName | undefined;
    contents:string
}
const props = defineProps<Props>();
console.log(props.Link);
</script>
