<template>
  <div class=" bg-[#E0E0E0] mx-auto">
    <div class="fixed w-full z-50 ">
      <HomeTopMenu />
      <HomeHeaderCart />
    </div>
    <div class="pt-[200px]">
      <slot />
      <HomeFooter />
    </div>
  </div>
</template>
<script setup lang="ts">
</script>