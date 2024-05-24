<template>
  <div class="w-[1440px] bg-[#E0E0E0] mx-auto ">
    <div class="">
      <AdminHeader />
    </div>
    <div class="flex">
      <AdminSidebar />
      <slot class="" />
    </div>
    <AdminFooter />
  </div>
</template>
