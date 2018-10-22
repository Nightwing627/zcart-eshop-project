<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResetDemoApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'incevio:reset-demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the demo application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set('max_execution_time', 180); //180 seconds = 2 minutes

        $this->call('down'); // Maintenance mode on

        $this->call('incevio:fresh');

        $this->call('incevio:demo');

        $this->call('up'); // Maintenance mode off
    }
}
