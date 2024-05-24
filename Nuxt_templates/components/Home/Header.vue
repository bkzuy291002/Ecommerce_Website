<!--<template>-->
<!--  <div class="flex justify-center bg-white">-->
<!--    <div class="max-w-[1200px] w-full">-->
<!--      <div class="flex justify-between items-center h-[125px]">-->
<!--        <button>-->
<!--          <NuxtLink to="/"-->
<!--            ><img src="~/assets/images/logo.png" width="227.42"-->
<!--          /></NuxtLink>-->
<!--        </button>-->
<!--        <div class="flex w-[700px] border border-[#00000033] rounded mt-2">-->
<!--          <div class="flex-1 max-w-[700px] w-full">-->
<!--            <input type="text" class="focus:outline-none rounded h-[50px] w-full px-3"  v-model="formData.content"/>-->
<!--          </div>-->
<!--          <div class="flex items-center pr-[6px]">-->
<!--            <button class="bg-[#007006] px-7 py-[9px]">-->
<!--              <img src="~/assets/images/search-interface-symbol 1.png" alt="" />-->
<!--            </button>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="mr-[80px]">-->
<!--          <button @click = "search()">-->
<!--            <NuxtLink to="/cart">-->
<!--              <img src="~/assets/images/cart.png" width="42" />-->
<!--            </NuxtLink>-->
<!--          </button>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->

<!--<script setup>-->
<!--import { useSearchService } from "~/services/search";-->
<!--const SearchService = useSearchService();-->
<!--const products = ref([])-->
<!--const formData = reactive({-->
<!--  content: null,-->
<!--});-->

<!--const search =  async () => {-->
<!--  await SearchService-->
<!--      .searchproduct(formData.content)-->
<!--      .then((res) => {-->
<!--        products.value = res.data;-->
<!--      })-->
<!--      .catch((e) => {-->
<!--        console.log(e);-->
<!--      });-->
<!--};-->

<!--</script>-->
<template>
  <div class="flex justify-center bg-white">
    <div class="max-w-[1200px] w-full">
      <div class="flex justify-between items-center h-[100px]">
        <button>
          <NuxtLink to="/">
<!--            <img src="~/assets/images/logo.png" width="227.42" />-->
            <img src="~/assets/images/logo_vn.jpg" width="200" class="h-[100px]" />
          </NuxtLink>
        </button>
        
        <form @submit.prevent="search()">
          <div class="flex w-[700px] border border-[#00000033] rounded mt-2">
            <div class="flex-1 max-w-[700px] w-full">
              <input
                  type="text"
                  class="focus:outline-none rounded h-[50px] w-full px-3"
                  v-model="formData.keyword"
              />
            </div>
            <div class="flex items-center pr-[6px]">
              <button class="bg-[#ebe7d2] px-7 py-[9px]" type="submit">
                <img src="~/assets/images/search-interface-symbol 1.png" alt="Search" />
              </button>
            </div>
          </div>
        </form>
        
        <div class="mr-[80px]">
          <button>
            <NuxtLink to="/cart">
              <img src="~/assets/images/cart.png" width="42" />
            </NuxtLink>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { useSearchService } from "~/services/search";

const SearchService = useSearchService();
const products = ref([]);
const formData = reactive({
  keyword: null,
});

const search = async () => {
  try {
    // const res = await SearchService.searchproduct(formData.keyword);
    // products.value = res.data;
    // console.log(products.value)
    const keyword = formData.keyword
    navigateTo(`/search/${keyword}`);

  } catch (e) {
    console.error('Error fetching products:', e);
  }
};

</script>
