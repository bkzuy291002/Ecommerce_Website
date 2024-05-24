<template>
  <div class="bg-[#E0E0E0] mx-auto w-full">
    <div class="fixed w-full z-50 ">
      <HomeTopMenu />
       <HomeHeader />
    </div>
    <div class="pt-[200px] w-full">
        <slot />
      <HomeFooter />
    </div>
  </div>
</template>
