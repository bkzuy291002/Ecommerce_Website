<?php

namespace App\Observers;

use App\Models\store;

class infoStroreObserver
{
    /**
     * Handle the store "created" event.
     */
    public function created(store $store): void
    {
        $store->user()->create([
            'phone' => $store->phone,
            'gender' => $store->gender,
            'email' => request()->email,
            'password' => bcrypt(request()->password)
        ]);
    }

    /**
     * Handle the store "updated" event.
     */
    public function updated(store $store): void
    {
        //
    }

    /**
     * Handle the store "deleted" event.
     */
    public function deleted(store $store): void
    {
        //
    }

    /**
     * Handle the store "restored" event.
     */
    public function restored(store $store): void
    {
        //
    }

    /**
     * Handle the store "force deleted" event.
     */
    public function forceDeleted(store $store): void
    {
        //
    }
}
