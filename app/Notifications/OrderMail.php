<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class OrderMail extends Notification implements ShouldQueue
{
    use Queueable;

    private Order $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     *
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
//        $datalist = Orderitem::where('user_id', Auth::id())->where('order_id', $this->order->id)->get();
//        return (new MailMessage)->view(
//            'emails.order', ['datalist' => $datalist]
//        );
        return (new MailMessage)
            ->subject('Şiparişiniz alındı.')
            ->greeting('Sayın '. $this->order->name)
            ->line($this->order->total . '€ fiyatındaki şiparişiniz '. $this->order->created_at. ' tarihinde alınmıştır.')
            ->action('Şipariş Detayı', url('/user/order'))
            ->line('Bizi tercih ettiğiniz için Teşekkürler')
            ->line('İyi Günler Dileriz.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
