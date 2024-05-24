<template>
  <div class="w-[1440px] bg-[#E0E0E0] mx-auto">
    <div class="max-w-[1200px] w-full mx-auto">
      <div class="pt-[30px] flex text-sm text-[#007006] gap-[5px]">
        <NuxtLink>Shoop / </NuxtLink>
        <NuxtLink>Máy tính & Laptop / </NuxtLink>
        <NuxtLink>Laptop / </NuxtLink>
        <p class="text-black">
          Máy tính xách tay Apple MacBook Air (2020) M1 Chip, 13.3-inch, 8GB, 256GB SSD
        </p>
      </div>
      <div class="mt-[30px] bg-white">
        <div class="flex">
          <div class="w-[500px]">
            <swiper
              :loop="true"
              :thumbs="{ swiper: thumbsSwiper }"
              :modules="[SwiperNavigation, SwiperFreeMode, SwiperThumbs]"
              :initialSlide="2"
              :navigation="{ nextEl: '.next', prevEl: '.prev' }"
              class="mySwiper2"
            >
              <swiper-slide v-for="img in productImage" :key="img">
                <div class="px-[25px] pt-[30px] flex justify-center items-center">
                  <img :src="img.path" width="450" id="main" alt="" />
                </div>
              </swiper-slide>
            </swiper>
            <div class="px-5 mt-[-20px] relative">
              <swiper
                :loop="true"
                @swiper="setThumbsSwiper"
                :slides-per-view="5"
                :modules="[SwiperNavigation, SwiperFreeMode, SwiperThumbs]"
                :navigation="{ nextEl: '.next', prevEl: '.prev' }"
                class="mySwiper"
              >
                <swiper-slide v-for="img in productImage" :key="img">
                  <img :src="img.path" width="92" alt="" />
                </swiper-slide>
                <div class="absolute top-[30%] z-10">
                  <button
                    class="prev rounded-full flex justify-center items-center border bg-white w-10 h-10"
                  >
                    <img src="~assets/images/next 1.png" alt="" width="24" />
                  </button>
                </div>
                <div class="absolute right-0 top-[30%] z-10">
                  <button
                    class="next rounded-full border bg-white w-10 h-10 flex justify-center items-center"
                  >
                    <img src="~assets/images/next 2.png" width="24" alt="" />
                  </button>
                </div>
              </swiper>
            </div>
          </div>
          <div class="mt-2 px-[27.75px] text-sm">
            <p class="mt-[30px] mx-4 text-xl">
              {{productdetail[0].name}}
            </p>
            <div class="mt-[22px] flex justify-between mx-4">
              <div class="flex items-center gap-[30px]">
                <div class="flex items-center">
                  <p>5.0</p>
                  <div class="flex ml-1">
                    <img
                      v-for="i in 5"
                      :key="i"
                      src="~assets/images/star.png"
                      width="12"
                      alt=""
                    />
                  </div>
                </div>
                <p>2,2k <span class="text-[#00000099]">Đánh giá</span></p>
                <p>7,9k <span class="text-[#00000099]">Đã bán</span></p>
              </div>
              <p class="text-[#00000099]">Tố cáo</p>
            </div>
            <!-- <div class="mt-[22px] flex items-center mx-4 gap-[30px]"> -->
            <div class="mt-[22px] flex items-center gap-12 mx-4 bg-gray-100 h-[66px] w-full pl-5">
              <p class="text-[32px] text-[#007006] text-center w-full">
                {{ selectedColor ? '₫' + selectedColor.price_variant : '₫' + priceFormat(productdetail[0].price) }}
              </p>
              <p v-if="checkdiscount(productdetail[0].discount)" class="text-white bg-[#007006] px-[5px]">33% GIẢM</p>
            </div>

            <div class="mt-[22px] flex mx-4">
              <div class="w-[110px] text-[#000000CC]">
                <p>Vận chuyển</p>
              </div>
              <div class="flex-1">
                <p class="text-[#000000CC]">Xử lý đơn hàng bởi Shoop</p>
                <p class="text-[#000000CC] mt-[5px]">Miễn phí vận chuyển</p>
                <div class="flex mt-2.5">
                  <p class="text-[#00000080] mr-5">Vận Chuyển Tới</p>
                  <div class="flex-1">
                    <select name="" id="" class="focus:outline-none">
                      <option value="" selected disabled>Quận/Huyện</option>
                      <option value="Huyện Ba Vì">Huyện Ba Vì</option>
                      <option value="Huyện Ba Vì">Huyện Ba Vì</option>
                      <option value="Huyện Ba Vì">Huyện Ba Vì</option>
                    </select>
                  </div>
                </div>
                <div class="flex mt-2.5">
                  <p class="text-[#00000080] mr-5">Phí Vận Chuyển</p>
                  <div class="flex-1">
                    <select name="" id="" class="focus:outline-none">
                      <option value="" selected disabled>₫0</option>
                      <option value="₫1000">₫1000</option>
                      <option value="₫1000">₫1000</option>
                      <option value="₫1000">₫1000</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-[22px] flex items-center mx-4">
              <p class="text-[#000000CC] w-[110px]">Màu sắc</p>
              <div class="flex  text-sm w-1/5 " v-for="(variant, index) in ProductVariant" :key="variant">
                <div
                    @click="selectColor(variant)"
                    class="flex justify-center ml-[1px] border items-center h-10 px-2.5"
                    :class="{ 'border-[#007006] text-[#007006]': selectedColor === variant }"
                >
                  <img src="~assets/images/image 47.png" alt="" />
                  <p>{{ variant.color }}</p>
                </div>
              </div>
            </div>

            <div class="mt-[22px] mx-4 flex items-center">
              <p class="text-[#000000CC] w-[110px]">Số lượng</p>
              <div class="flex -1">
                <button @click="minus" class="border h-8 w-8">-</button>
                <input
                  type="text"
                  v-model="number"
                  class="border h-8 w-16 ps-[20%] focus:border focus:outline-none"
                />
                <button @click="plus" class="border h-8 w-8">+</button>
              </div>
            </div>
            <div class="mt-[22px] mx-4 flex gap-[30px]">
              <button
                class="h-12 text-center text-[#007006] border border-[#007006] px-[34px]"
                @click = "create()"
              >
                Thêm Vào Giỏ Hàng
              </button>
              <button class="h-12 text-center text-white bg-[#ebe7d2] px-14">
                Mua Ngay
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-[30px] bg-white flex">
        <div class="flex items-center mx-[15px]">
          <img src="~assets/images/avatar.png" width="82" alt="" class="mx-[21px]" />
          <div class="mt-5 pb-[25px]">
            <p class="text-[#000000CC]">Apple Flagship Store</p>
            <p class="text-sm text-[#00000080]">Online 15 Giờ Trước</p>
            <div class="flex gap-[15px] mt-[15px] text-sm">
              <button
                class="text-[#007006] border border-[#007006] w-[100px] text-center h-[34px]"
              >
                Chat Ngay
              </button>
              <button class="text-[#000000CC] border w-[100px] text-center h-[34px]">
                Xem Shop
              </button>
            </div>
          </div>
        </div>
        <div class="flex items-center gap-[50px] mx-[15px] flex-1 text-sm">
          <div class="flex flex-col justify-between h-[55px] w-[167px]">
            <div class="flex justify-between">
              <p>Đánh Giá</p>
              <p class="text-[#007006]">67,6k</p>
            </div>
            <div class="flex justify-between">
              <p>Sản Phẩm</p>
              <p class="text-[#007006]">300</p>
            </div>
          </div>
          <div class="flex flex-col justify-between w-[275px] h-[55px]">
            <div class="flex justify-between">
              <p>Tỉ Lệ Phản Hồi</p>
              <p class="text-[#007006]">100%</p>
            </div>
            <div class="flex justify-between">
              <p>Thời Gian Phản Hồi</p>
              <p class="text-[#007006]">trong vài giờ</p>
            </div>
          </div>
          <div class="flex flex-col justify-between h-[55px] w-[212px] mr-4">
            <div class="flex justify-between">
              <p>Tham Gia</p>
              <p class="text-[#007006]">5 năm trước</p>
            </div>
            <div class="flex justify-between">
              <p>Người Theo Dõi</p>
              <p class="text-[#007006]">588k</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-[30px] bg-white pt-[25px]">
        <div class="mx-[15px] bg-[#00000005]">
          <p class="ml-[15px] text-sl py-[13px]">CHI TIẾT SẢN PHẨM</p>
        </div>
        <div class="mt-[30px] mx-[15px] flex flex-col gap-[15px]">
          <div class="flex text-sm mx-[15px]">
            <p class="text-[#00000080] w-[140px]">Danh Mục</p>
            <p class="text-[#007006]">Shoop / Máy Tính & Laptop / Laptop</p>
          </div>
          <div class="flex text-sm mx-[15px]">
            <p class="text-[#00000080] w-[140px]">Thương hiệu</p>
            <p class="text-[#007006]">Apple</p>
          </div>
          <div class="flex text-sm mx-[15px]">
            <p class="text-[#00000080] w-[140px]">Loại laptop</p>
            <p>Khác</p>
          </div>
          <div class="flex text-sm mx-[15px]">
            <p class="text-[#00000080] w-[140px]">Kho hàng</p>
            <p>180</p>
          </div>
          <div class="flex text-sm mx-[15px]">
            <p class="text-[#00000080] w-[140px]">Gửi từ</p>
            <p>Bắc Ninh</p>
          </div>
        </div>
        <div class="mt-[25px] mx-[15px] bg-[#00000005]">
          <p class="ml-[15px] text-sl py-[13px]">MÔ TẢ SẢN PHẨM</p>
        </div>

          <div v-html="productdetail[0].description" class="preformatted-text ml-[30px] text-sl py-[13px]"></div>

      </div>
      <div class="mt-[30px] bg-white pb-[38px]">
        <p class="pt-[25px] mx-10 text-xl">ĐÁNH GIÁ SẢN PHẨM</p>
        <div class="mt-5 mx-[45px] flex bg-[#0070060D]">
          <div class="mt-[25px] w-[222px] flex justify-center pb-9">
            <div class="text-[#007006] text-[40px] leading-[48px]">
              <div class="">
                <p>5.0 <span class="text-2xl">trên 5</span></p>
              </div>
              <div class="mt-2.5 flex">
                <img
                  v-for="i in 5"
                  :key="i"
                  src="~assets/images/star.png"
                  width="28"
                  alt=""
                />
              </div>
            </div>
          </div>
          <div class="mt-[25px] flex flex-wrap flex-1 pb-9 gap-[15px] text-sm">
            <button class="h-8 w-[100px] border rounded bg-white">Tất Cả</button>
            <button class="h-8 w-[100px] border rounded bg-white">5 Sao (2,1k)</button>
            <button class="h-8 w-[100px] border rounded bg-white">4 Sao (31)</button>
            <button class="h-8 w-[100px] border rounded bg-white">3 Sao (31)s</button>
            <button class="h-8 w-[100px] border rounded bg-white">2 Sao (31)s</button>
            <button class="h-8 w-[100px] border rounded bg-white">1 Sao (31)s</button>
            <button class="h-8 w-[147px] border rounded bg-white">
              Có bình luận (31)
            </button>
            <button class="h-8 w-[200px] border rounded bg-white">
              Có Hình Ảnh / Video (739)
            </button>
          </div>
        </div>
        <div class="pt-5 mx-[45px]">
          
          
            <div class="flex mt-5 pb-[22px] border-b" v-for="i in Comment" :key="i">
              <div class="mr-[15px]">
                <img src="~assets/images/avatar.png" width="40" alt="" />
              </div>
              <div class="">
                <p>{{i.user_name}}</p>
                <div class="mt-[5px] flex">
                  <img
                    v-for="z in i.rating"
                    :key="z"
                    src="~assets/images/star.png"
                    width="14x "
                    alt=""
                  />
                </div>
                <p class="mt-[5px] text-[12px] text-[#00000080] leading-[14.52px]">
                  2022-03-31 20:45 | Phân loại hàng: Space Gray
                </p>
                <p class="mt-2.5 text-[12px] leading-[14.52px] text-[#000000CC]">
                  {{i.content}}
                </p>
                <div class="mt-[15px] flex gap-4">
                  <img
                    v-for="i in 4"
                    :key="i"
                    src="~assets/images/image 52.png"
                    width="72"
                    alt=""
                  />
                </div>
              </div>
            </div>

          <div class="mt-[73px] flex justify-end gap-3">
            <button><</button>
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button>></button>
          </div>
        </div>
      </div>
      <div class="mt-[30px] bg-white">
        <p class="pt-5 mx-5 text-xl">CÁC SẢN PHẨM KHÁC CỦA SHOP</p>
        <div class="mt-3">
          <SliderProduct />
        </div>
      </div>
    </div>
    <div class="bg-white mt-[30px]">
      <div class="max-w-[1200px] mx-auto pb-[92px]">
        <p class="pt-10 ml-5 text-xl font-bold">Có Thể Bạn Đang Tìm Kiếm</p>
        <p class="mt-10 ml-5 mr-9 text-xl">
          bàn phím cơ ajazz ac067 | màn hình máy tính dell ultrasharp u2422h | ổ cứng hdd
          500gb | bàn phím tiếng trung | ổ cứng samsung pm9a1 | micro cài áo không dây |
          thanh lăn mắt | máy tính bảng realme | bảng vẽ điện tử wacom cintiq 16 | máy đo
          thân nhiệt | razer | laptop gaming | lenovo legion 5 | chuột | usb
        </p>
      </div>
    </div>
  </div>

</template>

<script setup>

import { useProductService } from "~/services/product";
import { useCartService } from "~/services/cart";
import { useSessionStore } from "~/stores/session";

const sessionStore = useSessionStore(); // Khởi tạo sessionStore


const route = useRoute();
const  id = route.params.id;




// const sessionStore = useSessionStore();
const productService = useProductService();
const CartService = useCartService()


const selectedColor = ref(null);

const selectColor = (color) => {
  selectedColor.value = color;
};

const productdetail = ref([{
  name: null,
  price: null,
  quantity:null,
}]);


const ProductVariant = ref([{
  color: null,
  price_variant: null,
  description: null,
}]);

const productImage = ref(null);

const Comment = ref(null);

const create = async () => {
  if (!sessionStore.token) {
    navigateTo("/login");
  }

  const formData = new FormData();
  formData.append('product_id', id);
  formData.append('variant', selectedColor.value.color);
  formData.append('quantity', number.value);
  formData.append('sku', selectedColor.value.color);

  try {
    const response = await CartService.addProductbyCart(formData);
    if (response.status) {
      // Hiển thị thông báo thành công
      alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');

    }
  } catch (error) {
    if (error.response && error.response.data && error.response.data.errors === "SKU already exists.") {
      alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');

    } else {
      console.error('Error creating product:', error);
      alert('Sản phẩm đã được thêm vào giỏ hàng thành công.');

    }
  }
}


onBeforeMount(async () => {
  await productService
      .getProductbyid(id)
      .then((res) => {
        productdetail.value = res.data;
        console.log(productdetail.value[0].quantity);
        // console.log(111111);

      })
      .catch((e) => {
        console.log(productdetail.value);
      });

  await productService
      .getImagebyid(productdetail.value[0].id)
      .then((res) => {
        productImage.value = res.data;
      })
      .catch((e) => {
        console.log(productImage.value);
      });

  await productService
      .getProductVariantByid(productdetail.value[0].id)
      .then((res) => {
        console.log(111111)
        ProductVariant.value = res.data;
        // console.log(ProductVariant.value)
      })
      .catch((e) => {
        console.log(ProductVariant.value);
      });

    await productService
      .getComment()
      .then((res) => {
        console.log(111111)
        Comment.value = res.data;
        // console.log(Comment.value)
      })
      .catch((e) => {
        console.log(Comment.value);
      });


});

const buttonCurrent = ref(1);
const current = ref(null);

watch(buttonCurrent, (i) => {
  console.log('Current value of count:', current)
  current.value = i;
})

const checkdiscount = (discount) => {
   if (discount > 0){
      return true
   }
   return false
};

const count = ref(0);
const indexnumber  = ref(0);
const averageRating = (rate ) => {

    const totalRating = rate.reduce((acc, currentValue) => acc + currentValue, 0);

    const average = totalRating / rate.length;
    return average;
};



const number = ref(1);
const thumbsSwiper = ref(null);

const setThumbsSwiper = (swiper) => {
  thumbsSwiper.value = swiper;
};
const minus = () => {
  if (number.value > 1) {
    number.value--;
  } else {
    number.value = 1;
  }
};
const plus = () => {
  // number.value++;
  if (number.value < productdetail.value[0].quantity) {
    number.value++;
  } else {
    number.value = productdetail.value[0].quantity;
  }
};

const priceFormat = (x) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

definePageMeta({
  layout: "default",
});

</script>

<style scope>
body {
  color: #000;
}
.mySwiper .swiper-slide {
  height: 100%;
  opacity: 0.4;
}

.mySwiper .swiper-slide-thumb-active {
  opacity: 1;
}

.preformatted-text {
  white-space: pre-wrap;
}
</style>
