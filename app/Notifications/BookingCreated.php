<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingCreated extends Notification
{
    use Queueable;

    public function __construct(public $booking)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('رزرو بلیت شما با موفقیت ثبت شد 🎫')
            ->greeting('سلام ' . $notifiable->name . ' 👋')
            ->line('رزرو بلیت شما با موفقیت ثبت شد.')
            ->line('کد پیگیری: ' . $this->booking->tracking_code)
            ->line('مبدأ: ' . $this->booking->from)
            ->line('مقصد: ' . $this->booking->to)
            ->line('تعداد مسافر: ' . $this->booking->passengers)
            ->line('مبلغ: ' . number_format($this->booking->price) . ' تومان')
            ->line('از خرید شما متشکریم ❤️');
    }
}