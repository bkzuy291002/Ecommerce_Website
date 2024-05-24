<template>
  <div class="w-[1440px] bg-[#E0E0E0] mx-auto">
    <div class="max-w-[1200px] w-full mx-auto">
      <div class="w-full bg-white rounded-xl">
        <p class="text-[35px] mt-2 font-bold ml-3 ">Giỏ Hàng</p>
      </div>
      <div class="mt-[10px]  flex justify-center ">
        <div class="max-w-[1200px] w-full grid grid-cols-6 h-[40px] rounded-xl bg-white">
          <div class="my-auto">
            <div
                class="my-auto mx-3 pt-2 w-5 h-5 border border-[#0000001A] rounded hover:cursor-pointer relative"
                :class="allChecked ? 'bg-[#007006]' : ''"
                @click="toggleAllCheck"
            >
              <Icon
                  name="mdi:check"
                  color="#FFFFFF"
                  size="17"
                  class="absolute top-0"
              />
            </div>
          </div>
          <div class="text-left my-auto">Sản Phẩm</div>
          <div class="text-center my-auto">Đơn Giá</div>
          <div class="text-center my-auto">Số Lượng</div>
          <div class="text-center my-auto">Số Tiền</div>
          <div class="text-center my-auto">Thao Tác</div>
        </div>
      </div>

      <div class="mt-[12px] bg-white h-[150px] w-full grid grid-cols-6 mb-[12px] rounded-xl" v-for="(product, index) in products" :key="index">

        <div class="col-span-2 flex">
<!--          <div class="grid grid-cols-3">-->
            <div class="my-auto mx-3">
              <div
                  class="w-5 h-5 border border-[#0000001A] rounded hover:cursor-pointer relative"
                  :class="isChecked[index] ? 'bg-[#007006]' : ''"
                  @click="toggleCheck(index)"
              >
                <Icon
                    name="mdi:check"
                    color="#FFFFFF"
                    size="17"
                    class="absolute top-0"
                />
              </div>
            </div>
            <div class="w-1/3 my-auto">
              <img :src="product.path" alt="" class="w-full">
            </div>
            <div class="ml-5 my-auto">
              <p> {{product.name}} </p>
              <div class="flex text-[14px] text-gray-400">
                <p>Chất liệu :</p>
                <p class="px-1 ">{{cart[index].variant}}</p>
              </div>

<!--              <div class="flex  text-[14px] text-gray-400">-->
<!--                <p>Kích cỡ :</p>-->
<!--                <p class="px-1">M</p>-->
<!--              </div>-->
            </div>
<!--          </div>-->
        </div>

        <div class="flex text-center my-auto w-full ml-4">
<!--          <p class="text-[#00000080] line-through">₫28.990.000</p>-->
          <p class="pl-2">₫{{priceFormat(product.price)}}</p>
        </div>

        <div class="flex my-auto w-full justify-center">
          <button @click="minus(index)" class="border h-8 w-8">-</button>
          <input
              type="text"
              v-model="cart[index].quantity"
              class="border h-8 w-16 ps-[14%] focus:border focus:outline-none"
          />
          <button @click="plus(index)" class="border h-8 w-8">+</button>
        </div>

        <div class="flex text-center my-auto w-full">
          <p class="w-full text-[#007006]">₫{{priceFormat(product.price*cart[index].quantity)}}</p>
        </div>

        <div class="flex justify-center my-auto w-full">
          <img src="/_nuxt/assets/images/image 58.png" alt="">
        </div>
      </div>

      <div class="ml-auto my-2 py-2 bg-white  grid grid-cols-3 rounded-xl">
        <div class=" flex">
          <div
              class="my-auto mx-3 pt-2 w-5 h-5 border border-[#0000001A] rounded hover:cursor-pointer relative"
              :class="allChecked ? 'bg-[#007006]' : ''"
              @click="toggleAllCheck"
          >
            <Icon
                name="mdi:check"
                color="#FFFFFF"
                size="17"
                class="absolute top-0"
            />
          </div>

          <p class="ml-3 my-auto">Chọn Tất Cả</p>
        </div>
        <p class="text-right text-[25px] font-medium">Total :</p>
        <div class="flex mx-5">
          <p class="my-auto text-left ml-3 text-[#007006] text-[20px]">₫ {{ priceFormat(totalPrice) }}</p>
          <button class="border-2 bg-[#ebe7d2] text-white text-center ml-auto py-2 px-5 rounded"
            @click = "saveCheckedItems"
          >
            Mua Hàng
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useStoreStore } from "~/stores/store";
import { useCheckoutStore } from "~/stores/checkout";
import { useSessionStore } from "~/stores/session";
import { useCartService } from "~/services/cart";
import { useProductService } from "~/services/product";
import {ref} from "vue";

const checkoutStore = useCheckoutStore();
const sessionStore = useSessionStore();
const storeStore = useStoreStore();
const idList = ref([]);
const cartList = ref([]);
const skuid = ref([]);
const cart = ref([]);


const CartService = useCartService()


const products = ref([])
const isChecked = ref([]);

const priceFormat = (x) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

onBeforeMount( async () => {
  if (!sessionStore.token) {
    navigateTo("/login");
  }

  try {
    await CartService
        .getCartbyId(storeStore.id)
        .then((res) => {
          cart.value = res.data;
        })
        .catch((e) => {
          console.log(cart.value);
        });


    const response = await CartService.getCartbyId(storeStore.id);
    if (response && response.data) {
      idList.value = response.data.map(item => item.product_id);
      cartList.value = response.data.map(item => item.id);
      skuid.value = response.data.map(item => item.sku);

      // console.log(idList.value)
      // console.log(skuid.value)

      for (const id of idList.value) {
        await CartService.getProducCartbyid(id)
            .then((res) => {
              products.value.push(res.data);
            })
            .catch((e) => {
              console.log('Error fetching product with id', id);
            });
      }
      // console.log(products.value[0].quantity)
      // console.log(products.value)
      isChecked.value = Array(products.value.length).fill(false);

    }
  } catch (error) {
    console.error('Error fetching cart data:', error);
  }
});

const minus = (index: number) => {
  if (cart.value[index].quantity > 1) {
    cart.value[index].quantity--;
  } else {
    cart.value[index].quantity = 1;
  }
};

const plus = (index: number) => {
  cart.value[index].quantity++;
};

const allChecked = ref(false);

const toggleCheck = (index: number) => {
  isChecked.value[index] = !isChecked.value[index];
};

const toggleAllCheck = () => {
  const areAllChecked = isChecked.value.every((check) => check);
  isChecked.value = isChecked.value.map(() => !areAllChecked);
};
watch(isChecked, () => {
  allChecked.value = isChecked.value.every((check) => check);
});


const totalPrice = computed(() => {
  let total = 0;
  for (let i = 0; i < products.value.length; i++) {
    if (isChecked.value[i]) {
      total += products.value[i].price * cart.value[i].quantity;
    }
  }
  return total;
});

const saveCheckedItems = () => {
  const checkedItems = [];

  for (let i = 0; i < products.value.length; i++) {
    if (isChecked.value[i]) {
      const checkedItem = {
        id: cartList.value[i],
        user_id: storeStore.id,
        product_id: products.value[i].id,
        quantity: cart.value[i].quantity,
        sku: cart.value[i].sku,
        total: totalPrice,
      };
      checkedItems.push(checkedItem);
    }
  }

  if (checkedItems.length > 0) {
    checkoutStore.saveCheckedItems(checkedItems);
    navigateTo("/checkout/total");
  } else {
    alert('Vui lòng chọn sản phẩm thanh toán.');
  }
}

definePageMeta({
  layout: "cart",
});
</script>

<style scoped>

</style>