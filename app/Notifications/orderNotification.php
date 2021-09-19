<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class orderNotification extends Notification
{
    use Queueable;
    protected $order_notify;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order_notify)
    {
        $this->order_notify = $order_notify;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toDatabase($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id'=> $this->order_notify->id,
            'user_name' =>$this->order_notify->user_name,
            'data' => $this->order_notify->product_name,
            'time' =>$this->order_notify->created_at->diffForHumans(),
        ];
    }
}
