<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Notifications\BookingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendWeeklyPromotion implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Booking $booking)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = $this->booking->user;

        $user->notify(
            new BookingCreated($this->booking)
        );
    }
}