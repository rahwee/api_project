<?php

namespace App\Jobs;

use App\Models\Room;
use App\Enums\Constants;
use App\Services\SVRoom;
use App\Mail\SampleEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessNewRoom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $params;
    private $action;
    public $status;
    public $email = "rahweekh@gmail.com";
    public $tries = 1;
    public $timeout = 600;
    /**
     * Create a new job instance.
     */
    public function __construct(Room $room)
    {
        $this->status = $room->status;
        $this->email = $this->email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $now = now();
        Mail::to($this->email)->later(
            $now->addSecond(5), 
            new SampleEmail($this->status)
        );
    }
}
