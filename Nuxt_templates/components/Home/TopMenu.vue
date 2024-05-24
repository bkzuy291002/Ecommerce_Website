<!--<template>-->
<!--  <div class="flex justify-center bg-[#007006]">-->
<!--    <div class="max-w-[1200px] w-full">-->
<!--      <div class="flex justify-between h-[70px] items-center">-->
<!--        <div class="flex gap-[30px] text-white">-->
<!--          <NuxtLink to="/admin">Kênh người bán </NuxtLink>-->
<!--          <NuxtLink to="#">Trở thành người bán hàng </NuxtLink>-->
<!--        </div>-->
<!--        <div class="flex gap-[30px] text-white">-->
<!--          <NuxtLink to="#">Thông báo</NuxtLink>-->
<!--          <NuxtLink to="#">Hỗ trợ</NuxtLink>-->
<!--          <NuxtLink to="/login/register">Đăng ký</NuxtLink>-->
<!--          <NuxtLink to="/login">Đăng nhập</NuxtLink>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->

<!--<script setup></script>-->

<!--<script setup lang="ts">-->
<!--import { useSessionStore } from "~/stores/session";-->
<!--import { useStoreStore } from "~/stores/store";-->
<!--import { onMounted } from "vue";-->

<!--const storeStore = useStoreStore();-->
<!--const sessionStore = useSessionStore();-->

<!--const hasToken = () => {-->
<!--  return !!sessionStore.token;-->
<!--};-->

<!--const check = ref(false);-->

<!--if (storeStore.user_id == 1) {-->
<!--  check == true-->
<!--}-->
<!--onMounted(() => {-->
<!--  if (!hasToken()) {-->
<!--  }-->
<!--});-->
<!--</script>-->

<!--<template>-->
<!--  <div v-if="!hasToken()" class="flex justify-center bg-[#ebe7d2]">-->
<!--    <div class="max-w-[1200px] w-full">-->
<!--      <div class="flex justify-between h-[70px] items-center">-->
<!--        <div class="flex gap-[30px] text-white">-->
<!--          <NuxtLink to="/admin">Kênh người bán </NuxtLink>-->
<!--          <NuxtLink to="#">Trở thành người bán hàng </NuxtLink>-->
<!--        </div>-->
<!--        <div class="flex gap-[30px] text-white">-->
<!--          <NuxtLink to="#">Thông báo</NuxtLink>-->
<!--          <NuxtLink to="#">Hỗ trợ</NuxtLink>-->
<!--          <NuxtLink to="/login/register">Đăng ký</NuxtLink>-->
<!--          <NuxtLink to="/login">Đăng nhập</NuxtLink>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->

<!--  <div v-else class="flex justify-center bg-[#ebe7d2]">-->
<!--    <div class="max-w-[1200px] w-full">-->
<!--      <div class="flex justify-between h-[70px] items-center">-->
<!--        <div class="flex gap-[30px] text-white">-->
<!--          <NuxtLink to="/admin">Kênh người bán </NuxtLink>-->
<!--        </div>-->
<!--        <div class="flex gap-[30px] text-white">-->
<!--          <NuxtLink to="#">Thông báo</NuxtLink>-->
<!--          <NuxtLink to="#">Hỗ trợ</NuxtLink>-->
<!--          &lt;!&ndash; <div class="border rounded-[20px]"> &ndash;&gt;-->
<!--          <div v-if="check == false">-->
<!--            <NuxtLink to="/admin">{{ storeStore.name }}</NuxtLink>-->
<!--          </div>-->
<!--          <div v-else>-->
<!--            <NuxtLink to="/">{{ storeStore.name }}</NuxtLink>-->
<!--          </div>-->
<!--          &lt;!&ndash; </div> &ndash;&gt;-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->

<!--<style scoped>-->
<!--/* Đưa các phần CSS import vào đây nếu cần */-->
<!--</style>-->

<template>
  <div v-if="!hasToken" class="flex justify-center bg-[#ebe7d2]">
    <div class="max-w-[1200px] w-full">
      <div class="flex justify-between h-[70px] items-center">
        <div class="flex gap-[30px] text-white">
          <NuxtLink to="/admin">Kênh người bán</NuxtLink>
          <NuxtLink to="#">Trở thành người bán hàng</NuxtLink>
        </div>
        <div class="flex gap-[30px] text-white">
          <NuxtLink to="#">Thông báo</NuxtLink>
          <NuxtLink to="#">Hỗ trợ</NuxtLink>
          <NuxtLink to="/login/register">Đăng ký</NuxtLink>
          <NuxtLink to="/login">Đăng nhập</NuxtLink>
        </div>
      </div>
    </div>
  </div>

  <div v-else class="flex justify-center bg-[#ebe7d2]">
    <div class="max-w-[1200px] w-full">
      <div class="flex justify-between h-[70px] items-center">
        <div class="flex gap-[30px] text-white">
          <NuxtLink to="/admin">Kênh người bán</NuxtLink>
        </div>
        <div class="flex gap-[30px] text-white">
          <NuxtLink to="#">Thông báo</NuxtLink>
          <NuxtLink to="#">Hỗ trợ</NuxtLink>
          <div v-if="!check">
            <NuxtLink to="/admin">{{ storeStore.name }}</NuxtLink>
          </div>
          <div v-else>
            <NuxtLink to="/user">{{ storeStore.name }}</NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import { useSessionStore } from "~/stores/session"
import { useStoreStore } from "~/stores/store"

const storeStore = useStoreStore()
const sessionStore = useSessionStore()

const check = ref(false)

const hasToken = computed(() => {
  return !!sessionStore.token
})

onMounted(() => {
  if (storeStore.user_id === 1) {
    check.value = true
  }
})
</script>

<style scoped>
/* Đưa các phần CSS import vào đây nếu cần */
</style>

