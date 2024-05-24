<template>
    <div class="bg-[#F6F6F6] w-full px-[30px] py-[30px]">
      <div class="bg-white w-full h-full pt-5">
        <div class="text-[20px] font-bold leading-[24.2px] ml-5">
          Tất Cả Sản Phẩm
        </div>
        <div class="h-[50px] mt-[30px] px-[15px] flex justify-between">
          <div class="flex gap-5">
            <div class="flex">
              <button
                  @click="search()"
                  class="flex items-center justify-center w-[42.93px] h-full border border-y border-l border-[#0000000D]"
              >
                <img src="~/assets/images/image 56.png" width="20" />
              </button>
              <div class="w-[257.57px]">
                <input
                    type="text"
                    class="border border-[#0000001A] w-full h-full px-[15px] placeholder-[#0000006B] text-[16px] leading-[19.36px] rounded-r focus:outline-none"
                    placeholder="Tên Sản Phẩm"
                    v-model="searchData.keyword"
                />
              </div>
            </div>
            <div class="w-[150px]">
              <FormSelect
                  placeholder="Tình trạng"
                  :items="types"
                  v-model:input="searchData.type"
              />
            </div>
            <div class="w-[150px]">
              <FormSelect
                  placeholder="Trạng thái"
                  :items="publisheds"
                  v-model:input="searchData.published"
              />
            </div>
          </div>
          <NuxtLink to="/product/create">
            <div
                class="bg-[#007006] text-white text-[16px] leading-[19.36px] px-[13px] py-[15px] border border-[#0000001A] rounded"
            >
              Thêm Sản Phẩm
            </div>
          </NuxtLink>
        </div>
        <div class="mt-[30px] px-[15px]">
          <table class="w-full">
            <thead
                class="w-full h-[50px] border-y border-[#00000033] text-[16px] leading-[19.36px] text-center"
            >
            <tr>
              <td class="w-[100px]">ID</td>
              <td class="w-[300px]">Tên Sản Phẩm</td>
              <td class="w-[120px]">Giá Bán</td>
              <td class="w-[150px]">Số Lượng Hiện Có</td>
              <td class="w-[120px]">Tình Trạng</td>
              <td class="w-[120px]">Trạng Thái</td>
              <td class="w-[190px]">Hành Động</td>
            </tr>
            </thead>
            <tbody>
            <tr
                class="h-[50px] border-b border-[#00000033]"
                v-for="(product, index) in displayProducts"
                :key="product"
            >
              <td class="leading-[19.36px] text-center">{{ product.id }}</td>
              <td class="text-[14px] leading-[16.94px] line-clamp-2">
                <div class="w-[250px] mt-[8px] ml-[20px]">
                  {{ product.name }}
                </div>
              </td>
              <td class="text-[14px] leading-[16.94px] pl-5">
                {{ priceFormat(product.price) }}
              </td>
              <td class="leading-[19.36px] pl-5">{{ product.quantity }}</td>
              <td class="leading-[19.36px] pl-5">
                <span v-if="product.type == 1">Bình thường</span>
                <span v-if="product.type == 2">Vi phạm</span>
                <span v-if="product.type == 3">Blocked</span>
              </td>
              <td class="text-center">
                <span v-if="product.published == 3">Nháp</span>
                <span v-else><FormToggle v-model:input="product.state" /></span>
              </td>
              <td>
                <div class="flex gap-2.5 pl-[85px]">
                  <NuxtLink :to="`/product/edit/${product.id}`">
                    <img src="~/assets/images/image 57.png" width="20" />
                  </NuxtLink>
                  <button
                      @click="
                        (isDelete = true),
                          (deleteIndex = index),
                          (deleteId = product.id)
                      "
                  >
                    <img src="~/assets/images/image 58.png" width="20" />
                  </button>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <div
            class="mt-[40px] mb-[88px] flex items-center justify-center gap-[5px]"
        >
          <button
              @click="prevPage"
              class="w-[24px] h-[24px] flex items-center justify-center border border-[#0000001A] rounded text-[14px] text-[#0000001A] leading-[16.94px]"
              :disabled="currentPage === 1"
          >
            <
          </button>
          <button
              v-for="i in totalPages"
              :key="i"
              @click="getCurrentPage(i)"
              class="w-[24px] h-[24px] flex items-center justify-center border border-[#0000001A] rounded text-[14px] leading-[16.94px]"
              :class="
              currentPage === i ? 'text-white bg-[#007006]' : 'text-[#00000066]'
            "
          >
            {{ i }}
          </button>
          <button
              @click="nextPage"
              class="w-[24px] h-[24px] flex items-center justify-center border border-[#0000001A] rounded text-[14px] text-[#0000001A] leading-[16.94px]"
              :disabled="currentPage === totalPages"
          >
            >
          </button>
        </div>
      </div>
    </div>
  <div
      v-if="isDelete"
      class="fixed flex justify-center z-50 top-0 left-0 w-full h-full bg-black bg-opacity-50 overflow-auto"
  >
    <div class="w-[450px] h-[250px] m-auto bg-white rounded-lg pt-[80px]">
      <div class="text-center leading-[19.36px]">
        Bạn có chắc chắn muốn lưu trữ thông tin này không?
      </div>
      <div class="mt-[40px] flex justify-center gap-[25px]">
        <button
            @click="isDelete = false"
            class="px-[26px] py-[10px] border border-[#00000033] rounded text-[#00000080] leading-[19.36px]"
        >
          Không
        </button>
        <button
            @click="deleteProduct(deleteIndex)"
            class="px-[48px] py-[10px] bg-[#D0011B] border border-[#D0011B] rounded text-white leading-[19.36px]"
        >
          Có
        </button>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { useProductService } from "~/services/product";
import { useTrans } from "~/composables/trans";
import { useStoreStore } from "~/stores/store";
import {ref} from "vue";

const storeStore = useStoreStore();
console.log(storeStore.id)

onMounted(async () => {
  const res = await productService.Allproduct(storeStore.id);
  if (res.status) {
    if (!res.data.length) {
      alert(trans("ERR_COM_0002"));
    } else {
      products.value = res.data;
      console.Log(products.value);

    }
  }
});

const types = ref([
  {
    id: 1,
    name: "Bình thường",
  },
  {
    id: 2,
    name: "Vi phạm",
  },
  {
    id: 3,
    name: "Blocked",
  },
]);
const publisheds = ref([
  {
    id: 1,
    name: "Công bố",
  },
  {
    id: 2,
    name: "Dừng bán",
  },
]);

const productService = useProductService();
const { trans } = useTrans();
const products = ref([]);

const searchData = reactive({
  keyword: "",
  type: "",
  published: "",
});

const isDelete = ref(false);
const deleteIndex = ref(null);
const deleteId = ref(null);
const itemsPerPage = ref(5);
const currentPage = ref(1);



const priceFormat = (x: any) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};
const totalProducts = computed(() => {
  return products.value.length;
});
const totalPages = computed(() => {
  return Math.ceil(totalProducts.value / itemsPerPage.value);
});
const displayProducts = computed(() => {
  const startIndex = (currentPage.value - 1) * itemsPerPage.value;
  const endIndex = startIndex + itemsPerPage.value;
  return products.value.slice(startIndex, endIndex);
});
const getCurrentPage = (i: any) => {
  currentPage.value = i;
};
const prevPage = () => {
  if (currentPage.value > 1) {
    currentPage.value--;
  }
};
const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    currentPage.value++;
  }
};
const search = async () => {
  const res = await productService.search(searchData);
  if (res.status) {
    if (!res.data.length) {
      alert(trans("ERR_COM_0002"));
    } else {
      products.value = res.data;
    }
  }
};

const deleteProduct = async (index: any) => {
  const res = await productService.delete(deleteId.value);
  products.value.splice(
      index + (currentPage.value - 1) * itemsPerPage.value,
      1
  );
  isDelete.value = false;
};

definePageMeta({
  layout: "admin",
});
</script>

<style>
.pagination-container {
  display: flex;
  column-gap: 10px;
}
.paginate-buttons {
  height: 40px;
  width: 40px;
  border-radius: 20px;
  cursor: pointer;
  background-color: rgb(242, 242, 242);
  border: 1px solid rgb(217, 217, 217);
  color: black;
}
.paginate-buttons:hover {
  background-color: #d8d8d8;
}
.active-page {
  background-color: #3498db;
  border: 1px solid #3498db;
  color: white;
}
.active-page:hover {
  background-color: #2988c8;
}
</style>

