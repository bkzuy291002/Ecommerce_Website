<template>
  <div class="relative flex text-center mt-4">
    <Swiper
      :modules="[SwiperNavigation]"
      :slides-per-view="5"
      :navigation="{
        nextEl: '.button-next',
        prevEl: '.button-prev',
      }"
      class="w-full"
    >
      <SwiperSlide v-for="category in categories" :key="category.id" id="test1">
        <div id="item" class=" h-full pb-2">
          <nuxt-link :to="`/search/filter/${category.id}`">
            <div class="flex justify-center w-full mt-2.5">
              <img :src="category.image" alt="" class="h-[120px] w-[120px] rounded-full "/>
            </div>
            <p class="mx-3 my-3 text-sm ">{{ category.name }}</p>
          </nuxt-link>
        </div>
      </SwiperSlide>
    </Swiper>

    <div class="absolute z-10 left-[-12px] top-[40%] button-prev">
      <button class="border border-[#00000033] rounded-full">
        <img src="~assets/images/next 1.png" />
      </button>
    </div>
    <div class="button-next z-10 absolute top-[40%] right-[-12px]">
      <button class="border border-[#00000033] rounded-full">
        <img src="~assets/images/next 2.png" />
      </button>
    </div>
  </div>
</template>

<script setup>

const props = defineProps(['categories']);

const {categories} = toRefs(props);


const swiperRef = ref(null);
</script>
<style>
.swiper-button-disabled {
  display: none;
}

#test1 {
  width: 200px;
}
</style>
