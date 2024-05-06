<?php

namespace App\Jobs;

use App\Enums\Constants;
use App\Models\Room;
use App\Services\SVRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessNewRoom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $params;
    private $action;

    public $tries = 1;
    public $timeout = 600;
    /**
     * Create a new job instance.
     */
    public function __construct($params)
    {
        $this->action  = Constants::ACTION_STATUS_CREATE_ACCOUNT;
        $this->params = $params;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "ACTION : ". $this->action . PHP_EOL;
        if ($this->action == Constants::ACTION_STATUS_CREATE_ACCOUNT)
        {
            $params  = $this->params;
            Room::create($params);
            echo "Account Children Created!".PHP_EOL;
        }
    }
}
