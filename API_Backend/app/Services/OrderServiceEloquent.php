<?php
namespace App\Services;
use App\Models\Order;
use App\Repositories\Order\OrderRepository;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;

class OrderServiceEloquent implements OrderService
{
    public function __construct(protected OrderRepository $orderRepository)
    {

    }


    public function getRepository(): OrderRepository
    {
        return $this->orderRepository;
    }

    public function createOrder(array $attributes): ?Order
    {
    //     // Bắt đầu giao dịch để đảm bảo tính toàn vẹn dữ liệu
    //     DB::beginTransaction();

    //     try {
    //         // Tạo đơn hàng
    //         $order = $this->orderRepository->create($attributes);
    //         // Lặp qua từng chi tiết đơn hàng trong $attributes['details']
    //         foreach ($attributes['details'] as $detail) {
    //             // Lấy product_id và quantity từ chi tiết đơn hàng
    //             $productId = $detail['product_id'];
    //             $quantity = $detail['quantity'];
                
    //             // Giảm số lượng sản phẩm trong bảng products
    //             DB::table('products')->where('id', $productId)->decrement('quantity', $quantity);
    //         }
            
    //         // Commit giao dịch
    //         DB::commit();

    //         return $order;
    //     } catch (\Exception $e) {
    //         // Rollback giao dịch nếu có lỗi
    //         DB::rollBack();
    //         return null;
    //     }
    // }

     return $this->orderRepository->create($attributes);
    }


}
