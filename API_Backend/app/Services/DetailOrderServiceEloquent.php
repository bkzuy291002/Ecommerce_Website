<?php
namespace App\Services;

use App\Repositories\DetailOrder\DetailOrderRepository;
use Illuminate\Support\Facades\DB;


class DetailOrderServiceEloquent implements DetailOrderService
{
    public function __construct(protected DetailOrderRepository $detailOrderRepository)
    {

    }

    public function getRepository(): DetailOrderRepository
    {
        return $this->detailOrderRepository;
    }

//    public function createDetailOrder(array $attribute)
//    {
//        DB::beginTransaction();
//        try {
//            $order = $this->detailOrderRepository->create($attribute);
//
//            if (!empty($attribute)) {
//                    if(isset($attribute['product_id']) && isset($attribute['quantity'])) {
//                        $productId = intval($attribute['product_id']);
//                        $quantity = intval($attribute['quantity']);
//
//                        DB::table('products')->where('id', $productId)->decrement('quantity', $quantity);
//                    }
//            }
//
//            DB::commit();
//            return $order;
//        } catch (\Exception $e) {
//            DB::rollBack();
//            return null;
//        }
//    }

    public function createDetailOrder(array $attribute)
    {
        DB::beginTransaction();
        try {
            $order = $this->detailOrderRepository->create($attribute);
            if (!empty($attribute)) {
                    if(isset($attribute['product_id']) && isset($attribute['quantity'])) {
                        $productId = intval($attribute['product_id']);
                        $quantity = intval($attribute['quantity']);
                        $currentQuantity = DB::table('products')->where('id', $productId)->value('quantity');
                        $newQuantity = $currentQuantity - $quantity;
                        DB::table('products')->where('id', $productId)->update(['quantity' => $newQuantity]);
                    }
                }
            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
//            \Log::error('Error creating detail order: '.$e->getMessage());
            return null;
        }
//        return  $this->detailOrderRepository->create($attribute);
    }
}
