<template>
  <div>
    <div class="mt-[30px]">
      <Swiper
        :modules="[SwiperAutoplay, SwiperPagination]"
        :slides-per-view="1"
        :loop="true"
        :pagination="{ clickable: true }"
        :autoplay="{
          delay: 3000,
          disableOnInteraction: true,
        }"
        class="container"
      >
          <SwiperSlide v-for="labels in slides" :key="labels">
            <img :src="labels" alt="" >
          </SwiperSlide>
      </Swiper>
    </div>

    <div class="bg-white">
      <div class="grid grid-cols-3 ml-[50px] pt-[30px]">
        <div class="flex">
          <img src="~assets/images/image 15.png" class="pb-2" />
          <div class="ml-2.5">
            <p class="text-[18px]">7 ngày miễn phí trả hàng</p>
            <p class="text-[12px] text-[#00000099] mt-1">
              Trả hàng miễn phí trong 7 ngày
            </p>
          </div>
        </div>
        <div class="flex">
          <img src="~assets/images/image 16.png" class="pb-2" />
          <div class="ml-2.5">
            <p class="text-[18px]">Hàng chính hãng 100%</p>
            <p class="text-[12px] text-[#00000099] mt-1">
              Đảm bảo hàng chính hãng hoặc hoàn tiền gấp đôi
            </p>
          </div>
        </div>
        <div class="flex">
          <img src="~assets/images/image 17.png" class="pb-2" />
          <div class="ml-2.5">
            <p class="text-[18px]">Miễn phí vận chuyển</p>
            <p class="text-[12px] text-[#00000099] mt-1">Giao hàng miễn phí toàn quốc</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

const props = defineProps({
  autoplayDelay: {
    type: Number,
    default: 3000
  },
  slides: {
    type: Array,
    default: () => [
      '/_nuxt/assets/images/baner.jpg',
      '/_nuxt/assets/images/baner1.jpg',
      '/_nuxt/assets/images/baner4.jpg',
    ]
  },
});
const swiperRef = ref(null);
</script>

<style scope>
.swiper-pagination-bullet {
  height: 15px;
  width: 15px;
  background-color: #d9d9d9;
  border: 2px solid #000000;
  opacity: 1;
}

.swiper-pagination-bullet-active {
  background-color: #007006;
}
</style>
