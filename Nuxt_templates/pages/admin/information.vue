<template>
  <div class="bg-[#F6F6F6] w-full py-[30px]">
    <div class="max-w-[1000px] mx-auto bg-white">
      <p class="pt-5 ml-5 text-xl font-bold">Cài đặt thông tin Shop</p>
      <div class="mt-12 flex">
        <div class="flex-1 pb-[60px]">
          <div class="flex items-center">
            <div class="w-[210px]">
              <p class="mr-[61px] text-end">Email</p>
            </div>
            <div class="w-[440px]">
              <FormInput inputType="text" placeholder="Email" v-model:input="Email" />
            </div>
          </div>
          <div class="mt-5 flex items-center">
            <div class="w-[210px]">
              <p class="mr-[61px] text-end">Tên</p>
            </div>
            <div class="w-[440px]">
              <FormInput inputType="text" placeholder="Tên" v-model:input="Name" />
            </div>
          </div>
          <div class="mt-5 flex items-center">
            <div class="w-[210px]">
              <p class="mr-[61px] text-end">Số điện thoại</p>
            </div>
            <div class="w-[440px]">
              <FormInput
                inputType="text"
                placeholder="Số điện thoại"
                v-model:input="Phone"
              />
            </div>
          </div>
          <div class="mt-5 flex items-center">
            <div class="w-[210px]">
              <p class="mr-[61px] text-end">Giới tính</p>
            </div>
            <div class="w-[440px]">
              <FormRadio :items="genders" v-model:input="gender" />
            </div>
          </div>
          <div class="mt-5 flex items-center">
            <div class="w-[210px]">
              <p class="mr-[61px] text-end">Tên shop</p>
            </div>
            <div class="w-[440px]">
              <FormInput
                inputType="text"
                placeholder="Tên shop"
                v-model:input="storeName"
              />
            </div>
          </div>
          <div class="mt-5 flex items-center">
            <div class="w-[210px]">
              <p class="mr-[61px] text-end">Tên shop</p>
            </div>
            <div class="w-[440px] grid grid-cols-2 gap-[30px]">
              <FormSelect :items="cities" placeholder="Thành phố" v-model:input="city" />
              <FormSelect
                :items="distries"
                placeholder="Quận/huyện"
                v-model:input="distry"
              />
            </div>
          </div>
          <div class="mt-5 flex items-center">
            <div class="w-[210px]">
              <p class="mr-[61px] text-end"></p>
            </div>
            <div class="w-[440px]">
              <FormInput inputType="text" placeholder="Địa chỉ" v-model:input="address" />
            </div>
          </div>
          <div class="mt-10 flex items-center">
            <div class="w-[210px]">
              <p class="mr-[61px] text-end"></p>
            </div>
            <div class="w-[440px] grid grid-cols-2 gap-[30px]">
              <button class="h-[50px] bg-[#007006] text-white border rounded">
                Lưu thông tin
              </button>
            </div>
          </div>
        </div>
        <div class="mt-[25px] w-[300px] flex flex-col items-center">
          <img :src="img" width="200" height="200" class="rounded-full" alt="" />
          <input
            type="file"
            accept=".jpg, .jpeg, .png"
            ref="avatar"
            class="hidden"
            @change="selectAvatar"
          />
          <button
            @click="$refs.avatar.click()"
            class="mt-[25px] border rounded h-[50px] w-[120px] text-[#000000B2]"
          >
            Chọn ảnh
          </button>
          <p class="text-[#0000006B] mt-[30px]">Dung lượng file tối đa 1 MB</p>
          <p class="text-[#0000006B]">Định dạng: JPEG, JPG, PNG</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const img = ref("/_nuxt/assets/images/avatar.png");
const gender = ref(null);
const city = ref(null);
const distry = ref(null);
const genders = ref(["Nam", "Nữ", "Khác"]);
const cities = ref(["Hà Nội", "Quảng Ninh", "Hà Nam", "Hải Dương", "Sơn La"]);
const distries = ref(["Hà Đông", "Thanh Xuân", "Cầu Giấy", "Đống Đa", "Mỹ Đình"]);
const selectAvatar = (event) => {
  const selectedFiles = event.target.files[0];
  if (selectedFiles) {
    const reader = new FileReader();
    reader.onload = (e) => {
      img.value = e.target.result;
    };
    reader.readAsDataURL(selectedFiles);
  }
};

definePageMeta({
  layout: "admin",
});
</script>

<style></style>
