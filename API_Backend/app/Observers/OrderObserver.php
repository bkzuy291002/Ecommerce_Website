<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
//    public function created(Order $order): void
//    {
////        foreach (request()->request()) {
//            $order->Detailorder()->create([
//                'order_id' => $order->id,
//                'product_id' => request()->product_id,
//                'price' => request()->price,
//                'sku_id' => request()->sku_id,
//                'quantity' => request()->quantity,
//                'store_id' => request()->store_id,
//            ]);
////        }
//    }


    public function created(Order $order): void
    {
        $details = [];

        // Duyệt qua các thông tin của các detailProduct từ request hoặc từ nơi khác
        foreach (request()->details as $detail) {
            $details[] = [
                'order_id' => $order->id,
                'product_id' => $detail['product_id'],
                'price' => $detail['price'],
                'sku_id' => $detail['sku_id'],
                'quantity' => $detail['quantity'],
                'store_id' => $detail['store_id'],
            ];
        }

        // Tạo nhiều bản ghi detailProduct liên quan đến order được tạo
        $order->detailOrder()->createMany($details);
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
