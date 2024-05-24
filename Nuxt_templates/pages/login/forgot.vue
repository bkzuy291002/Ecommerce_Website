<template>
  <div class="flex justify-center">
    <div class="bg-white w-[500px] mt-[50px] pb-[30px] border rounded mb-[200px]">
      <div class="relative flex items-center mx-[30px] py-5">
        <NuxtLink to="/login">
          <img src="~assets/images/back 1.png" width="24" alt="" class="absolute left-0"
        /></NuxtLink>
        <p class="text-2xl w-full text-center">Đặt lại mật khẩu</p>
      </div>
      <div class="mt-[30px] mx-[30px]">
        <FormInput  :placeholder="$t('PLACEHOLDER.email')"
                    inputType="email"
                    :error="
                error && error.type === $t('ATTRIBUTE.user.email')
                  ? error.message
                  : ''
              "
                    v-model:input="formData.email"/>
      </div>
        <div
          class="mt-[30px] mx-[30px] bg-[#007006] text-center text-white border rounded"
        >
<!--          <button class="py-4"   @click="submit()">TIẾP THEO</button>-->
          <UButton
              @click="submit()"
              :loading="pending"
              block
              size="xl"
              icon="i-mdi-credit-card"
              class="py-4 bg-[#007006] rounded"
          >
            TIẾP THEO
          </UButton>
        </div>
    </div>
  </div>
</template>

<script setup>
import { useTrans } from "~/composables/trans";
import { useAuthService } from "~/services/auth";

const email = ref(null);
definePageMeta({
  layout: "auth",
});

const { required, notEmpty, emailFormatted } = useValidate();
const { trans } = useTrans();
const error = ref(null);
const pending = ref(false)
const formData = reactive({
  email: null,
});
const authService = useAuthService();
const submit = async () => {
  pending.value = true

  error.value = null;
  if (!required(formData.email?.trim()) || !notEmpty(formData.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.email")]),
    };
    console.log(error.value);
  } else if (!emailFormatted(formData.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_COM_0016", [trans("ATTRIBUTE.user.email")]),
    };
  }
  if (error.value) {
    return;
  }
  const res = await authService.forgotPassword(formData);
  if (res.status) {
    alert("Yêu cầu đặt lại mật khẩu đã được gửi. Vui lòng kiểm tra email");
  }
};
</script>

<style></style>
