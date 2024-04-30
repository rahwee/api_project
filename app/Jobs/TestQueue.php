<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        User::query()->firstOrCreate(
            ['phone' => $data['phone']],
            ['name' => $data['name']]
        );
    }

    public function test(Request $request){
        $data = ['name' => 'Jon Doe', 'phone' => '12345678901'];
        $this->dispatch(new TestQueue($data));
    }

    
}
