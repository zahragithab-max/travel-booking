<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $booking)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
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
