<?php

namespace App\Jobs;

use App\Models\Call;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class RouteCallJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Call $call)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $next = User::inStatus('active')->first();

        $next->calls()->associate($this->call);

        $this->call->update(['accepted_at' => now()]);
    }
}
