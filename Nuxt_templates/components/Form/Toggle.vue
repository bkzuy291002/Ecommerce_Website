<template>
  <div
    class="relative inline-flex m-auto cursor-pointer"
    @click="checkComputed = !checkComputed"
  >
    <input type="checkbox" class="sr-only peer" :checked="checkComputed" />
    <div
      class="w-[45px] h-[22px] bg-[#CCCCCC] rounded-full peer-checked:after:translate-x-full after:absolute after:my-[1px] after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"
    ></div>
  </div>
</template>

<script setup>
const props = defineProps({
  input: Boolean,
});
const emit = defineEmits(["update:input"]);
const { input } = toRefs(props);
const checkComputed = computed({
  get: () => input.value,
  set: (val) => emit("update:input", val),
});
</script>
