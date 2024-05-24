<script setup>
import { defineProps, toRefs } from 'vue';

const props = defineProps(['list', 'products']);
const { products } = toRefs(props);

const priceFormat = (x) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};
</script>


<template>
  <div class="relative">
    <swiper
        :modules="[SwiperNavigation]"
        :slides-per-view="4"
        :navigation="{
        nextEl: '.button-next-product' + list,
        prevEl: '.button-prev-product' + list,
      }"
        class="relavite container"
    >
      <swiper-slide
          @click="$router.params(i.id)"
          v-for="i in products"
          :key="i"
          class="w-1/4 "
      >
        <div class="mx-[15px] border-1 my-2 hovers h-[364px]">
          <nuxt-link :to="`/product/${i.id}`">
            <img class="containers h-[250px] pt-2" :src="i.path" alt="" />
          </nuxt-link>

          <div class="mb-[14px]">
            <nuxt-link :to="`/product/${i.id}`">
              <p class="pl-2.5 pt-2.5 text-sm">
                {{ i.name }}
              </p>
              <div class="inline-flex w-full">
                <div class="w-full">
                  <div class="div">
                    <p v-if="i.discount !== null" class="pl-2.5 text-[12px] line-through text-[#ACACAC]">{{ priceFormat(i.price) }}₫</p>
                    <p v-else class="pl-2.5 text-[12px] line-through text-[#ACACAC]"></p>
                  </div>
                  <p v-if="i.discount_type === 1" class="pl-2.5 text-sm text-[#AB1515]"> {{ priceFormat(i.price - i.discount) }}₫</p>
                  <p v-else-if="i.discount_type === null" class="pl-2.5 text-sm text-[#AB1515]"> {{priceFormat(i.price) }}₫</p>
                  <p v-else class="pl-2.5 text-sm text-[#AB1515]"> {{ priceFormat(i.price - (i.discount/100)*i.price) }}₫</p>
                </div>
<!--                <div class="pr-4">-->
<!--                  <div class="flex justify-center items-center rounded-full h-10 w-10 bg-[#007006]">-->
<!--                    <img class="" src="~assets/images/shopping-cart (2) 1.png" alt="" />-->
<!--                  </div>-->
<!--                </div>-->
              </div>
            </nuxt-link>
          </div>
        </div>
      </swiper-slide>
    </swiper>
    <div
        click
        class="absolute z-10 left-[-12px] bottom-[40%]"
        :class="[{ hidden: list == null }, 'button-prev-product' + list]"
    >
      <button class="border border-[#00000033] rounded-full">
        <img src="~assets/images/next 1.png" />
      </button>
    </div>
    <div
        class="z-10 absolute bottom-[40%] right-[-12px]"
        :class="[{ hidden: list == null }, 'button-next-product' + list]"
    >
      <button class="border border-[#00000033] rounded-full">
        <img src="~assets/images/next 2.png" />
      </button>
    </div>
  </div>
</template>



<style>
.hovers:hover {
  border-color: #ff0000;
  //box-shadow: 0 0 10px #ff0000;
  transform: translateY(-5px);
}

.hovers {
  transition: transform 0.3s ease;
}


</style>
