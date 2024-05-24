<template>
  <div class="bg-[#F6F6F6] w-full py-[30px]">
    <div class="bg-white mx-[30px]">
      <p class="pt-5 mb-4 ml-5 text-xl leading-[24.2px] font-bold">Thêm Sản Phẩm</p>
      <hr class="h-1 bg-[#007006]" />
      <div class="flex flex-col gap-5 mt-[30px] pb-[26px]">
        <div class="flex items-center">
          <p class="text-sm leading-[16.94px] w-[210px] pl-10">
            Danh mục sản phẩm <span class="text-[#FF0000]">(*)</span>
          </p>
          <div class="w-[400px]">
            <FormSelect
              :items="categories"
              placeholder="Chọn danh mục"
              v-model:input="product.danhmuc"/>
          </div>
        </div>
        <div class="flex items-center">
          <p class="text-sm leading-[16.94px] w-[210px] pl-10">
            SKU <span class="text-[#FF0000]">(*)</span>
          </p>
          <div class="w-[400px]">
            <FormInput inputType="text" placeholder="SKU" v-model:input="product.sku" />
          </div>
        </div>
        <div class="flex items-center">
          <p class="text-sm leading-[16.94px] w-[210px] pl-10">
            Tên sản phẩm <span class="text-[#FF0000]">(*)</span>
          </p>
          <div class="w-[800px]">
            <FormInput
              inputType="text"
              placeholder="Tên sản phẩm"
              v-model:input="product.name"
            />
          </div>
        </div>
        <div class="flex items-center">
          <p class="text-sm leading-[16.94px] w-[210px] pl-10">
            Slug <span class="text-[#FF0000]">(*)</span>
          </p>
          <div class="w-[800px]">
            <FormInput inputType="text" placeholder="Slug" v-model:input="product.slug" />
          </div>
        </div>
        <div class="flex items-center">
          <p class="text-sm leading-[16.94px] w-[210px] pl-10">
            Số lượng <span class="text-[#FF0000]">(*)</span>
          </p>
          <div class="w-[800px]">
            <FormInput
              inputType="text"
              placeholder="Số lượng"
              v-model:input="product.quantity"
            />
          </div>
        </div>
        <div class="flex">
          <div class="flex items-start">
            <p class="text-sm leading-[16.94px] w-[210px] pl-10 mt-[16px]">
              Đơn giá <span class="text-[#FF0000]">(*)</span>
            </p>
            <div class="w-[300px]">
              <FormInput
                inputType="text"
                placeholder="Đơn giá"
                v-model:input="product.price"
              />
            </div>
          </div>
          <div class="">
            <div class="flex items-center">
              <p class="text-sm leading-[16.94px] w-[200px] pl-[45px]">Giảm giá</p>
              <div class="w-[300px]">
                <FormInput
                  inputType="text"
                  placeholder="Giảm giá"
                  v-model:input="product.giamgia"
                />
              </div>
            </div>
            <div class="flex items-center">
              <p class="text-sm leading-[16.94px] w-[200px] pl-[45px]"></p>
              <div class="w-[300px]">
                <FormRadio :items="['%', 'đồng']" v-model:input="product.a" checked />
              </div>
            </div>
          </div>
        </div>
        <div class="flex items-center">
          <p class="text-sm leading-[16.94px] w-[210px] pl-10">Tình trạng</p>
          <div class="w-[300px]">
            <FormRadio
              :items="['1', '2']"
              v-model:input="product.published"
              checked
            />
          </div>
        </div>
      </div>
      <div class="pb-4">
        <p class="ml-5 text-xl leading-[24.2px]">Hình Ảnh</p>
        <div
          class="mt-5 ml-[30px] mr-[50px] h-[200px] flex items-center justify-center border border-dashed border-[#00000066] hover:cursor-pointer"
          @click="$refs.image.click()"
        >
          <button
            class="text-xl text-[24.2px] text-[#00000066] h-[50px] w-[180px] border border-[#00000033]"
          >
            Tải ảnh lên
          </button>
        </div>
        <input type="file" class="hidden" ref="image" @change="selectImage" multiple />
        <div class="flex flex-wrap gap-x-[30px] mx-[30px]">
          <div
            class="relative border border-[#00000033] mt-[30px] rounded w-[120px] h-[120px] flex items-center justify-center"
            v-for="(image, index) in product.images"
            :key="image"
          >
            <img :src="image.filePath" alt="" width="120" height="120" />
            <div class="absolute -right-3 -top-3">
              <button
                @click="deleteImage(index)"
                class="border rounded-full bg-gray-300 text-white"
              >
                <svg class="w-5 h-5">
                  <Icon name="mdi:close-circle" size="20" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="pb-[33px]">
        <p class="mt-5 ml-5 text-xl leading-[24.2px]">Thông Tin Mô Tả</p>
        <div class="mt-5 mx-10">
          <div class="border border-[#0000001A] rounded">
            <img
              src="~assets/images/image 59.png"
              class="border rounded"
              height="39"
              width="1050"
              alt=""
            />
            <div class="h-[340px]">
              <textarea
                name=""
                class="h-full w-full ps-3 pe-2 focus:outline-none"
                id=""
                v-model="product.description"
              ></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="pb-[26px]">
        <p class="mt-5 ml-5 text-xl leading-[24.2px]">Thông Tin Chi Tiết</p>
        <div class="flex flex-col gap-5">
          <div class="flex items-center">
            <p class="text-sm leading-[16.94px] w-[210px] pl-10">Thương hiệu</p>
            <div class="w-[800px]">
              <FormInput
                inputType="text"
                placeholder="Thương hiệu"
                v-model:input="product.thuonghieu"
              />
            </div>
          </div>
          <div class="flex items-center">
            <p class="text-sm leading-[16.94px] w-[210px] pl-10">Hạn bảo hành</p>
            <div class="w-[800px]">
              <FormInput
                inputType="text"
                placeholder="Hạn bảo hành"
                v-model:input="product.hanbaohanh"
              />
            </div>
          </div>
          <div class="flex items-center">
            <p class="text-sm leading-[16.94px] w-[210px] pl-10">Loại</p>
            <div class="w-[800px]">
              <FormInput
                inputType="text"
                placeholder="Loại"
                v-model:input="product.loai"
              />
            </div>
          </div>
          <div class="flex items-center">
            <p class="text-sm leading-[16.94px] w-[210px] pl-10">Gửi hàng từ</p>
            <div class="w-[800px]">
              <FormSelect
                :items="['a', 'b', 'c']"
                placeholder="Chọn tỉnh"
                v-model:input="product.tinh"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="pb-[97px]">
        <div class="flex items-center h-[64px]">
          <p class="text-xl leading-[24.2px] w-[210px] pl-5">Biến Thể</p>
          <div>
            <FormClickCheck v-model:input="product.a" />
          </div>
        </div>
        <div class="flex items-center h-[64px]">
          <p class="text-[18px] leading-[21.78px] w-[210px] pl-10">Màu sắc</p>
          <p
            @click="addColor"
            class="text-sm text-[#007006] leading-[16.94px] hover:cursor-pointer"
          >
            + Thêm thông tin
          </p>
        </div>
        <div
          class="mt-5 flex items-center"
          v-for="(color, index) in product.variant"
          :key="index"
        >
          <div class="flex items-center">
            <div class="w-[210px]"></div>
            <p class="w-[100px] text-sm leading-[16.94px]">
              Tên màu <span class="text-[#FF0000]">(*)</span>
            </p>
            <div class="w-[150px]">
              <FormInput
                inputType="text"
                placeholder="Tên màu"
                v-model:input="color.mau"
              />
            </div>
          </div>
          <div class="ml-[70px] flex items-center">
            <p class="w-[100px] text-sm leading-[16.94px]">
              Đơn giá <span class="text-[#FF0000]">(*)</span>
            </p>
            <div class="w-[200px]">
              <FormInput
                inputType="text"
                placeholder="Đơn giá"
                v-model:input="color.gia"
              />
            </div>
          </div>
          <div class="ml-10 hover:cursor-pointer" @click="deleteColor(index)">
            <img src="~assets/images/image 58.png" width="20" alt="" />
          </div>
        </div>
        <div class="mt-[129px] flex items-center justify-center gap-[61px]">
          <button class="h-[50px] w-[200px] border rounded border-[#0000001A]">
            Hủy Bỏ
          </button>
          <button
            class="h-[50px] w-[200px] border rounded border-[#0000001A] bg-[#CCCCCC]"
          >
            Lưu Nháp
          </button>
          <button
            class="h-[50px] w-[200px] border rounded border-[#0000001A] bg-[#007006]"
            @click = "create()"
          >
            Lưu & Công Bố
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useProductService } from "~/services/product";
import { useCategoryService } from "~/services/category";
import { useAuthService } from "~/services/auth";


const categoryService = useCategoryService();
const productService = useProductService();
const authService = useAuthService();

const categories = ref(null);

onMounted(async () => {
  const res = await categoryService.getAll();
  categories.value = res.data;
  console.log(categories.value);
});

const product = ref({
  danhmuc: null,
  sku: null,
  slug:null,
  name: null,
  quantity: null,
  price: null,
  giamgia: null,
  description: null,
  images: [],
  thuonghieu: null,
  hanbaohanh: null,
  loai: null,
  tinh: null,
  variant: [{ mau: null, gia: null }],
  a: null,
  published: null,
});


const addColor = () => {
  product.value.variant.push({ mau: null, gia: null });
  console.log(product.variant);
};

const deleteColor = (index) => {
  if (product.value.variant.length > 1) {
    product.value.variant.splice(index, 1);
  }
};

const selectImage = (event) => {
  const selcetedFiles = event.target;
  if (selcetedFiles.files.length > 0) {
    for (let i = 0; i < selcetedFiles.files.length; i++) {
      const selectedFile = selcetedFiles.files[i];

      const reader = new FileReader();
      reader.onload = () => {
        product.value.images.push({
          file: selectedFile,
          filePath: reader.result,
        });
      };

      reader.readAsDataURL(selectedFile);
    }
  }
};
const deleteImage = (index) => {
  product.value.images.splice(index, 1);
};


const create = async () => {

  const formData = new FormData();

  formData.append('category_id', product.value.danhmuc);
  formData.append('sku', product.value.sku);
  formData.append('slug', product.value.slug);
  formData.append('name', product.value.name);
  formData.append('quantity', product.value.quantity);
  formData.append('price', product.value.price);
  formData.append('giamgia', product.value.giamgia);
  formData.append('description', product.value.description);
  formData.append('thuonghieu', product.value.thuonghieu);
  formData.append('hanbaohanh', product.value.hanbaohanh);
  formData.append('loai', product.value.loai);
  formData.append('tinh', product.value.tinh);
  formData.append('published', product.value.published);


  for (const image of product.value.images) {
    formData.append('images[]', image.file);
  }

  for (let i = 0; i < product.value.variant.length; i++) {
    const color = product.value.variant[i];
    formData.append(`variants[${i}][color]`, color.mau);
    formData.append(`variants[${i}][price_variant]`,  color.gia);
  }

  try {
    const response = await productService.CreateProduct(formData);
    if (response.status) {
      route.push("/product");
    }
    definePageMeta({
      layout: 'admin'
    });
  } catch (error) {
    console.error('Error creating product:', error);
  }


  definePageMeta({
    layout: "admin",
  });
}
</script>

<style></style>


