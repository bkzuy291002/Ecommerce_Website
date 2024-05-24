<template>
  <div class="flex justify-center">
    <div class="bg-white max-w-[500px] w-full mt-[50px] pb-[30px] border rounded mb-[200px]">
      <div class="relative flex items-center mx-[30px] py-5">
        <NuxtLink to="forgot">
          <img src="~assets/images/back 1.png" width="24" alt="" class="absolute left-0"
        /></NuxtLink>
        <p class="text-2xl w-full text-center">Đặt lại mật khẩu</p>
      </div>
      <div class="mt-[30px] mx-[30px]">
        <FormInput :placeholder="$t('PLACEHOLDER.password')"
                   inputType="password"
                   :error="
                error && error.type === $t('ATTRIBUTE.user.password')
                  ? error.message
                  : ''
              "
                   v-model:input="formData.password"/>
      </div>
      <div class="mt-5 mx-[30px]">
        <FormInput
            :placeholder="$t('PLACEHOLDER.password')"
            inputType="password"
            :error="
                error && error.type === 'confirmPassword' ? error.message : ''
              "
            v-model:input="formData.password_confirmation"
        />
      </div>
        <div
          class="mt-[30px] mx-[30px] bg-[#007006] text-center text-white border rounded"
        >
          <button class="py-4"  @click="submit()">TIẾP THEO</button>
        </div>
    </div>
  </div>
</template>

<script setup>
definePageMeta({
  layout: "auth",
});

import { useTrans } from "~/composables/trans";
import { useAuthService } from "~/services/auth";

const route = useRoute();
const { required, notEmpty, hasWhiteSpace } = useValidate();
const { trans } = useTrans();
const error = ref(null);
const token = ref(null);
const authService = useAuthService();
const formData = reactive({
  token: null,
  password: null,
  password_confirmation: null,
});
onMounted(async () => {
  formData.token = route.params.token;
  await authService.checkToken(formData.token);
});
const submit = async () => {
  error.value = null;
  if (!required(formData.password?.trim()) || !notEmpty(formData.password)) {
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
  }
  if (error.value) {
    return;
  }
  const res = await authService.resetPassword(formData);
  if (res.status) {
    navigateTo("/login");
  }
};
</script>

<style></style>
