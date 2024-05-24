<template>
  <div class="w-full bg-[#E0E0E0] mx-auto">
    <div class="border-b-4 border-[#007006] flex justify-center">
      <div class="max-w-[1200px]">
        <SliderBanner />
        <div class="mt-[30px] bg-white mb-[70px]">
          <p class="font-bold pt-[15px] ml-[15px]">DANH MỤC</p>
<!--          <hr class="h-1 bg-black" />-->
          <SliderCategory
            :categories="categories "
          />
          <img src="~assets/images/baner3.jpg" alt=""  class="h-[350px] w-full"/>
          <p class="text-2xl font-bold ml-2.5 mt-[13px]">THƯƠNG HIỆU NỔI BẬT</p>
          <SliderProduct class="mt-4"
            :products = "suggestProducts"

          />
          <img src="~assets/images/baner2.jpg" alt="" />
          <p class="text-2xl font-bold ml-2.5 mt-[30px] pb-2.5">ƯU ĐÃI SHOOP</p>
          <SliderProduct
                         :products = "saleProducts"
          />
          <img src="~assets/images/baner.jpg" alt=""  class="h-[350px] w-full"/>
          <p class="text-2xl font-bold ml-2.5 mt-[30px] pb-[5px]">GỢI Ý HÔM NAY</p>
          <hr class="h-1 bg-[#007006]" />
          <SliderProduct class="mt-[30px]"
                         :products = "suggestProducts"
          />
          <SliderProduct class="mt-[30px]"
                         :products = "suggestProducts"
          />
        </div>
      </div>
    </div>
    <div class="flex justify-center bg-white w-full">
      <div class=" w-full">
        <div class="text-sm pb-[74px] border-b mx-[120px]">
          <p class="font-bold pt-[70px]">SHOOP - GÌ CŨNG CÓ, MUA HẾT Ở SHOOP</p>
          <p class="mt-5 pr-11">
            <span class="font-bold">Shoop</span> - ứng dụng mua sắm trực tuyến thú vị, tin
            cậy, an toàn và miễn phí! Shoop là nền tảng giao dịch trực tuyến hàng đầu ở
            Đông Nam Á, có trụ sở chính ở Singapore, đã có mặt ở khắp các khu vực
            Singapore, Malaysia, Indonesia, Thái Lan, Philippines. Với sự đảm bảo của
            Shoop, bạn sẽ mua hàng trực tuyến an tâm và nhanh chóng hơn bao giờ hết!
          </p>
          <p class="font-bold mt-10">
            MUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN
          </p>
          <p class="mt-5 pr-[56px]">
            Nếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Shoop.vn
            là một sự lựa chọn tuyệt vời dành cho bạn. Shoop là trang thương mại điện tử
            cho phép người mua và người bán tương tác và trao đổi dễ dàng thông tin về sản
            phẩm và chương trình khuyến mãi của shop. Do đó, việc mua bán trên Shoop trở
            nên nhanh chóng và đơn giản hơn. Bạn có thể trò chuyện trực tiếp với nhà bán
            hàng để hỏi trực tiếp về mặt hàng cần mua. Còn nếu bạn muốn tìm mua những dòng
            sản phẩm chính hãng, uy tín, Shoop chính là sự lựa chọn lí tưởng dành cho bạn.
            Để bạn có thể dễ dàng khi tìm hiểu và sử dụng sản phẩm, Shoop Blog - trang
            blog thông tin chính thức của Shoop - sẽ giúp bạn có thể tìm được cho mình các
            kiến thức về xu hướng thời trang, review công nghệ, mẹo làm đẹp, tin tức tiêu
            dùng và deal giá tốt bất ngờ.
          </p>
          <p class="mt-2.5 pr-[65px]">
            Đến với Shoop, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết.
            Chỉ với vài thao tác trên ứng dụng, bạn đã có thể đăng bán ngay những sản phẩm
            của mình. Không những thế, các nhà bán hàng có thể tự tạo chương trình khuyến
            mãi trên Shoop để thu hút người mua với những sản phẩm có mức giá hấp dẫn. Khi
            đăng nhập tại Shoop Kênh người bán, bạn có thể dễ dàng phân loại sản phẩm,
            theo dõi đơn hàng, chăm sóc khách hàng và cập nhập ngay các hoạt động của
            shop.
          </p>
          <p class="mt-2.5 pr-[87px]">
            Bên cạnh đó, Shoop hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường
            như SPX,... nhằm cung cấp dịch vu giao nhận và vận chuyển tiện lợi cho cả
            khách hàng và người bán. Cùng với nhiều ưu đãi với chi phí giao hàng hợp lý,
            Shoop đảm bảo cho khách hàng trải nghiệm mua sắm thuận tiện nhất.
          </p>
          <p class="mt-10">TOP TỪ KHÓA XU HƯỚNG</p>
          <p class="mt-5 pr-[48px]">
            pandora | vaseline | trang trí tết | máy nước nóng trực tiếp | vợt cầu lông |
            dexeryl | vascara | myherbalife | hasaki | flower knows | avakids | đèn sưởi
            nhà tắm | kem nẻ | kidsplaza | vnb | wind breaker | ghế massage toàn thân |
            pin | thỏi vàng | concung | móng tay đẹp | bao cao su | yonex | truyện tranh
            đam mỹ | tô tượng | lego | memoryzone | mwc | gấu dâu | ivy moda
          </p>
        </div>
        <div class="text-[12px] pt-[70px] mx-[120px]">
          <p class="text-sm font-bold">Danh Mục</p>
          <div class="mt-5 grid grid-cols-5">
            <div class="flex flex-col pr-5">
              <div class="flex flex-col pb-2.5">
                <p class="font-bold">THỜI TRANG NAM</p>
                <p class="mt-2.5">
                  Áo Khoác | Áo Vest và Blazer | Áo Hoodie, Áo Len & Áo Nỉ | Quần Jeans |
                  Quần Dài/Quần Âu | Quần Short | Áo | Áo Ba Lỗ | Đồ Lót | Đồ Ngủ | Đồ Bộ
                  | Vớ/Tất | Trang PhụcTruyền Thống | Đồ Hóa Trang | Trang Phục Ngành Nghề
                  | Khác | Trang Sức Nam | Kính Mắt Nam | Thắt Lưng Nam | Cà vạt & Nơ cổ |
                  Phụ Kiện Nam
                </p>
              </div>
              <div class="mt-2.5 flex flex-col pb-[54px]">
                <p class="font-bold">ĐỒNG HỒ</p>
                <p class="mt-2.5">
                  Đồng Hồ Nam | Đồng Hồ Nữ | Bộ Đồng Hồ & Đồng Hồ Cặp | Đồng Hồ Trẻ Em |
                  Phụ Kiện Đồng Hồ | Khác
                </p>
              </div>
            </div>
            <div class="pr-5">
              <p class="font-bold">THỜI TRANG NỮ</p>
              <p class="mt-2.5">
                Quần | Quần đùi | Chân váy | Quần jeans | Đầm/Váy | Váy cưới | Đồ liền
                thân | Áo khoác, Áo choàng & Vest | Áo len & Cardigan | Hoodie và Áo nỉ |
                Bộ | Đồ lót | Đồ ngủ | Áo | Đồ tập | Đồ Bầu | Đồ truyền thống | Đồ hóa
                trang | Vải | Vớ/ Tất | Khác
              </p>
            </div>
            <div class="pr-5">
              <p class="font-bold">ĐIỆN THOẠI & PHỤ KIỆN</p>
              <p class="mt-2.5">
                Điện thoại | Máy tính bảng | Pin Dự Phòng | Pin Gắn Trong, Cáp và Bộ Sạc |
                Ốp lưng, bao da, Miếng dán điện thoại | Bảo vệ màn hình | Đế giữ điện
                thoại | Thẻ nhớ | Sim | Phụ kiện khác | Thiết bị khác
              </p>
            </div>
            <div class="pr-5">
              <p class="font-bold">THIẾT BỊ ĐIỆN TỬ</p>
              <p class="mt-2.5">
                Thiết bị đeo thông minh | Phụ kiện tivi | Máy Game Console | Phụ kiện
                Console | Đĩa game | Linh phụ kiện | Tai nghe nhét tai | Loa | Tivi | Tivi
                Box | Headphones
              </p>
            </div>
            <div class="pr-5">
              <p class="font-bold">SỨC KHỎE</p>
              <p class="mt-2.5">
                Vật tư y tế | Chống muỗi & xua đuổi côn trùng | Thực phẩm chức năng | Tã
                người lớn | Hỗ trợ làm đẹp | Hỗ trợ tình dục | Dụng cụ massage và trị liệu
                | Khác
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useCategoryService } from "~/services/category";
import { useProductService } from "~/services/product";



const categories = ref(null);

const specialProducts = ref(null);
const saleProducts = ref(null);
const suggestProducts = ref(null);

onBeforeMount(async () => {
  const categoryService = useCategoryService();
  const productService = useProductService();

  await categoryService
      .getAll()
      .then((res) => {
        // console.log(111111)
        categories.value = res.data;
      })
      .catch((e) => {
        console.log(categories.value);
      });

  await productService
      .getSpecialProduct()
      .then((res) => {
        specialProducts.value = res.data;
      })
      .catch((e) => {
        console.log(e);
      });

  await productService
      .getSaleProduct()
      .then((res) => {
        saleProducts.value = res.data;
      })
      .catch((e) => {
        console.log(e);
      });

  await productService
      .getSuggestProduct()
      .then((res) => {
        suggestProducts.value = res.data;
        // console.log(suggestProducts.value);
      })
      .catch((e) => {
        console.log(e);
      });
});
</script>

<style></style>
