<template>
  <div class="flex justify-center bg-white">
    <div class="max-w-[1200px] w-full">
      <div class=" items-center h-[100px] grid grid-cols-4">
          <div class="div">
            <button>
              <NuxtLink to="/"
              ><img src="~/assets/images/logo_vn.jpg" width="227.42"/></NuxtLink>
            </button>
          </div>

        <div class="flex w-[700px] border border-[#00000033] rounded mt-2 col-span-3">
          <div class="flex-1 max-w-[700px] w-full">
            <input type="text" class="focus:outline-none rounded h-[50px] w-full px-3" />
          </div>
          <div class="flex items-center pr-[6px]">
            <button class="bg-[#ebe7d2] px-7 py-[9px]">
              <img src="~/assets/images/search-interface-symbol 1.png" alt="" />
            </button>
          </div>
        </div>
<!--        <div class="mr-[80px]">-->
<!--          <button>-->
<!--            <img src="~/assets/images/cart.png" width="42" />-->
<!--          </button>-->
<!--        </div>-->
      </div>
    </div>
  </div>
</template>

<script setup>
</script>
