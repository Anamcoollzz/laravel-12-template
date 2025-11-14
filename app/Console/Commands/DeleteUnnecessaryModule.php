<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DeleteUnnecessaryModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:unnecessary-module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete unnecessary module from the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('delete:module', ['module_name' => 'bank']);
        Artisan::call('delete:module', ['module_name' => 'pendidikan']);
        Artisan::call('delete:module', ['module_name' => 'crud-examples']);
        Artisan::call('delete:module', ['module_name' => 'notifikasi']);
    }
}
