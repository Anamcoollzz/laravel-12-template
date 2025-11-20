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
        // $this->fromSql();
        $this->normal();
    }

    /**
     * Seed the database from SQL file.
     */
    private function fromSql(): void
    {
        try {
            Schema::disableForeignKeyConstraints();
            $tables = (new DatabaseService)->getAllTableMySql(config('database.connections.mysql.database'));
            foreach ($tables as $table) {
                // DB::table($table->table)->truncate();
                Schema::dropIfExists($table->table);
            }
            // dd($tables);
            // $sql = file_get_contents(base_path('database/seeders/data/data.sql'));
            $sql = file_get_contents(base_path('database/seeders/data/laravel_12_template1.sql'));
            DB::unprepared($sql);
            $this->call(SettingSeeder::class);
            $this->call(MenuSeeder::class);
            $this->call(UserSeeder::class);
        } catch (\Exception $e) {
            echo 'Error seeding database from SQL file: ' . $e->getMessage();
        } finally {
            Schema::enableForeignKeyConstraints();
        }
    }

    /**
     * Seed the database with normal data.
     */
    private function normal()
    {
        ini_set('memory_limit', '-1');
        $this->call(RegionSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(ChatMessageSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(CrudExampleSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(FacultySeeder::class);
        $this->call(BankSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(SchoolClassSeeder::class);
        $this->call(ClassLevelSeeder::class);
        $this->call(SchoolYearSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(EducationLevelSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FingerPrintX105IdSeeder::class);
        // seeders 
    }
}
