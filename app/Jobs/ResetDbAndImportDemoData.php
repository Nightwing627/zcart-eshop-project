<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Bus\Dispatchable;

class ResetDbAndImportDemoData
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('max_execution_time', 120); //120 seconds = 2 minutes

        Artisan::call('incevio:fresh');
        Artisan::call('incevio:demo');
    }
}
