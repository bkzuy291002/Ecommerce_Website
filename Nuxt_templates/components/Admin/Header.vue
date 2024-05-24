<!--<template>-->
<!--  <div class="flex justify-between px-[15px] bg-white">-->
<!--    <div class="flex items-center">-->
<!--      <div class="mt-[10px] pb-3">-->
<!--        <NuxtLink to="/">-->
<!--          <img src="~/assets/images/logo_vn.jpg" width="90.97" alt="Logo" />-->
<!--        </NuxtLink>-->
<!--      </div>-->
<!--      <p class="ml-[5px]">Kênh Người Bán</p>-->
<!--    </div>-->
<!--    <div class="flex items-center gap-[25px]">-->
<!--      <div class="flex items-center gap-[5px]">-->
<!--        <img :src="storeStore.image" width="36" alt="" />-->
<!--        <p class="text-sm">Tên chủ cửa hàng</p>-->
<!--      </div>-->
<!--      <div>-->
<!--        <img src="~assets/images/bell 1.png" alt="Notifications" />-->
<!--      </div>-->

<!--      <div class="dropdown">-->
<!--        <button class="btn btn-secondary dropdown-toggle bg-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">-->
<!--          {{ storeStore.name }}-->
<!--        </button>-->
<!--        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">-->
<!--          <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>-->
<!--          <li><a @click="logoutHandler" class="dropdown-item">Đăng xuất</a></li>-->
<!--        </ul>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->

<!--<script setup lang="ts">-->
<!--import { onMounted } from 'vue';-->
<!--import { useSessionStore } from "~/stores/session";-->
<!--import { useStoreStore } from "~/stores/store";-->
<!--import { useRouter } from "vue-router";-->

<!--const storeStore = useStoreStore();-->
<!--const sessionStore = useSessionStore();-->
<!--const router = useRouter();-->

<!--const logoutHandler = async () => {-->
<!--  try {-->
<!--    await sessionStore.logout();-->
<!--    router.push("/login");-->
<!--  } catch (error) {-->
<!--    console.error("Error during logout:", error);-->
<!--  }-->
<!--};-->

<!--// Kiểm tra token khi component được mounted-->
<!--onMounted(() => {-->
<!--  if (!sessionStore.token) {-->
<!--    router.push("/login");-->
<!--  }-->
<!--});-->

<!--</script>-->

<!--<style></style>-->

<template>
  <div class="flex justify-between px-[15px] bg-white">
    <div class="flex items-center">
      <div class="mt-[10px] pb-3">
        <NuxtLink to="/">
          <img src="~/assets/images/logo_vn.jpg" width="90.97" alt="Logo" />
        </NuxtLink>
      </div>
      <p class="ml-[5px]">Kênh Người Bán</p>
    </div>
    <div class="flex items-center gap-[25px]">
      <div class="flex items-center gap-[5px]">
        <img :src="storeStore.image" width="36" alt="" />
<!--        <p class="text-sm">Tên chủ cửa hàng</p>-->
      </div>
      <div>
        <img src="~assets/images/bell 1.png" alt="Notifications" />
      </div>

      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle bg-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{ storeStore.name }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
          <li><a @click="logoutHandler" class="dropdown-item">Đăng xuất</a></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';
import { useSessionStore } from "~/stores/session";
import { useStoreStore } from "~/stores/store";
import { useRouter } from "vue-router";

const storeStore = useStoreStore();
const sessionStore = useSessionStore();
const router = useRouter();

const logoutHandler = async () => {
  try {
    await sessionStore.logout(router);
    clearCookies();
  } catch (error) {
    console.error("Error during logout:", error);
  }
};

const clearCookies = (): void => {
  const cookies: string[] = document.cookie.split("; ");
  for (const cookie of cookies) {
    const [name, _] = cookie.split("=");
    document.cookie = `${name}=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;`;
  }

  router.push("/").then(() => {
    // Sau khi chuyển hướng thành công, reload trang
    window.location.reload();
  });
};


onMounted(() => {
  if (!sessionStore.token) {
    router.push("/login");
  }
});

</script>

<style></style>
