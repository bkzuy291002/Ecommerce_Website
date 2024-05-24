<template>
  <div class="pl-5 bg-white max-w-[250px] w-full border-y">
    <ul>
      <li v-for="(item, index) in items" :key="index">
        <div
          @click="toggleDropdown(index)"
          class="flex h-[46px] items-center hover:cursor-pointer"
        >
          <div class="w-2/12 m-auto">
            <img :src="item.img" alt="" />
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
    img: "/_nuxt/assets/images/image 37.png",
    name: " Vận chuyển",
    visible: false,
    list: [],
    currentImage: true,
  },
  {
    img: "/_nuxt/assets/images/image 38.png",
    name: " Quản Lý Đơn Hàng",
    visible: false,
    list: [
      { src: "/admin", p: "Tất cả" },
      { src: "/list-product", p: "Đơn Hủy" },
      { src: "/list-product", p: "Trả Hàng/Hoàn Tiền" },
    ],
    currentImage: true,
  },
  {
    img: "/_nuxt/assets/images/image 40.png",
    name: " Quản Lý Sản Phẩm",
    visible: false,
    list: [
      { src: "/product", p: "Tất cả sản phẩm" },
      { src: "/product/create", p: "Thêm sản phẩm" },
      { src: "/admin/product/editProduct", p: "Sản phẩm phạm vi" },
      { src: "/list-product", p: "Cài đặt sản phẩm" },
    ],
    currentImage: true,
  },
  {
    img: "/_nuxt/assets/images/image 46.png",
    name: " Kênh Marketing",
    visible: false,
    list: [
      { src: "/list-product", p: "Tất cả" },
      { src: "/list-product", p: "Đơn Hủy" },
      { src: "/list-product", p: "Trả Hàng/Hoàn Tiền" },
    ],
    currentImage: true,
  },
  {
    img: "/_nuxt/assets/images/image 45.png",
    name: " Tài Chính",
    visible: false,
    list: [
      { src: "/list-product", p: "Tất cả" },
      { src: "/list-product", p: "Đơn Hủy" },
      { src: "/list-product", p: "Trả Hàng/Hoàn Tiền" },
    ],
    currentImage: true,
  },
  {
    img: "/_nuxt/assets/images/image 44.png",
    name: " Dữ Liệu",
    visible: false,
    list: [
      { src: "/list-product", p: "Tất cả" },
      { src: "/list-product", p: "Đơn Hủy" },
      { src: "/list-product", p: "Trả Hàng/Hoàn Tiền" },
    ],
    currentImage: true,
  },
  {
    img: "/_nuxt/assets/images/image 43.png",
    name: " Phát Triển",
    visible: false,
    list: [
      { src: "/list-product", p: "Tất cả" },
      { src: "/list-product", p: "Đơn Hủy" },
      { src: "/list-product", p: "Trả Hàng/Hoàn Tiền" },
    ],
    currentImage: true,
  },
  {
    img: "/_nuxt/assets/images/image 42.png",
    name: " Chăm Sóc Khách",
    visible: false,
    list: [
      { src: "/list-product", p: "Tất cả" },
      { src: "/list-product", p: "Đơn Hủy" },
      { src: "/list-product", p: "Trả Hàng/Hoàn Tiền" },
    ],
    currentImage: true,
  },
  {
    img: "/_nuxt/assets/images/image 41.png",
    name: " Quản Lý Shop",
    visible: false,
    list: [
      { src: "/admin/information", p: "Cài đặt thông tin Shop" },
      { src: "/list-product", p: "Cài đặt vận chuyển" },
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
