<template>
  <div class="w-[1440px] bg-[#E0E0E0] mx-auto">
    <div class="max-w-[1200px] w-full mx-auto">
      <div class="w-full bg-white rounded">
        <p class="text-[35px] mt-2 font-bold ml-3 ">Thanh Toán</p>
      </div>

      <div class="mt-[10px] bg-white rounded py-5">
        <p class="pl-3 text-[20px] text-[#007006]">Địa chỉ nhận hàng</p>
        <div class="max-w-[1200px] w-full grid grid-cols-6 rounded-xl pl-3 mt-2">
          <div class="font-bold text-[16px]">
            <p>{{info_address[0].name}}</p>
            <p>{{info_address[0].phone}}</p>
          </div>
          <div class="col-span-4 text-[16px] text-center">
            <p>{{info_address[0].address}}</p>
          </div>
          <div class="text-center text-blue">
            <button>
              Thay Đổi
            </button>
          </div>
        </div>
      </div>

      <div class="mt-[10px]  flex justify-center ">
        <div class="max-w-[1200px] w-full grid grid-cols-5 h-[40px] bg-white">
          <div class="pl-5 my-auto col-span-2 " >Sản Phẩm</div>
          <div class="text-center my-auto">Đơn Giá</div>
          <div class="text-center my-auto">Số Lượng</div>
          <div class="text-center my-auto">Thành Tiền</div>
        </div>
      </div>

      <hr class="h-1 bg-[#007006]" />

      <div v-for="(product, index) in products" :key="index">
        <hr class="h-1 bg-[#007006]" />
        <div class=" bg-white h-[150px] w-full grid grid-cols-5">
          <div class="col-span-2 flex">
            <div class="my-auto">
            </div>
            <div class="w-1/3">
              <img :src="product.path" alt="" class="w-full h-[150px]">
            </div>
            <div class="ml-5 my-auto">
              <p> {{product.name}} </p>
              <div class="flex text-[14px] text-gray-400">
                <p>Chất liệu :</p>
                <p class="px-1 ">{{sku_idList[index]}}</p>
              </div>

            </div>
          </div>

          <div class="text-center my-auto w-full ml-4">
            <p class="pl-2">₫{{priceFormat(product.price)}}</p>
          </div>

          <div class="flex my-auto w-full justify-center">
            <p>{{quantityList[index]}}</p>
          </div>

          <div class="flex text-center my-auto w-full">
            <p class="w-full text-[#007006]">₫{{priceFormat(quantityList[index]*product.price)}}</p>
          </div>
        </div>
      </div>

      <div class="ml-auto mt-2 pt-2 bg-white  grid grid-cols-2">
        <div class=" flex w-full">
          <p class="ml-3 my-auto">Lời nhắn:</p>
          <div class="ml-5 my-2 w-2/3">
            <FormInput
                inputType="text"
                placeholder="Lưu ý cho Người Bán ...."
                v-model:input="order.note"
            />
          </div>

          <div class="border bg-[#007006] ml-[70px]"></div>
        </div>

        <div class="flex  w-full">
          <p class="ml-3 my-auto">Đơn vị vận chuyển:</p>
          <div class="ml-5 my-2 w-2/3">
            <FormSelect
                :items="deliveries"
                placeholder="Chọn danh mục"
                v-model:input="formData.deliveries_id"/>
          </div>
        </div>
      </div>

      <hr class="h-1 bg-[#007006]" />

      <div class="mb-2 py-3 bg-white w-full flex rounded">
        <p class="ml-auto text-right text-[16px]">Tổng số tiền ({{ products.length }} sản phẩm):</p>
        <p class="text-right mx-5 text-[16px] text-[#007006]">₫{{ priceFormat(totalPrice) }}</p>
      </div>

      <div class="ml-auto mt-2 pt-2 bg-white  grid grid-cols-3">
        <p class="my-auto ml-3">Phương thức thanh toán</p>
        <FormRadioPayment :items="['paypal']" v-model:input="formData.pay" checked />
        <FormRadioPayment :items="['Ship COD']" v-model:input="formData.pay" checked />
      </div>

      <hr class="h-1 bg-[#007006]" />

      <div class="bg-white w-full">
        <div class="grid grid-cols-2 py-3">
          <div></div>
          <div class="w-full ">
            <div class="mx-5 grid grid-cols-4">
              <div class="col-span-2"></div>
              <p class="text-left ">Tổng tiền hàng:</p>
              <p class="text-right ml-3">₫{{ priceFormat(totalPrice) }}</p>
            </div>
            <div class="mx-5 grid grid-cols-4">
              <div class="col-span-2"></div>
              <p class="text-left ">Phí vận chuyển:</p>
              <p class="text-right ml-3">₫{{priceFormat(cost[0].cost)}}</p>
            </div>
            <div class="mx-5 grid grid-cols-4">
              <div class="col-span-2"></div>
              <p class="text-left ">Tổng thanh toán:</p>
              <p class="text-right ml-3 text-[20px] text-[#007006]">₫{{ priceFormat(amount)}}</p>
            </div>
          </div>
        </div>

        <hr class="h-1 bg-[#007006]" />

        <div class=" px-5 py-3 mb-3 flex">
<!--          <button class="border-2 bg-[#007006] text-white text-center py-2 px-15 rounded ml-auto"-->
<!--                  @click="clearLocalStorage"-->
<!--          >-->
<!--            Đặt Hàng-->
<!--          </button>-->
          <div class="w-1/4 ml-auto ">
              <UButton
                @click="pay"
                :loading="pending"
                block
                size="xl"
                icon="i-mdi-credit-card"
                class="bg-[#007006]"
              >
                Pay Now
              </UButton>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">

import { useCheckoutStore } from "~/stores/checkout";
import { useCartService } from "~/services/cart";
import { useDeliveryService } from "~/services/Deliveries";
import { useUserAddressService } from "~/services/user_address";
import { useOrderService } from "~/services/order";
import { useStoreStore } from "~/stores/store";

const OrderService = useOrderService();
const storeStore = useStoreStore();
const AddressService = useUserAddressService();
const DeliveriesService = useDeliveryService();
const CartService = useCartService();
const checkoutStore = useCheckoutStore();

const products = ref([]);
const cost = ref([{
  cost: null,
}]);
const address_idLisst = ref([]);
const product_idList = ref([]);
const sku_idList = ref([]);
const quantityList = ref([]);
const deliveries = ref([]);
const pending = ref(false)

const info_address = ref([{
  name: null,
  address: null,
  phone:null,
}]);

const formData = reactive({
  name: null,
  pay: null,
  deliveries_id: null,
});

const order = ref({
    user_address_id: null,
    // delivery_id: null,
    payment_status: null,
    // transport_fee: null,
    transition_id: null,
    note: null,
    details: [{
      store_id: null,
      sku_id: null,
      quantity: null,
      price: null,
      product_id: null,
    }],
});

onBeforeMount(async () => {
  product_idList.value = checkoutStore.checkedItems.map(item => item.product_id);
  quantityList.value = checkoutStore.checkedItems.map(item => item.quantity);
  sku_idList.value = checkoutStore.checkedItems.map(item => item.sku);
  console.log(sku_idList.value)


  for (const id of product_idList.value) {
    await CartService.getProducCartbyid(id)
        .then((res) => {
          products.value.push(res.data);
          // console.log(products.value)

          order.value.details.push({
            store_id: res.data.store_id,
            sku_id: res.data.store_id,
            quantity: res.data.quantity,
            price: res.data.price,
            product_id: res.data.id,
          });
        })
        .catch((e) => {
          console.log('Error fetching product with id', id);
        });
  }
  // console.log(order.value.details)



  await DeliveriesService
      .getAllDelivery()
      .then((res) => {
        deliveries.value = res.data;
      })
      .catch((e) => {
        console.log(e);
      });

  await AddressService
      .getUserAdressId(storeStore.user_id)
      .then((res) => {
        address_idLisst.value = res.data;
      })
      .catch((e) => {
        console.log(e);
      });

  await AddressService
      .getUserAdress(address_idLisst.value[0].id)
      .then((res) => {
        info_address.value = res.data;
      })
      .catch((e) => {
        console.log(e);
      });
});

const amount = computed(() => {
  let total = totalPrice.value;
  if (cost.value[0]?.cost) {
    total += cost.value[0].cost;
  }
  return total;
});

watch(
    () => formData.deliveries_id,
    async () => {
      const res = await DeliveriesService.getCostById(formData.deliveries_id);
      cost.value = res.data;
    }
);

const priceFormat = (x) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

const totalPrice = computed(() => {
  let total = 0;
  for (let i = 0; i < products.value.length; i++) {
      total += products.value[i].price * quantityList.value[i];
    }
  return total;
});


const pay = async () => {
  pending.value = true

  const totalAmount = amount.value;
  const total = totalPrice.value;

  checkoutStore.clearLocalStorage();


  const formDatas = new FormData();

  formDatas.append('user_address_id', '1');
  if (formData.deliveries_id !== null) {
    formDatas.append('delivery_id', '1');
  }
  formDatas.append('payment_status', '1');
  if (cost.value[0]?.cost !== null) {
    formDatas.append('transport_fee', cost.value[0].cost);
  }
  formDatas.append('transition_id', '1');
  if (order.value.note !== null) {
    formDatas.append('note', order.value.note);
  }
  if (totalAmount !== null) {
    formDatas.append('amount', totalAmount.toString());
  }
  // formDatas.append('amount', totalAmount.toString());

  for (let i = 0; i < order.value.details.length; i++) {
    const detail = order.value.details[i];

    if (detail.product_id !== null && detail.store_id !== null && detail.quantity !== null && detail.price !== null) {
      formDatas.append(`details[${i}][product_id]`, detail.product_id);
      formDatas.append(`details[${i}][sku_id]`,  '1');
      formDatas.append(`details[${i}][store_id]`, detail.store_id );
      formDatas.append(`details[${i}][quantity]`,  detail.quantity);
      formDatas.append(`details[${i}][price]`,  detail.price);
    } else {

      console.log(`Missing detail data at index ${i}`);
    }
  }

  await OrderService.CreateOder(formDatas);

  const response = await $fetch<{ url: string }>('/api/create-order', {
    method: 'POST',
    body: {
      product_name: 'Nuxt Course',
      price: totalAmount,
      payment_method: formData.pay,
    },
  })

  pending.value = false

  if (response.url) {
    window.location.href = response.url
  } else {
    alert('Something went wrong')
  }
}

definePageMeta({
  layout: "cart",
});
</script>

<style scoped>

</style>