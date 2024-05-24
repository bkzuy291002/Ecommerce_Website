<template>
  <div class="bg-[#F6F6F6] w-full">
    <div class="py-[30px] max-w-[1000px] mx-auto flex gap-[30px]">
      <div class="flex flex-col gap-[30px]">
        <div class="bg-white px-5">
          <p class="pt-5 text-xl font-bold">Danh sách cần làm</p>
          <p class="text-sm text-[#00000099]">Những việc bạn sẽ phải làm</p>
          <div class="mt-2.5 grid grid-cols-4 gap-y-2.5">
            <div class="text-center w-[165px]">
              <p class="mt-2.5 text-xl text-[#007006] font-bold">0</p>
              <p class="mx-[14px] leading-[16.94px] text-sm text-[#00000099]">
                Chờ Xác Nhận
              </p>
            </div>
            <div class="text-center w-[165px] pb-[18px]">
              <p class="mt-2.5 text-xl text-[#007006] font-bold">0</p>
              <p class="mx-[14px] leading-[16.94px] text-sm text-[#00000099]">
                Chờ Lấy Hàng
              </p>
            </div>
            <div class="text-center w-[165px] pb-[18px]">
              <p class="mt-2.5 text-xl text-[#007006] font-bold">0</p>
              <p class="mx-[14px] leading-[16.94px] text-sm text-[#00000099]">Đã Xử Lý</p>
            </div>
            <div class="text-center w-[165px] pb-[18px]">
              <p class="mt-2.5 text-xl text-[#007006] font-bold">0</p>
              <p class="mx-[14px] leading-[16.94px] text-sm text-[#00000099]">Đơn Hủy</p>
            </div>
            <div class="text-center w-[165px] pb-[18px]">
              <p class="mt-2.5 text-xl text-[#007006] font-bold">0</p>
              <p class="mx-[14px] leading-[16.94px] text-sm text-[#00000099]">
                Trả Hàng/Hoàn Tiền Chờ xử lý
              </p>
            </div>
            <div class="text-center w-[165px] pb-[18px]">
              <p class="mt-2.5 text-xl text-[#007006] font-bold">0</p>
              <p class="mx-[14px] leading-[16.94px] text-sm text-[#00000099]">
                Sản Phẩm Bị Tạm Khóa
              </p>
            </div>
            <div class="text-center w-[165px] pb-[18px]">
              <p class="mt-2.5 text-xl text-[#007006] font-bold">0</p>
              <p class="mx-[14px] leading-[16.94px] text-sm text-[#00000099]">
                Sản Phẩm Hết Hàng
              </p>
            </div>
          </div>
        </div>
        <div class="bg-white px-5">
          <div class="pt-5 flex items-center gap-2.5">
            <p class="text-xl">Phân tích bán hàng</p>
            <p class="text-[12px] text-[#00000099] leading-[14.52px]">
              ( Hôm nay 00:00 GTM+7 19:00 )
            </p>
          </div>
          <p class="text-[12px] text-[#00000099] leading-[14.52px]">
            Tổng quan dữ liệu của shop đối với đơn hàng đã xác nhận
          </p>
          <div class="pt-[60px] mt-2.5 grid grid-cols-2">
            <div class="pb-[30px]">
              <p class="text-[12px] text-[#000000B2]">Doanh số</p>
              <p class="mt-2.5 font-bold">0</p>
              <div class="mt-4 ml-[6px]">
                <img src="~assets/images/Graph.png" width="276" alt="" />
              </div>
            </div>
            <div>
              <div class="grid grid-cols-2 pb-5 border-b">
                <div class="flex flex-col gap-2.5">
                  <p class="text-[12px] text-[#000000B2]">Lượt truy cập</p>
                  <p class="font-bold">0</p>
                  <p class="text-[12px] text-[#00000066]">Vs hôm qua 0,00 % --</p>
                </div>
                <div class="flex flex-col gap-2.5">
                  <p class="text-[12px] text-[#000000B2]">Lượt xem</p>
                  <p class="font-bold">0</p>
                  <p class="text-[12px] text-[#00000066]">Vs hôm qua 0,00 % --</p>
                </div>
              </div>
              <div class="mt-5 grid grid-cols-2 pb-5">
                <div class="flex flex-col gap-2.5">
                  <p class="text-[12px] text-[#000000B2]">Đơn hàng</p>
                  <p class="font-bold">0</p>
                  <p class="text-[12px] text-[#00000066]">Vs hôm qua 0,00 % --</p>
                </div>
                <div class="flex flex-col gap-2.5">
                  <p class="text-[12px] text-[#000000B2]">Tỷ lệ chuyển đổi</p>
                  <p class="font-bold">0,00%</p>
                  <p class="text-[12px] text-[#00000066]">Vs hôm qua 0,00 % --</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 bg-white">
        <div class="mx-3 pb-5">
          <div class="w-full flex justify-between items-center pb-2.5">
            <p class="text-xl font-bold pt-5 pb-4">Thông Báo</p>
            <p class="text-[#007006] pt-5 pb-4">Xem thêm</p>
          </div>
          <div class="mt-2.5 text-sm pb-[9px]" v-for="i in 4" :key="i">
            <p class="font-bold mr-10">Các Kênh Thông Tin Chính Thống Từ Shoop</p>
            <p class="mt-2.5 text-[#00000099] leading-[16.94px]">
              Lừa đảo bằng việc mạo danh VN-store cung cấp các dịch vụ có thu phí nhằm mục
              đích trục lợi cá nhân đang dần trở nên phổ biến.
            </p>
            <p class="mt-2.5 text-[12px] text-[#00000066]">
              <span class="text-[#007006]">Mới</span> Hôm Nay 00:00
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
definePageMeta({
  layout: "admin",
});
</script>

<style></style>
