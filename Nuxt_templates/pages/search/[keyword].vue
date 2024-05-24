<script setup lang="ts">
import { useSearchService } from "~/services/search";
import {ref} from "vue";

const SearchService = useSearchService();
const route = useRoute();
const  keyword = route.params.keyword;
const products = ref([]);

onBeforeMount(async () => {
  const res = await SearchService.searchproduct(keyword);
  products.value = res.data;
  console.log(products.value)
});

const priceFormat = (x) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};


</script>

<template>

  <div v-if="products.length > 0" class="w-[1440px] bg-[#E0E0E0] mx-auto ">
      <div class="max-w-[1200px] w-full mx-auto bg-white grid grid-cols-4 my-3">
        <div class="mx-[15px] border-1 my-2 hovers "  v-for="i in products" :key="i">
          <nuxt-link :to="`/product/${i.id}`">
            <img class="container h-[250px] pt-2" :src="i.image_path" alt="" />
          </nuxt-link>

          <div class="mb-[14px]">
            <nuxt-link :to="`/product/${i.id}`">
              <p class="pl-2.5 pt-2.5 text-sm pr-[90px]">
                {{ i.name }}
              </p>
              <div class="inline-flex w-full">
                <div class="w-full">
                  <div class="div">
                    <p v-if="i.discount !== null" class="pl-2.5 text-[12px] line-through text-[#ACACAC]">{{ priceFormat(i.price) }}</p>
                    <p v-else class="pl-2.5 text-[12px] line-through text-[#ACACAC]"></p>
                  </div>
                  <p v-if="i.discount_type === 1" class="pl-2.5 text-sm text-[#AB1515]"> {{ priceFormat(i.price - i.discount) }}</p>
                  <p v-else-if="i.discount_type === null" class="pl-2.5 text-sm text-[#AB1515]"> {{ priceFormat(i.price) }}</p>
                  <p v-else class="pl-2.5 text-sm text-[#AB1515]"> {{ priceFormat(i.price - (i.discount/100)*i.price) }})</p>
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
      </div>
  </div>

  <div v-else class="w-[1440px] bg-[#E0E0E0] mx-auto my-5">
    <div class="max-w-[1200px] w-full mx-auto bg-white">

      <p>Không có sản phẩm trùng khớp</p>

    </div>
  </div>
</template>

<style scoped>

</style>