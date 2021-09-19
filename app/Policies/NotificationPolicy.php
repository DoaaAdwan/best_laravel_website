<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Notifications\DatabaseNotification;

class NotificationPolicy
{
    use HandlesAuthorization;

    const MARK_AS_READ = 'markAsRead';
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function markAsRead(Order $order, DatabaseNotification $notification): bool
    {
        return $notification->notifiable()->is($order);
    }
}
