<?php

namespace App\Observers;

use App\Models\comments;
use App\Models\products;
use App\Models\Users;

class CommentObserver
{
    /**
     * Handle the comments "created" event.
     */
    public function created(Comments $comments): void
    {
        $user = Users::find($comments->user_id);
            $comments->user_name = $user->name;

        $product = Products::find($comments->product_id);
            $comments->product_name = $product->name;
    }

    /**
     * Handle the comments "updated" event.
     */
    public function updated(comments $comments): void
    {
        //
    }

    /**
     * Handle the comments "deleted" event.
     */
    public function deleted(comments $comments): void
    {
        //
    }

    /**
     * Handle the comments "restored" event.
     */
    public function restored(comments $comments): void
    {
        //
    }

    /**
     * Handle the comments "force deleted" event.
     */
    public function forceDeleted(comments $comments): void
    {
        //
    }
}
