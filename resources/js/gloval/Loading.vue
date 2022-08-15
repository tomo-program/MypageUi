<template>
  <div class="loading content">
          <v-progress-circular
      :size="70"
      :width="7"
      color="blue lighten-2"
      indeterminate
    ></v-progress-circular>
    
  </div>
</template>

<script>
export default {
  name: 'Loading',
}
</script>

<style scoped>
.v-progress-circular {
  margin: 1rem;
}
</style>