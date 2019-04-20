<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class ClearStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'incevio:clear-storage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear attachments, images and cached files from storage';

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
        $this->call('incevio:clear-cache');

        $filesystem = new Filesystem;

        $filesystem->cleanDirectory(image_storage_dir());
        // Storage::cleanDirectory(image_storage_dir());
        $this->info('Removing images files: <info>✔</info>');

        $filesystem->cleanDirectory(attachment_storage_dir());
        // Storage::cleanDirectory(attachment_storage_dir());
        $this->info('Removing attachment files: <info>✔</info>');
    }
}
