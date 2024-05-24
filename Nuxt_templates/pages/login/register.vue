<template>
  <div class="w-[1440px] mx-auto bg-[#FDFAF7] h-[100%]">
    <div class="w-full">
      <div class="max-w-[1200px] w-full mx-auto flex">
        <div class="w-full">
          <div class="mt-[125px] ml-[50px] text-[#007006]">
            <div class="text-[28px]">VN-store Việt Nam</div>
            <div
                class="text-[28px] font-bold mt-2.5 w-[287px] leading-[33.89px]"
            >
              Trở thành Người bán ngay hôm nay
            </div>
            <div class="flex flex-col gap-[30px] mt-[30px]">
              <div class="flex items-center gap-5">
                <div>
                  <img src="~/assets/images/store 1.png" width="45" />
                </div>
                <div class="text-[16px] w-[296px] leading-[19.36px]">
                  Nền tảng thương mại điện tử hàng đầu Đông Nam Á
                </div>
              </div>
              <div class="flex items-center gap-5">
                <div>
                  <img src="~/assets/images/present 1.png" width="45" />
                </div>
                <div class="text-[16px] leading-[19.36px]">
                  Phát triển trở thành thương hiệu toàn cầu
                </div>
              </div>
              <div class="flex items-center gap-5">
                <div>
                  <img src="~/assets/images/handshake 1.png" width="45" />
                </div>
                <div class="text-[16px] w-[352px] leading-[19.36px]">
                  Dẫn đầu lượng người dùng trên ứng dụng mua sắm tại Việt Nam
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full flex items-center justify-end py-[15px]">
          <div
              class="w-[500px] bg-white border border-[#0000000D] rounded px-[30px]"
          >
            <div class="text-[24px] mt-5">Đăng ký</div>
            <div class="mt-5">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.shopName')"
                  inputType="text"
                  :error="
                  error && error.type == $t('ATTRIBUTE.user.name')
                    ? error.message
                    : ''
                "
                  v-model:input="formData.name"
              />
            </div>
            <div class="mt-5 flex gap-[30px]">
              <FormSelect
                  :placeholder="$t('PLACEHOLDER.city')"
                  :error="
                  error && error.type == $t('ATTRIBUTE.user.city')
                    ? error.message
                    : ''
                "
                  v-model:input="formData.city_id"
                  :items="cities"
              />
              <FormSelect
                  :placeholder="$t('PLACEHOLDER.district')"
                  :error="
                  error && error.type == $t('ATTRIBUTE.user.district')
                    ? error.message
                    : ''
                "
                  v-model:input="formData.district_id"
                  :items="districts"
              />
            </div>
            <div class="mt-5">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.address')"
                  inputType="text"
                  :error="
                  error && error.type == $t('ATTRIBUTE.user.address')
                    ? error.message
                    : ''
                "
                  v-model:input="formData.address"
              />
            </div>
            <div class="mt-5">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.email')"
                  inputType="email"
                  :error="
                  error && error.type == $t('ATTRIBUTE.user.email')
                    ? error.message
                    : ''
                "
                  v-model:input="formData.email"
              />
            </div>
            <div class="mt-5">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.password')"
                  inputType="password"
                  :error="
                  error && error.type == $t('ATTRIBUTE.user.password')
                    ? error.message
                    : ''
                "
                  v-model:input="formData.password"
              />
            </div>
            <div class="mt-5">
              <FormInput
                  :placeholder="$t('PLACEHOLDER.confirmPassword')"
                  inputType="password"
                  :error="
                  error && error.type == 'confirmPassword' ? error.message : ''
                "
                  v-model:input="formData.password_confirmation"
              />
            </div>
            <div class="mt-5 flex gap-2.5">
              <div
                  class="w-5 h-5 border border-[#0000001A] rounded hover:cursor-pointer relative"
                  :class="isCheck ? 'bg-[#007006]' : ''"
                  @click="isCheck = !isCheck"
              >
                <Icon
                    name="mdi:check"
                    color="#FFFFFF"
                    size="17"
                    class="absolute top-0"
                />
              </div>
              <div class="text-[16px] leading-[19.36px]">
                Đồng ý với VN-store về
                <span class="text-[#007006]"> Điều khoản dịch vụ</span> &
                <span class="text-[#007006]">Chính sách bảo mật</span>
              </div>
            </div>
            <span
                v-if="error && error.type == 'accept'"
                class="text-red-500 text-[14px]"
            >
              {{ error.message }}
            </span>
            <button
                class="mt-5 w-full rounded bg-[#007006] text-white text-center py-[16px]"
                @click="register()"
            >
              ĐĂNG KÝ
            </button>
            <div class="mt-8 mb-[22px] text-center w-full">
              Bạn đã có tài khoản?
              <NuxtLink class="text-[#007006]" to="/login">
                Đăng nhập</NuxtLink
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full bg-white">
      <div class="max-w-[1200px] w-full mx-auto pt-[40px] pb-[48px]">
        <div
            class="text-center w-[415px] mx-auto text-[28px] leading-[33.89px]"
        >
          TẠI SAO NÊN BÁN HÀNG TRÊN VN-store
        </div>
        <div class="grid grid-cols-3">
          <div class="text-center mt-[22px]">
            <img class="mx-auto" src="~/assets/images/image 29.png" alt="" />
            <p class="font-bold my-3">Miễn phí đăng ký</p>
            <p>Mở Shop và bán hàng dễ dàng hơn cùng VN-store</p>
          </div>
          <div class="text-center mt-[22px]">
            <img class="mx-auto" src="~/assets/images/image 30.png" alt="" />
            <p class="font-bold my-3">Công cụ marketing đa dạng</p>
            <p>Thu hút người mua và tăng trưởng đơn hàng vớg Flash Sale</p>
          </div>
          <div class="text-center mt-[22px]">
            <img class="mx-auto" src="~/assets/images/image 31.png" alt="" />
            <p class="font-bold my-3">Vận chuyển dễ dàng</p>
            <p>
              Linh hoạt lựa chọn đơn vị vận chuyển và theo dõi chi tiết hành
              trình đơn hàng.
            </p>
          </div>
          <div class="text-center mt-[22px]">
            <img class="mx-auto" src="~/assets/images/image 32.png" alt="" />
            <p class="font-bold my-3">Siêu sale cùng VN-store</p>
            <p>
              Bứt phá doanh số với các chiến dịch lớn: Ngày Siêu Mua Sắm, Siêu
              Sale,...
            </p>
          </div>
          <div class="text-center mt-[22px]">
            <img class="mx-auto" src="~/assets/images/image 33.png" alt="" />
            <p class="font-bold my-3">Hỗ trợ bán hàng hiệu quả</p>
            <p>
              Đa dạng tính năng giúp quản lý, tương tác với khách hàng và theo
              dõi hiệu quả Shop.
            </p>
          </div>
          <div class="text-center mt-[22px]">
            <img class="mx-auto" src="~/assets/images/image 34.png" alt="" />
            <p class="font-bold my-3">Kết nối cộng đồng Người bán</p>
            <p>
              Chia sẻ kinh nghiệm bán hàng thực tế thông qua các hội thảo, khóa
              học trực tuyến
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
// import type { User } from "~/types/models/user";
// import type { City } from "~/types/models/city";
import { useTrans } from "~/composables/trans";
import { useCityService } from "~/services/city";
import { useDistrictService } from "~/services/district";
import { useAuthService } from "~/services/auth";
const route = useRouter();
const { required, maxLength, notEmpty, emailFormatted, hasWhiteSpace } =
    useValidate();
const { trans } = useTrans();
const isCheck = ref(false);
const error = ref(null);
const cities = ref(null);
const districts = ref(null);
const formData = reactive({
  name: null,
  city_id: null,
  district_id: null,
  address: null,
  email: null,
  password: null,
  password_confirmation: null,
});

const cityService = useCityService();
const districtService = useDistrictService();
const authService = useAuthService();

onMounted(async () => {
  const res = await cityService.getAll();
  cities.value = res.data;
  console.log(cities.value);
});

watch(
    () => formData.city_id,
    async () => {
      const res = await districtService.getDistrictByCity(formData.city_id);
      districts.value = res.data;
      console.log(districts.value);
    }
);
const register = async () => {
  error.value = null;
  if (!required(formData.name?.trim()) || !notEmpty(formData.name)) {
    error.value = {
      type: trans("ATTRIBUTE.user.name"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.name")]),
    };
  } else if (!required(formData.city_id)) {
    error.value = {
      type: trans("ATTRIBUTE.user.city"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.city")]),
    };
  } else if (!required(formData.district_id)) {
    error.value = {
      type: trans("ATTRIBUTE.user.district"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.district")]),
    };
  } else if (
      !required(formData.address?.trim()) ||
      !notEmpty(formData.address)
  ) {
    error.value = {
      type: trans("ATTRIBUTE.user.address"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.address")]),
    };
  } else if (!required(formData.email?.trim()) || !notEmpty(formData.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.email")]),
    };
  } else if (!emailFormatted(formData.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_COM_0016", [trans("ATTRIBUTE.user.email")]),
    };
  } else if (
      !required(formData.password?.trim()) ||
      !notEmpty(formData.password)
  ) {
    error.value = {
      type: trans("ATTRIBUTE.user.password"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.password")]),
    };
  } else if (hasWhiteSpace(formData.password)) {
    error.value = {
      type: trans("ATTRIBUTE.user.password"),
      message: "Mật khẩu không được có khoảng trắng",
    };
  } else if (!(formData.password_confirmation === formData.password)) {
    error.value = {
      type: "confirmPassword",
      message: "Mật khẩu phải giống nhau",
    };
  } else if (!isCheck.value) {
    error.value = {
      type: "accept",
      message: "Vui lòng đồng ý với điều khoản của VN-store",
    };
  }
  if (error.value) {
    return;
  }
  const response = await authService.register(formData);
  if (response.status) {
    route.push("/login");
  }

  definePageMeta({
    layout: "auth",
  });
};
</script>