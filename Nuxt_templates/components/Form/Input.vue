<template>
  <div class="relative">
    <input
      v-if="inputType === 'password'"
      :type="visible ? 'password' : 'text'"
      class="w-full border border-[#0000001A] rounded placeholder-[#0000006B] text-[16px] pl-[15px] py-[15px] pr-[45px] leading-[19.36px]"
      :placeholder="placeholder"
      :class="{ 'border-red-500': error }"
      v-model="inputComputed"
      autocomplete="off"
      :disabled="disable"
    />
    <input
      v-else
      :type="inputType"
      class="w-full border border-[#0000001A] rounded placeholder-[#0000006B] text-[16px] p-[15px] leading-[19.36px]"
      :placeholder="placeholder"
      :class="{ 'border-red-500': error }"
      v-model="inputComputed"
      autocomplete="off"
      :disabled="disable"
    />
    <div
      v-if="inputType === 'password'"
      @click="visible = !visible"
      class="absolute right-3 top-3 hover:cursor-pointer"
    >
      <Icon
        :name="visible ? 'mdi:eye-off-outline' : 'mdi:eye-outline'"
        color="#000000"
        size="24"
      />
    </div>
    <span v-if="error" class="text-red-500 text-[14px]">
      {{ error }}
    </span>
  </div>
</template>
<script setup>
const props = defineProps({
  placeholder: {
    type: String,
    default: null,
  },
  inputType: {
    type: String,
    default: null,
  },
  max: {
    type: Number,
    default: null,
  },
  min: {
    type: Number,
    default: null,
  },
  error: {
    type: String,
    default: null,
  },
  input: {
    type: String,
    default: null,
  },
  disable: {
    type: Boolean,
    default: false,
  },
});
const emit = defineEmits(["update:input"]);
const { placeholder, inputType, max, min, error, input, disable } =
  toRefs(props);
const visible = ref(true);
const inputComputed = computed({
  get: () => input.value,
  set: (val) => emit("update:input", val),
});
</script>