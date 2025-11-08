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
    protected $description = 'Create a new module with controller, model, repository, request, views, migration, seeder, and permission config
    --- Example: php artisan make:module Product --columns=name,price,description --icon="fa fa-box" --title="Product Management"
    --- Note: --columns is required, --icon is required, --title is required
    ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $columns = $this->option('columns');
        $icon    = $this->option('icon');
        $title   = $this->option('title');
        $name    = $this->argument('name');

        if ($name === null || $name === '') {
            $this->error('Name is required');
            return;
        }
        if ($columns === null || $columns === '') {
            $this->error('--columns is required');
            return;
        }
        if ($icon === null || $icon === '') {
            $this->error('--icon is required');
            return;
        }
        if ($title === null || $title === '') {
            $this->error('--title is required');
            return;
        }

        $columns = explode(',', $columns);

        $snake       = Str::snake($name);
        $pluralSnake = Str::plural($snake);
        $prefix      = Str::kebab(Str::plural($name));
        $camel       = Str::camel($name);
        $slug        = Str::slug($name);

        $controller = base_path('app/Http/Controllers/CrudExampleController.php');
        // exec('cp ' . $controller . ' ' . ($path = base_path('app/Http/Controllers/' . $name . 'Controller.php')));
        $this->copy($controller, $path = base_path('app/Http/Controllers/' . $name . 'Controller.php'));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('crudExample', $camel, file_get_contents($path)));
        file_put_contents($path, str_replace('crud-examples', $prefix, file_get_contents($path)));
        file_put_contents($path, str_replace('crud example', $slug, file_get_contents($path)));
        file_put_contents($path, str_replace('//columns', "\n            " . implode("\n            ", array_map(fn($col) => "'$col',", $columns)), file_get_contents($path)));
        file_put_contents($path, str_replace('fa fa-atom', $icon, file_get_contents($path)));
        file_put_contents($path, str_replace('Contoh CRUD', $title, file_get_contents($path)));

        $model = base_path('app/Models/CrudExample.php');
        // exec('cp ' . $model . ' ' . ($path = base_path('app/Models/' . $name . '.php')));
        $this->copy($model, $path = base_path('app/Models/' . $name . '.php'));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('//columns', "\n            " . implode("\n            ", array_map(fn($col) => "'$col',", $columns)), file_get_contents($path)));

        $repository = base_path('app/Repositories/CrudExampleRepository.php');
        $this->copy($repository, $path = base_path('app/Repositories/' . $name . 'Repository.php'));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('crud-examples', $prefix, file_get_contents($path)));
        file_put_contents($path, str_replace('crudExample', $camel, file_get_contents($path)));
        file_put_contents($path, str_replace('//columns', "\n            " . implode("\n            ", array_map(function ($col) {
            return "['data' => '$col', 'name' => '$col'],";
        }, $columns)), file_get_contents($path)));

        $request = base_path('app/Http/Requests/CrudExampleRequest.php');
        $this->copy($request, $path = base_path('app/Http/Requests/' . $name . 'Request.php'));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('// columns', "\n            " . implode("\n            ", array_map(function ($col) {
            if ($col === 'name') {
                return "'$col'\t\t=> 'required|string|regex:/^[\\pL\\s.,]+$/u|max:50',";
            }
            return "'$col'\t\t=> 'required',";
        }, $columns)), file_get_contents($path)));
        $view = base_path('resources/views/stisla/crud-examples');
        // exec('rm -rf ' . ($path = base_path('resources/views/stisla/' . $prefix)));
        FacadesFile::deleteDirectory($path = base_path('resources/views/stisla/' . $prefix));
        // dd(1);
        // exec('cp -r ' . $view . ' ' . $path);
        $this->copy($view, $path = base_path('resources/views/stisla/' . $prefix));
        $views = FacadesFile::allFiles($path);
        foreach ($views as $view) {
            $fname = $view->getRealPath();
            file_put_contents($fname, str_replace('{{-- columns --}}', implode("\n\t\t", array_map(fn($col) => "<th>{{ __('$col') }}</th>", $columns)), file_get_contents($fname)));
            file_put_contents($fname, str_replace('{{-- columnstd --}}', implode("\n\t\t", array_map(fn($col) => "<td>{{ \$item->$col }}</td>", $columns)), file_get_contents($fname)));
            file_put_contents($fname, str_replace(
                '{{-- formcolumns --}}',
                implode("\n", array_map(
                    function ($col) {
                        if (Str::endsWith($col, '_id')) {
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.selects.select', ['id' => '$col','name' => '$col','options' => '{$col}_options','label' => '$col','required' => true,])\n\t</div>";
                        } elseif ($col === 'name') {
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.inputs.input-name')\n\t</div>";
                        } elseif ($col === 'email') {
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.inputs.input-email')\n\t</div>";
                        } else {
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => '$col', 'label' => '$col'])\n\t</div>";
                        }
                    },
                    $columns
                )),
                file_get_contents($fname)
            ));
            file_put_contents($fname, str_replace('crud-examples', $prefix, file_get_contents($fname)));
        }

        Artisan::call("make:migration create_" . $pluralSnake . "_table --create=" . $pluralSnake);

        // exec('cp ' . base_path('database/seeders/CrudExampleSeeder.php') . ' ' . ($seeder = base_path('database/seeders/' . $name . 'Seeder.php')));
        $this->copy(base_path('database/seeders/CrudExampleSeeder.php'), $seeder = base_path('database/seeders/' . $name . 'Seeder.php'));
        file_put_contents($seeder, str_replace('CrudExample', $name, file_get_contents($seeder)));
        file_put_contents($seeder, str_replace(
            '//columns',
            implode("\n\t\t\t", array_map(function ($col) {
                if (Str::endsWith($col, '_id')) {
                    return "'$col' => fake()->word(),";
                } else if ($col == 'name') {
                    return "'$col' => fake()->name(),";
                } else if ($col == 'email') {
                    return "'$col' => fake()->email(),";
                } else {
                    return "'$col' => fake()->sentence(),";
                }
            }, $columns)),
            file_get_contents($seeder)
        ));

        // get latest migration files
        $migrations = glob(database_path('migrations/*_create_' . $pluralSnake . '_table.php'));
        if ($migrations) {
            $latestMigration = array_reduce($migrations, function ($a, $b) {
                return filemtime($a) > filemtime($b) ? $a : $b;
            });
            // $this->info('Latest migration created: ' . $latestMigration);
        }

        file_put_contents($latestMigration, str_replace(
            '$table->timestamps();',
            implode("\n\t\t\t", array_map(function ($col) {
                if (Str::endsWith($col, '_id')) {
                    $table = Str::plural(Str::snake(substr($col, 0, -3)));
                    return "\$table->unsignedBigInteger('$col')->nullable();\n\t\t\t\$table->foreign('$col')->references('id')->on('" . $table . "')->onUpdate('set null')->onDelete('set null');";
                } else {
                    return "\$table->string('$col', 50);";
                }
            }, $columns)) . "

            // wajib
            \$table->timestamps();
            \$table->unsignedBigInteger('created_by_id')->nullable();
            \$table->unsignedBigInteger('last_updated_by_id')->nullable();
            \$table->foreign('created_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            \$table->foreign('last_updated_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        ",
            file_get_contents($latestMigration)
        ));

        // exec('cp ' . base_path('config/crud-example-permission.php') . ' ' . ($path = base_path('config/' . $slug . '-permission.php')));
        $this->copy(base_path('config/crud-example-permission.php'), $path = base_path('config/' . $slug . '-permission.php'));
        file_put_contents($path, str_replace('Contoh CRUD', $title, file_get_contents($path)));

        // route
        $path = base_path('routes/stisla-web-auth.php');
        file_put_contents($path, str_replace('//route', "
# $name
Route::get('yajra-$prefix', [\App\Http\Controllers\\{$name}Controller::class, 'index'])->name('$prefix.index-yajra');
Route::get('yajra-$prefix/ajax', [\App\Http\Controllers\\{$name}Controller::class, 'yajraAjax'])->name('$prefix.ajax-yajra');
Route::get('ajax-$prefix', [\App\Http\Controllers\\{$name}Controller::class, 'index'])->name('$prefix.index-ajax');
Route::get('yajra-ajax-$prefix', [\App\Http\Controllers\\{$name}Controller::class, 'index'])->name('$prefix.index-ajax-yajra');
Route::get('$prefix/pdf', [\App\Http\Controllers\\{$name}Controller::class, 'exportPdf'])->name('$prefix.pdf');
Route::get('$prefix/csv', [\App\Http\Controllers\\{$name}Controller::class, 'exportCsv'])->name('$prefix.csv');
Route::get('$prefix/excel', [\App\Http\Controllers\\{$name}Controller::class, 'exportExcel'])->name('$prefix.excel');
Route::get('$prefix/json', [\App\Http\Controllers\\{$name}Controller::class, 'exportJson'])->name('$prefix.json');
Route::get('$prefix/import-excel-example', [\App\Http\Controllers\\{$name}Controller::class, 'importExcelExample'])->name('$prefix.import-excel-example');
Route::post('$prefix/import-excel', [\App\Http\Controllers\\{$name}Controller::class, 'importExcel'])->name('$prefix.import-excel');
Route::resource('$prefix', \App\Http\Controllers\\{$name}Controller::class);
//route", file_get_contents($path)));

        $this->info('Controller: ' . $name . 'Controller');
        $this->info('Model: ' . $name);
        $this->info('Repository: ' . $name . 'Repository');
        $this->info('Request: ' . $name . 'Request');
        $this->info('Views: ' . $prefix);
        $this->info('Migration: ' . $this->getPath($latestMigration));
        $this->info('Seeder: ' . $name . 'Seeder');
        $this->info('Permission Config: ' . $slug . '-permission.php');
        $this->info('Module created successfully.');
    }

    /**
     * copy file or directory
     *
     * @param string $src
     * @param string $dest
     * @return void
     */
    private function copy($src, $dest)
    {
        if (FacadesFile::isDirectory($dest)) FacadesFile::deleteDirectory($dest);
        FacadesFile::ensureDirectoryExists(dirname($dest));
        if (is_dir($src)) {
            FacadesFile::copyDirectory($src, $dest); // melempar exception kalau gagal
            return;
        }
        FacadesFile::copy($src, $dest); // melempar exception kalau gagal
    }

    /**
     * get path according to OS
     *
     * @param string $path
     * @return string
     */
    private function getPath($path)
    {
        if (PHP_OS === 'Windows' || PHP_OS === 'WINNT') {
            return str_replace('/', '\\', $path);
        }
        return $path;
    }
}
