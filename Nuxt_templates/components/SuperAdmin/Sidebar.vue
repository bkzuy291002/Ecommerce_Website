<template>
  <div class="pl-5 bg-white max-w-[250px] w-full border-y">
    <ul>
      <li v-for="(item, index) in items" :key="index">
        <div
            @click="toggleDropdown(index)"
            class="flex h-[46px] items-center hover:cursor-pointer"
        >
          <div class="w-2/12 m-auto">
            <Icon name="material-symbols:account-circle-full"  />
<!--            <img :src="item.img" alt="" />-->
          </div>
          <div class="w-9/12">
            <p class="text-sm leading-[16.94px] font-bold text-[#00000080]">
              {{ item.name }}
            </p>
          </div>
          <div class="w-1/12 flex justify-end items-center mr-4">
            <img
                class="transition duration-75"
                :class="item.currentImage ? 'rotate-180' : ''"
                src="~assets/images/image 36.png"
                alt=""
            />
          </div>
        </div>
        <Transition v-if="item.visible">
          <ul class="ml-10 pb-[6px] text-sm text-[#00000080]">
            <li
                @click="changeColor(li)"
                :class="{ 'text-[#007006]': li.clicked }"
                class="h-[28px] leading-[16.94px]"
                v-for="(li, listindex) in item.list"
                :key="listindex"
            >
              <NuxtLink :to="li.src">{{ li.p }}</NuxtLink>
            </li>
          </ul>
        </Transition>
      </li>
    </ul>
  </div>
</template>

<script setup>
const items = ref([
  {
    img: "/_nuxt/assets/images/image 38.png",
    name: " Quản Lý Người Dùng",
    visible: false,
    list: [
      { src: "/user", p: "Tất cả" },
    ],
    currentImage: true,
  },

]);
const toggleDropdown = (index) => {
  items.value[index].visible = !items.value[index].visible;
  items.value[index].currentImage = !items.value[index].currentImage;
  localStorage.setItem("dropdownState", JSON.stringify(items.value));
};
const changeColor = (li) => {
  items.value.forEach((item) => {
    item.list.forEach((subLi) => {
      subLi.clicked = false;
    });
  });
  li.clicked = true;
  localStorage.setItem("dropdownState", JSON.stringify(items.value));
};
onMounted(() => {
  const savedState = localStorage.getItem("dropdownState");
  if (savedState) {
    items.value = JSON.parse(savedState);
    localStorage.removeItem("dropdownState");
  }
});
</script>

<style></style>
