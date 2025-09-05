<?php

namespace App\Console\Commands;

use App\Models\Menu;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class SetToProductionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set-to-production';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set application to production mode';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Permission::query()->where('name', 'like', '%Contoh CRUD%')->delete();
        Menu::query()->where('menu_name', 'like', '%Contoh CRUD%')->delete();
        Menu::query()->where('menu_name', 'like', '%Stisla Example%')->delete();
    }
}
