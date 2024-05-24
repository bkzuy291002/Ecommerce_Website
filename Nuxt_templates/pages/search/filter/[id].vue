<script setup lang="ts">

import { useProductService } from "~/services/product";
import { useCategoryService } from "~/services/category";


const products = ref([]);

const productService = useProductService();
const categoryService = useCategoryService();
const categories = ref(null);
const route = useRoute();
const id = route.params.id;

onBeforeMount(async () => {
  await productService
      .getProductByCategoriesId(id)
      .then((res) => {
        products.value = res.data;
        console.log(products.value);
      })
      .catch((e) => {
        console.log(products.value);
      });

  await categoryService
      .getAll()
      .then((res) => {
        categories.value = res.data;
      })
      .catch((e) => {
        console.log(categories.value);
      });
})

const priceFormat = (x) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

</script>

<template>

  <div v-if="products != null" class="w-[1440px] bg-[#E0E0E0] mx-auto ">
    <div class="mt-[30px] bg-white mx-auto max-w-[1200px]">
      <SliderCategory
          :categories="categories "
      />
    </div>

    <div class="max-w-[1200px] w-full mx-auto bg-white grid grid-cols-4 my-3 ">
      <div class="mx-[15px] border-1 my-2 hovers h-[364px]"  v-for="i in products" :key="i">
        <nuxt-link :to="`/product/${i.id}`">
          <img class="container h-[250px] pt-2" :src="i.path" alt="" />
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
            </div>
          </nuxt-link>
        </div>
      </div>
    </div>
  </div>

  <div v-else class="w-[1440px] bg-[#E0E0E0] mx-auto ">
    <div class="max-w-[1200px] w-full mx-auto bg-white">

      <p>Không có sản phẩm trùng khớp</p>

    </div>
  </div>
</template>

<style scoped>

</style>