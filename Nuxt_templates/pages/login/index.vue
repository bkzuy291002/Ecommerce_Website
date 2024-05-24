<template>
  <div class="flex justify-center">
    <div class="max-w-[1200px] w-full grid grid-cols-2">
      <div class="flex items-center">
        <div class="ml-[50px] mr-28">
          <p class="text-[28px] text-[#007006] font-bold">Bán hàng chuyên nghiệp</p>
          <p class="mt-[30px] mr-12 text-[18px]">
            Quản lý shop của bạn một cách hiệu quả hơn trên VN-store với VN-store - Kênh Người
            bán
          </p>
          <img src="~assets/images/image 35.png" width="450" class="mt-[50px]" alt="" />
        </div>
      </div>
      <div class="flex justify-end">
        <form class="bg-white my-[50px] pb-[30px] border rounded" @submit="onSubmit">
          <p class="text-2xl mt-[30px] ml-[30px]">Đăng nhập</p>
          <div class="mt-10 w-[440px] mx-[30px]">
            <FormInput
               :placeholder="$t('PLACEHOLDER.email')"
              inputType="email"
              :error="
                error && error.type == $t('ATTRIBUTE.user.email')
                  ? error.message
                  : ''
              "
              v-model:input="user.email"
            />
          </div>
          <div class="relative mx-[30px] mt-5 w-[440px]">
            <FormInput
              :placeholder="$t('PLACEHOLDER.password')"
              inputType="password"
              :error="
                error && error.type == $t('ATTRIBUTE.user.password')
                  ? error.message
                  : ''
              "
              v-model:input="user.password"
            />
          </div>
          <div class="mt-5 mr-[30px] text-[#007006] flex justify-end">
            <NuxtLink to="login/forgot">
              <p>Quên mật khẩu</p>
            </NuxtLink>
          </div>
          <div class="flex justify-center mx-[30px]">
<!--            <button class="mt-10 text-white bg-[#007006] h-[50px] w-full rounded" @click="login">-->
<!--              ĐĂNG NHẬP-->
<!--            </button>-->

            <UButton
                @click="login"
                :loading="pending"
                block
                size="xl"
                icon="i-mdi-credit-card"
                class="mt-10 text-white bg-[#007006] h-[50px] w-full rounded"
            >
              ĐĂNG NHẬP
            </UButton>
          </div>
          <p class="mt-[100px] text-center">
            Bạn mới biết đến VN-store?<NuxtLink to="/login/register" class="text-[#007006]">
              Đăng ký</NuxtLink>
          </p>
        </form>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import type { User } from "~/types/models/user";
import { useTrans } from "~/composables/trans";
// import { reactive, ref } from "vue";
import { useValidate } from "~/composables/validate";
import { useAuthService } from "~/services/auth";
import { useSessionStore } from "~/stores/session";
import { useStoreService } from "~/services/store";
import { useStoreStore } from "~/stores/store";


const {required, maxLength, notEmpty, emailFormatted, hasWhiteSpace ,minLength} = useValidate();
const sessionStore = useSessionStore();
const storeStore = useStoreStore();
// const storeService = useStoreService();

const { trans } = useTrans();
const error = ref(null);
const pending = ref(false)
const user = reactive<User>({
  email: null,
  password: null,
});

  onMounted(() => {
    if (sessionStore.token) {
      navigateTo("/admin");
    }
  });

const login = async () => {
  pending.value = true

  event.preventDefault();
  error.value = null;
  if (!required(user.email?.trim()) || !notEmpty(user.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.email")]),
    };
  } else if (!emailFormatted(user.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_COM_0016", [trans("ATTRIBUTE.user.email")]),
    };
  } else if (!required(user.password?.trim()) || !notEmpty(user.password)) {
    error.value = {
      type: trans("ATTRIBUTE.user.password"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.password")]),
    };

  } else if (!minLength(user.password, 6)) {
    error.value = {
      type: trans("ATTRIBUTE.user.password"),
      message: "Mật khẩu tối thiếu 6 ký tự",
    };
  }

  console.log(error);
  if (error.value) {
    return;
  }

  const response = await useAuthService().login(user);
  if (response.status) {
    sessionStore.setToken(response.data.token);
    storeStore.id = response.data.store_id;
    // console.log(storeStore.id)
    const id = response.data.id;
    console.log(id)
    if(id != 1) {
      storeStore.getInfo(response.data.store_id);
      navigateTo("/admin");
    }
    else {
      storeStore.getInfo(response.data.store_id);
      navigateTo("/user");
    }
  }

};
definePageMeta({
  layout: "auth",
});
</script>



