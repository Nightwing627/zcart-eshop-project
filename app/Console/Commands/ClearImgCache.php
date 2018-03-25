<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearImgCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'incevio:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear cached images from storage';

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
        $this->info('Cleaning cached files.');
        Storage::deleteDirectory(image_cache_path());
        $this->info('Cache cleaned successfully.');
    }
}
