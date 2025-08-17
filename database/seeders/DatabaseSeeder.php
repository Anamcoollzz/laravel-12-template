<?php

namespace Database\Seeders;

use App\Services\DatabaseService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->fromSql();

        // $this->call(RegionSeeder::class);
        // $this->call(SettingSeeder::class);
        // $this->call(RolePermissionSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(MenuSeeder::class);
        // $this->call(NotificationSeeder::class);
        // $this->call(CrudExampleSeeder::class);
        // $this->call(BankSeeder::class);
    }

    /**
     * Seed the database from SQL file.
     */
    private function fromSql(): void
    {
        Schema::disableForeignKeyConstraints();
        $tables = (new DatabaseService)->getAllTableMySql(config('database.connections.mysql.database'));
        foreach ($tables as $table) {
            DB::table($table->table)->truncate();
        }
        // dd($tables);
        $sql = file_get_contents(base_path('database/seeders/data/data.sql'));
        DB::unprepared($sql);
    }
}
