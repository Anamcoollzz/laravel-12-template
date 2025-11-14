<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class DeleteModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:module {module_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a module from the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $moduleName = $this->argument('module_name');

        if (empty($moduleName)) {
            $this->error('Module name is required.');
            return 1;
        }

        Schema::disableForeignKeyConstraints();
        if ($moduleName === 'bank') {
            Schema::dropIfExists('bank_deposit_histories');
            Schema::dropIfExists('bank_deposits');
            Schema::dropIfExists('banks');
            $this->info("Module 'bank' and its associated tables have been deleted.");
            return 0;
        } else if ($moduleName === 'pendidikan') {
            Schema::dropIfExists('faculty_leaders');
            Schema::dropIfExists('ormawas');
            Schema::dropIfExists('works');
            Schema::dropIfExists('faculties');
            Schema::dropIfExists('study_programs');
            Schema::dropIfExists('students');
            $this->info("Module 'pendidikan' and its associated tables have been deleted.");
            return 0;
        } else if ($moduleName === 'crud-examples') {
            Schema::dropIfExists('crud_examples');
            $this->info("Module 'crud-examples' and its associated tables have been deleted.");
            return 0;
        } else if ($moduleName === 'notifikasi') {
            Schema::dropIfExists('notifications');
            $this->info("Module 'notifikasi' and its associated tables have been deleted.");
            return 0;
        } else {
            $this->error("Module '$moduleName' not found or cannot be deleted.");
            return 1;
        }
        Schema::enableForeignKeyConstraints();
    }
}
