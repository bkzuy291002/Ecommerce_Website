<?php

namespace App\Observers;

use App\Models\store;

class StoreObserver
{
    /**
     * Handle the Store "created" event.
     */
    public function created(store $store): void
    {
        $store->user()->create([
            'store_id' => $store->id,
            'email' => request()->email,
            'phone' => request()->phone,
            'gender' => request()->gender,
            'password' => bcrypt(request()->password)
        ]);
    }

    /**
     * Handle the Store "updated" event.
     */
    public function updated(Store $store): void
    {
        //
    }

    /**
     * Handle the Store "deleted" event.
     */
    public function deleted(Store $store): void
    {
        //
    }

    /**
     * Handle the Store "restored" event.
     */
    public function restored(Store $store): void
    {
        //
    }

    /**
     * Handle the Store "force deleted" event.
     */
    public function forceDeleted(Store $store): void
    {
        //
    }
}
