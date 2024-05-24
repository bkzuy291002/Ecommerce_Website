<template>
    <div class="w-full bg-[#F6F6F6] p-[30px]">
      <div class="bg-white pt-5">
        <div class="text-[20px] font-bold leading-[24.2px] ml-5">
          Chỉnh Sửa Sản Phẩm
        </div>
        <div class="mt-[16px] h-[4px] bg-[#007006]" />
        <div class="mt-[26px]">
          <div class="ml-5 text-[20px] leading-[24.2px]">Thông Tin Cơ Bản</div>
          <div class="mt-[30px] flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Danh mục sản phẩm <span class="text-[#FF0000]">(*)</span>
            </div>
            <div class="w-[400px]">
              <FormSelect
                  :placeholder="$t('PLACEHOLDER.category')"
                  :items="categories"
                  :error="
                  error && error.type == $t('ATTRIBUTE.product.category_id')
                    ? error.message
                    : ''
                "
                  v-model:input="product.category_id"
              />
            </div>
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              SKU <span class="text-[#FF0000]">(*)</span>
            </div>
            <div class="w-[400px]">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.sku')"
                  inputType="text"
                  :error="
                  error && error.type == $t('ATTRIBUTE.product.sku')
                    ? error.message
                    : ''
                "
                  v-model:input="product.sku"
              />
            </div>
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Tên sản phẩm <span class="text-[#FF0000]">(*)</span>
            </div>
            <div class="w-[800px]">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.productName')"
                  inputType="text"
                  :error="
                  error && error.type == $t('ATTRIBUTE.product.name')
                    ? error.message
                    : ''
                "
                  v-model:input="product.name"
              />
            </div>
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Slug <span class="text-[#FF0000]">(*)</span>
            </div>
            <div class="w-[800px]">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.slug')"
                  inputType="text"
                  :error="
                  error && error.type == $t('ATTRIBUTE.product.slug')
                    ? error.message
                    : ''
                "
                  v-model:input="product.slug"
              />
            </div>
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Số lượng <span class="text-[#FF0000]">(*)</span>
            </div>
            <div class="w-[400px]">
              <FormInput
                  placeholder="Số lượng"
                  inputType="text"
                  :error="
                  error && error.type == $t('ATTRIBUTE.product.quantity')
                    ? error.message
                    : ''
                "
                  v-model:input="product.quantity"
              />
            </div>
          </div>
          <div class="mt-5 flex">
            <div class="w-full flex">
              <div
                  class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
              >
                Giá bán <span class="text-[#FF0000]">(*)</span>
              </div>
              <div class="w-[300px]">
                <FormInput
                    :placeholder="$t('PLACEHOLDER.price')"
                    inputType="text"
                    :error="
                    error && error.type == $t('ATTRIBUTE.product.price')
                      ? error.message
                      : ''
                  "
                    v-model:input="product.price"
                />
              </div>
            </div>
            <div class="w-full flex">
              <div class="w-[145px] pt-[17px] text-[14px] leading-[16.94px]">
                Giảm giá
              </div>
              <div>
                <div class="w-[300px]">
                  <FormInput
                      :placeholder="$t('PLACEHOLDER.discount')"
                      inputType="text"
                      :error="
                      error && error.type == $t('ATTRIBUTE.product.discount')
                        ? error.message
                        : ''
                    "
                      v-model:input="product.discount"
                  />
                </div>
                <div class="w-[300px]">
                  <FormRadio
                      :items="['%', 'đồng']"
                      v-model:input="product.discount_type"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Tình trạng
            </div>
            <div class="w-[800px]">
              <FormRadio
                  :items="['1', '2']"
                  v-model:input="product.published"
              />
            </div>
          </div>
          <div class="ml-5 mt-[26px] text-[20px] leading-[24.2px]">
            Hình Ảnh
          </div>
          <div class="mt-5 pb-[16px]">
            <label for="image">
              <div
                  class="h-[200px] flex items-center justify-center ml-[30px] mr-[50px] border border-[#00000066] border-dotted hover:cursor-pointer"
              >
                <div
                    class="px-[39px] py-[13px] border border-[#00000033] text-[20px] text-[#00000033] leading-[24.2px]"
                >
                  Tải ảnh lên
                </div>
              </div>
              <input
                  type="file"
                  hidden
                  multiple
                  id="image"
                  @change="uploadImage"
              />
            </label>
            <div class="mt-[30px] px-[30px] flex flex-wrap gap-[30px]">
              <div class="relative" v-for="(image, i) in images" :key="image">
                <img
                    :src="image.path"
                    width="120"
                    class="rounded border border-[#00000033]"
                />
                <div
                    class="absolute -top-3 -right-3 hover:cursor-pointer"
                    @click="deleteImage(i)"
                >
                  <Icon
                      name="material-symbols-light:close-rounded"
                      size="25"
                      class="bg-gray-400 rounded-full"
                  />
                </div>
              </div>
              <div class="relative" v-for="(image, i) in newImages" :key="i">
                <img
                    :src="image.path"
                    width="120"
                    class="rounded border border-[#00000033]"
                />
                <div
                    class="absolute -top-3 -right-3 hover:cursor-pointer"
                    @click="deleteNewImage(i)"
                >
                  <Icon
                      name="material-symbols-light:close-rounded"
                      size="25"
                      class="bg-gray-400 rounded-full"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="mt-5 pb-[33px]">
            <div class="ml-5 text-[20px] leading-[24.2px]">Thông Tin Mô Tả</div>
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
          <div class="mt-5 ml-5 text-[20px] leading-[24.2px]">
            Thông Tin Chi Tiết
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Thương hiệu
            </div>
            <div class="w-[800px]">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.brand')"
                  inputType="text"
                  v-model:input="product.brand"
              />
            </div>
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Hạn bảo hành
            </div>
            <div class="w-[800px]">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.warranty')"
                  inputType="text"
                  v-model:input="product.warranty"
              />
            </div>
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Loại
            </div>
            <div class="w-[800px]">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.type')"
                  inputType="text"
                  v-model:input="product.warranty_type"
              />
            </div>
          </div>
          <div class="mt-5 flex">
            <div
                class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
            >
              Gửi hàng từ
            </div>
            <div class="w-[800px]">
              <FormSelect
                  :placeholder="$t('PLACEHOLDER.from')"
                  :items="cities"
                  v-model:input="product.city_id"
              />
            </div>
          </div>


          <div class="flex items-center h-[64px]">
            <p class="text-xl leading-[24.2px] w-[210px] pl-5">Biến Thể</p>
            <div>
<!--              <FormClickCheck v-model:input="product.variants" />-->
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
              v-for="(color, index) in product.variants"
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
                    v-model:input="color.color"
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
                    v-model:input="color.price_variant"
                />
              </div>
            </div>
            <div class="ml-10 hover:cursor-pointer" @click="deleteColor(index)">
              <img src="~assets/images/image 58.png" width="20" alt="" />
            </div>
          </div>


          <div class="mt-[54px] pb-[32px] flex gap-[61px]">
            <button
                class="ml-[204px] px-[73px] py-[16px] border border-[#0000001A] rounded text-[#000000CC] leading-[19.36px]"
            >
              Hủy Bỏ
            </button>
            <button
                @click="updateDraft()"
                class="px-[63px] py-[16px] border border-[#0000001A] rounded bg-[#CCCCCC] text-[#000000B2] leading-[19.36px]"
            >
              Lưu Nháp
            </button>
            <button
                @click="updatePublish()"
                class="px-[43px] py-[16px] border border-[#0000001A] rounded bg-[#007006] text-white leading-[19.36px]"
            >
              Lưu & Công Bố
            </button>
          </div>
        </div>
      </div>
    </div>
</template>
<script setup lang="ts">
import { useProductService } from "~/services/product";
import { useCategoryService } from "~/services/category";
import { useCityService } from "~/services/city";

const route = useRoute();
const categoryService = useCategoryService();
const cityService = useCityService();
const productService = useProductService();
const { required, notEmpty, isNumber } = useValidate();
const { trans } = useTrans();
const isCheck = ref(false);
const categories = ref(null);
const cities = ref(null);
const images = ref([]);
const currentImages = ref(null);
const files = ref([]);
const newImages = ref([]);
const currentVariants = ref([]);
const deleteVariants = ref([]);
const error = ref(null);
const product = reactive({
  id: null,
  category_id: null,
  sku: null,
  name: null,
  slug: null,
  quantity: null,
  price: null,
  discount: null,
  discount_type: null,
  published: null,
  description: null,
  brand: null,
  warranty: null,
  warranty_type: null,
  city_id: null,
  variants: [{ color: null, price_variant: null }],
  published:null,
  a:null,
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

onMounted(async () => {
  definePageMeta({
    layout: "admin",
  });

  const res = await productService.getProductEdit(route.params.id);
  console.log(res.data);
  product.id = res.data.id;
  product.category_id = res.data.category_id;
  product.sku = res.data.sku;
  product.name = res.data.name;
  product.slug = res.data.slug;
  product.quantity = res.data.quantity;
  product.price = res.data.price;
  product.discount = res.data.discount;
  product.description = res.data.description;
  product.brand = res.data.brand;
  product.warranty = res.data.warranty;
  product.warranty_type = res.data.warranty_type;
  product.city_id = res.data.city_id;
  product.variants = res.data.variants;
  product.published = res.data.published;

  console.log(product.published)

  if (res.data.deleteVariants) {
    deleteVariants.value = res.data.deleteVariants;
  }
  if (res.data.variants.length) {
    isCheck.value = true;
  }
  if (res.data.discount_type == 1) {
    product.discount_type = "%";
  } else {
    product.discount_type = "đồng";
  }
  if (res.data.published === 1) {
    product.published = "Đang bán";
  } else if (res.data.published === 2) {
    product.published = "Dừng bán";
  } else {
    product.published = res.data.published;
  }
  images.value = res.data.images;
  console.log(images.value);
  await categoryService.getAll().then((res) => {
    categories.value = res.data;
  });
  await cityService.getAll().then((res) => {
    cities.value = res.data;
  });
  await productService.getImages(route.params.id).then((res) => {
    currentImages.value = res.data;
  });
  await productService.getVariants(route.params.id).then((res) => {
    currentVariants.value = res.data;
  });
});


const uploadImage = (e: any) => {
  const selectedFiles = e.target;
  if (selectedFiles.files.length > 0) {
    for (let i = 0; i < selectedFiles.files.length; i++) {
      files.value.push(selectedFiles.files[i]);
      const selectedFile = selectedFiles.files[i];
      const reader = new FileReader();
      reader.onload = () => {
        newImages.value.push({
          path: reader.result,
        });
      };
      reader.readAsDataURL(selectedFile);
    }
  }
};
const deleteImage = (index: any) => {
  images.value.splice(index, 1);
};
const deleteNewImage = (index: any) => {
  newImages.value.splice(index, 1);
  files.value.splice(index, 1);
};
const addVariant = () => {
  product.variants.push({ color: null, price: null });
};
const deleteVariant = (index: any) => {
  if (product.variants[index].id) {
    deleteVariants.value.push(product.variants[index]);
  }
  product.variants.splice(index, 1);
};
const validated = () => {
  error.value = null;
  if (!required(product.category_id)) {
    error.value = {
      type: trans("ATTRIBUTE.product.category_id"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.category_id")]),
    };
  } else if (!required(product.sku?.trim()) || !notEmpty(product.sku)) {
    error.value = {
      type: trans("ATTRIBUTE.product.sku"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.sku")]),
    };
  } else if (!required(product.name?.trim()) || !notEmpty(product.name)) {
    error.value = {
      type: trans("ATTRIBUTE.product.name"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.name")]),
    };
  } else if (!required(product.slug?.trim()) || !notEmpty(product.slug)) {
    error.value = {
      type: trans("ATTRIBUTE.product.slug"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.slug")]),
    };
  } else if (!required(product.quantity)) {
    error.value = {
      type: trans("ATTRIBUTE.product.quantity"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.quantity")]),
    };
  } else if (!isNumber(product.quantity)) {
    error.value = {
      type: trans("ATTRIBUTE.product.quantity"),
      message: trans("ERR_COM_00028"),
    };
  } else if (!required(product.price)) {
    error.value = {
      type: trans("ATTRIBUTE.product.price"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.price")]),
    };
  } else if (!isNumber(product.price)) {
    error.value = {
      type: trans("ATTRIBUTE.product.price"),
      message: trans("ERR_COM_00028"),
    };
  } else if (!isNumber(product.discount) && product.discount) {
    error.value = {
      type: trans("ATTRIBUTE.product.discount"),
      message: trans("ERR_COM_00028"),
    };
  } else if (isCheck.value) {
    for (let i = 0; i < product.variants.length; i++) {
      const obj = product.variants[i];
      if (!required(obj.color?.trim()) || !notEmpty(obj.color)) {
        error.value = {
          type: trans("ATTRIBUTE.variant.colorName") + i,
          message: trans("ERR_VAL_0001", [
            trans("ATTRIBUTE.variant.colorName"),
          ]),
        };
      } else if (obj.price && !isNumber(obj.price)) {
        error.value = {
          type: trans("ATTRIBUTE.variant.priceColor") + i,
          message: trans("ERR_COM_00028"),
        };
      }
    }
  }
  if (error.value) {
    return false;
  }
  return true;
};
const execute = () => {
  if (!validated()) {
    return;
  }
  let formData = new FormData();
  formData.append("category_id", product.category_id);
  formData.append("sku", product.sku);
  formData.append("name", product.name);
  formData.append("slug", product.slug);
  formData.append("quantity", product.quantity);
  formData.append("price", product.price);
  formData.append("description", product.description);
  formData.append("brand", product.brand);
  formData.append("warranty", product.warranty);
  formData.append("warranty_type", product.warranty_type);
  formData.append("city_id", product.city_id);
  formData.append("_method", "PUT");
  if (product.discount) {
    formData.append("discount", product.discount);
  }
  if (product.discount_type === "%") {
    formData.append("discount_type", "1");
  } else {
    formData.append("discount_type", "2");
  }
  if (product.published == "Đang bán") {
    formData.append("published", "1");
  } else if (product.published == "Dừng bán") {
    formData.append("published", "2");
  } else {
    formData.append("published", "3");
  }
  for (let i = 0; i < currentImages.value.length; i++) {
    const image = currentImages.value[i];
    formData.append("currentImages[" + i + "][id]", image.id);
    formData.append("currentImages[" + i + "][path]", image.path);
  }
  if (images.value.length) {
    for (let i = 0; i < images.value.length; i++) {
      const image = images.value[i];
      formData.append("images[" + i + "][id]", image.id);
      formData.append("images[" + i + "][path]", image.path);
    }
  } else {
    formData.append("images[]", "");
  }
  if (files.value.length) {
    for (let i = 0; i < files.value.length; i++) {
      const file = files.value[i];
      formData.append("photos[]", file);
    }
  }
  if (isCheck.value) {
    for (let i = 0; i < product.variants.length; i++) {
      const variant = product.variants[i];
      if (variant.id) {
        formData.append("variants[" + i + "][id]", variant.id);
      } else {
        formData.append("variants[" + i + "][id]", "");
      }
      formData.append("variants[" + i + "][product_id]", route.params.id);
      formData.append("variants[" + i + "][color]", variant.color);
      formData.append("variants[" + i + "][price]", variant.price);
    }
    if (deleteVariants.value.length) {
      for (let i = 0; i < deleteVariants.value.length; i++) {
        const variant = deleteVariants.value[i];
        formData.append("deleteVariants[" + i + "][id]", variant.id);
        formData.append(
            "deleteVariants[" + i + "][product_id]",
            variant.product_id
        );
        formData.append("deleteVariants[" + i + "][color]", variant.color);
        formData.append("deleteVariants[" + i + "][price]", variant.price);
      }
    }
  } else {
    deleteVariants.value = currentVariants.value;
    for (let i = 0; i < deleteVariants.value.length; i++) {
      const variant = deleteVariants.value[i];
      formData.append("deleteVariants[" + i + "][id]", variant.id);
      formData.append(
          "deleteVariants[" + i + "][product_id]",
          variant.product_id
      );
      formData.append("deleteVariants[" + i + "][color]", variant.color);
      formData.append("deleteVariants[" + i + "][price]", variant.price);
    }
    formData.append("variants[]", "");
  }
  return formData;
};
const updateDraft = async () => {
  const formData = execute();
  const res = await productService.draftUpdate(formData, route.params.id);
  if (res.status) {
    navigateTo("/product");
  }
};
const updatePublish = async () => {
  const formData = execute();
  const res = await productService.publishUpdate(formData, route.params.id);
  if (res.status) {
    navigateTo("/product");
  }
};
</script>