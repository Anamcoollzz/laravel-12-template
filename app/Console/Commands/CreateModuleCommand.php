<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class CreateModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name} {--columns=} {--icon=} {--title=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $columns = $this->option('columns');
        $columns = explode(',', $columns);

        $icon = $this->option('icon');
        $title = $this->option('title');

        $name = $this->argument('name');
        $snake = Str::snake($name);
        $pluralSnake = Str::plural($snake);
        $prefix = Str::kebab(Str::plural($name));

        $controller = base_path('app/Http/Controllers/CrudExampleController.php');
        exec('cp ' . $controller . ' ' . ($path = base_path('app/Http/Controllers/' . $name . 'Controller.php')));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('crudExample', Str::camel($name), file_get_contents($path)));
        file_put_contents($path, str_replace('crud-examples', $prefix, file_get_contents($path)));
        file_put_contents($path, str_replace('crud example', Str::slug($name), file_get_contents($path)));
        file_put_contents($path, str_replace('//columns', "\n            " . implode("\n            ", array_map(fn($col) => "'$col',", $columns)), file_get_contents($path)));
        file_put_contents($path, str_replace('fa fa-atom', $icon, file_get_contents($path)));
        file_put_contents($path, str_replace('Contoh CRUD', $title, file_get_contents($path)));

        $model = base_path('app/Models/CrudExample.php');
        exec('cp ' . $model . ' ' . ($path = base_path('app/Models/' . $name . '.php')));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('//columns', "\n            " . implode("\n            ", array_map(fn($col) => "'$col',", $columns)), file_get_contents($path)));

        $repository = base_path('app/Repositories/CrudExampleRepository.php');
        exec('cp ' . $repository . ' ' . ($path = base_path('app/Repositories/' . $name . 'Repository.php')));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));

        $request = base_path('app/Http/Requests/CrudExampleRequest.php');
        exec('cp ' . $request . ' ' . ($path = base_path('app/Http/Requests/' . $name . 'Request.php')));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('// columns', "\n            " . implode("\n            ", array_map(fn($col) => "'$col'\t\t=> 'required',", $columns)), file_get_contents($path)));

        $view = base_path('resources/views/stisla/crud-examples');
        exec('rm -rf ' . ($path = base_path('resources/views/stisla/' . $prefix)));
        exec('cp -r ' . $view . ' ' . $path);
        $views = FacadesFile::allFiles($path);
        foreach ($views as $view) {
            file_put_contents($view->getRealPath(), str_replace('{{-- columns --}}', implode("\n\t\t", array_map(fn($col) => "<th>{{ __('$col') }}</th>", $columns)), file_get_contents($view->getRealPath())));
            file_put_contents($view->getRealPath(), str_replace('{{-- columnstd --}}', implode("\n\t\t", array_map(fn($col) => "<td>{{ \$item->$col }}</td>", $columns)), file_get_contents($view->getRealPath())));
            file_put_contents($view->getRealPath(), str_replace('crud-examples', $prefix, file_get_contents($view->getRealPath())));
        }

        Artisan::call("make:migration create_" . $pluralSnake . "_table --create=" . $pluralSnake);

        // get latest migration files
        $migrations = glob(database_path('migrations/*_create_' . $pluralSnake . '_table.php'));
        if ($migrations) {
            $latestMigration = array_reduce($migrations, function ($a, $b) {
                return filemtime($a) > filemtime($b) ? $a : $b;
            });
            $this->info('Latest migration created: ' . $latestMigration);
        }

        file_put_contents($latestMigration, str_replace('$table->timestamps();', "
            // wajib
            \$table->timestamps();
            \$table->unsignedBigInteger('created_by_id')->nullable();
            \$table->unsignedBigInteger('last_updated_by_id')->nullable();
            \$table->foreign('created_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            \$table->foreign('last_updated_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        ", file_get_contents($latestMigration)));

        $this->info('Controller: ' . $name . 'Controller');
        $this->info('Model: ' . $name);
        $this->info('Repository: ' . $name . 'Repository');
        $this->info('Request: ' . $name . 'Request');
        $this->info('Views: ' . Str::plural(Str::slug($name)));
        $this->info('Migration: ' . $latestMigration);
        $this->info('Module created successfully.');
    }
}
