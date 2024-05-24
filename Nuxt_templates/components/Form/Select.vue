<template>
  <div class="relative w-full">
    <div
        @click="isMenuOpen = !isMenuOpen"
        class="w-full flex items-center justify-between border border-[#0000001A] rounded text-[16px] p-[15px] leading-[19.36px]"
    >
      <div v-if="!dataComputed" class="text-[#0000006B]">{{ placeholder }}</div>
      <div v-else>
        <div v-for="item in items" :key="item">
          <div v-if="item.id === dataComputed">
            {{ item.name }}
          </div>
        </div>
      </div>
      <div>
        <img
            src="~/assets/images/down-arrow 1.png"
            width="16px"
            class="transition duration-700"
            :class="isMenuOpen ? 'rotate-180' : ''"
        />
      </div>
    </div>
    <span v-if="error" class="text-red-500 text-[14px]">
      {{ error }}
    </span>
    <Transition>
      <div
          v-if="isMenuOpen"
          class="absolute w-full max-h-[165px] overflow-auto z-10 bg-white border-x border-b border-[#0000001A]"
      >
        <div
            v-for="item in items"
            :key="item"
            @click="(dataComputed = item.id), (isMenuOpen = false)"
            class="text-[16px] p-[15px] border-b border-[#0000001A] hover:bg-gray-200 hover:cursor-pointer"
        >
          {{ item.name }}
        </div>
      </div>
    </Transition>
  </div>
</template>
<script setup>
const props = defineProps(["placeholder", "error", "input", "items"]);
const emit = defineEmits(["update:input"]);
const { placeholder, error, input, items } = toRefs(props);
const isMenuOpen = ref(false);
const dataComputed = computed({
  get: () => input.value,
  set: (val) => emit("update:input", val),
});
</script>
<style scoped>
.v-enter-active,
.v-leave-active {
  max-height: 165px;
  transition: max-height 0.25s ease-in;
}
.v-enter-from,
.v-leave-to {
  max-height: 0;
  transition: max-height 0.25s ease-out;
  overflow: hidden;
}
</style>