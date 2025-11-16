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
    protected $signature = 'make:module {name} {--columns=} {--icon=} {--title=} {--soft-deletes=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module with controller, model, repository, request, views, migration, seeder, and permission config
    --- Example: php artisan make:module Student --columns="name:Nama,nim:NIM,birthdate:Tanggal Lahir,email:Email,password:Password" --icon="fa fa-users" --title="Mahasiswa
    --- Note: --columns is required, --icon is required, --title is required, --soft-deletes is optional`
    ';

    private $prefix, $modelName, $snake, $camel, $slug, $pluralSnake, $title;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $columns         = $this->option('columns');
        $icon            = $this->option('icon');
        $this->title = $title           = $this->option('title');
        $this->modelName = $modelName = $name = $this->argument('name');
        $softDeletes     = $this->option('soft-deletes');

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
        if ($softDeletes === null) {
            $softDeletes = false;
        }

        $columns = explode(',', $columns);
        $columnsArray = collect($columns)->transform(function ($item) {
            return explode(':', $item)[0];
        })->toArray();
        $columnsArrayWithoutPassword = array_filter($columnsArray, function ($item) {
            return $item !== 'password';
        });
        $labelsArray = collect($columns)->transform(function ($item) {
            $parts = explode(':', $item);
            return $parts[1] ?? $parts[0];
        })->toArray();

        $this->snake       = $snake       = Str::snake($name);
        $this->pluralSnake = $pluralSnake = Str::plural($snake);
        $this->prefix      = $prefix      = Str::kebab(Str::plural($name));
        $this->camel       = $camel       = Str::camel($name);
        $this->slug        = $slug        = Str::slug($name);

        $controller = base_path('app/Http/Controllers/CrudExampleController.php');
        // exec('cp ' . $controller . ' ' . ($path = base_path('app/Http/Controllers/' . $name . 'Controller.php')));
        $this->copy($controller, $path = base_path('app/Http/Controllers/' . $name . 'Controller.php'));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('crudExample', $camel, file_get_contents($path)));
        file_put_contents($path, str_replace('crud-examples', $prefix, file_get_contents($path)));
        file_put_contents($path, str_replace('crud example', $slug, file_get_contents($path)));
        file_put_contents($path, str_replace('//columns', "\n            " . implode("\n            ", array_map(fn($col) => "'$col',", $columnsArrayWithoutPassword)), file_get_contents($path)));
        file_put_contents($path, str_replace('//rostart', '$data = request()->only([', file_get_contents($path)));
        file_put_contents($path, str_replace('//roend', ']);', file_get_contents($path)));
        file_put_contents($path, str_replace('fa fa-atom', $icon, file_get_contents($path)));
        file_put_contents($path, str_replace('Contoh CRUD', $title, file_get_contents($path)));

        $model = base_path('app/Models/CrudExample.php');
        // exec('cp ' . $model . ' ' . ($path = base_path('app/Models/' . $name . '.php')));
        $this->copy($model, $path = base_path('app/Models/' . $name . '.php'));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('//columns', "\n            " . implode("\n            ", array_map(fn($col) => "'$col',", $columnsArray)), file_get_contents($path)));
        file_put_contents($path, str_replace(', SoftDeletes', '', file_get_contents($path)));
        if ($softDeletes) {
            file_put_contents($path, str_replace('//softdeletes', 'use SoftDeletes;', file_get_contents($path)));
        }
        file_put_contents($path, str_replace('crud_examples', $pluralSnake, file_get_contents($path)));

        $repository = base_path('app/Repositories/CrudExampleRepository.php');
        // exec('cp ' . $repository . ' ' . ($path = base_path('app/Repositories/' . $name . 'Repository.php')));
        $this->copy($repository, $path = base_path('app/Repositories/' . $name . 'Repository.php'));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('crud-examples', $prefix, file_get_contents($path)));
        file_put_contents($path, str_replace('crudExample', $camel, file_get_contents($path)));
        file_put_contents($path, str_replace('//columns', "\n            " . implode("\n            ", array_map(function ($col, $index) use ($columnsArray, $labelsArray) {
            return "['data' => '$col', 'name' => '$labelsArray[$index]'],";
        }, $columnsArray, array_keys($columnsArray))), file_get_contents($path)));
        file_put_contents($path, str_replace('// columns', "\n            " . implode("\n            ", array_map(function ($col, $index) use ($columnsArray, $labelsArray, $modelName) {
            return "'$col' => fn($modelName \$item) => \$item->$col,";
        }, $columnsArray, array_keys($columnsArray))), file_get_contents($path)));

        $request = base_path('app/Http/Requests/CrudExampleRequest.php');
        // exec('cp ' . $request . ' ' . ($path = base_path('app/Http/Requests/' . $name . 'Request.php')));
        $this->copy($request, $path = base_path('app/Http/Requests/' . $name . 'Request.php'));
        file_put_contents($path, str_replace('CrudExample', $name, file_get_contents($path)));
        file_put_contents($path, str_replace('// columns', "\n            " . implode("\n            ", array_map(function ($col) use ($pluralSnake) {
            if ($col === 'name') {
                return "'$col' => 'required|string|regex:/^[\\pL\\s.,]+$/u|max:50',";
            } else if ($col === 'email') {
                return "'$col' => \$this->isMethod('put') || \$this->isMethodPut || \$isMethodPut ? 'required|email|unique:$pluralSnake,$col,'.\$id.',id|max:100' : 'required|email|unique:$pluralSnake,$col|max:100',";
            } else if ($col === 'password') {
                return "'$col' => \$this->isMethod('put') || \$this->isMethodPut || \$isMethodPut ? 'nullable|string|min:6|max:50' : 'required|string|min:6|max:50',";
            } else if ($col === 'birthdate' || $col === 'date' || Str::endsWith($col, '_date')) {
                return "'$col' => 'required|date',";
            } else if ($col === 'nik') {
                return "'$col' => 'required|unique:$pluralSnake,$col|digits:16',";
            }

            return "'$col' => 'required',";
        }, $columnsArray)), file_get_contents($path)));
        file_put_contents($path, str_replace('// aa', 'return [', file_get_contents($path)));
        file_put_contents($path, str_replace('// bb', '];', file_get_contents($path)));

        $view = base_path('resources/views/stisla/crud-examples');
        // exec('rm -rf ' . ($path = base_path('resources/views/stisla/' . $prefix)));
        FacadesFile::deleteDirectory($path = base_path('resources/views/stisla/' . $prefix));
        // dd(1);
        // exec('cp -r ' . $view . ' ' . $path);
        $this->copy($view, $path = base_path('resources/views/stisla/' . $prefix));
        $views = FacadesFile::allFiles($path);
        foreach ($views as $view) {
            $fname = $view->getRealPath();
            file_put_contents($fname, str_replace('{{-- columns --}}', implode("\n\t\t", array_map(function ($col, $index) use ($labelsArray) {
                if ($col === 'password') {
                    return "{{-- <th>{{ __('" . $labelsArray[$index] . "') }}</th> --}}";
                } else if (Str::contains($col, 'email') || Str::contains($col, 'birthdate') || Str::contains($col, 'name')) {
                    return '';
                }
                return "<th>{{ __('" . $labelsArray[$index] . "') }}</th>";
            }, $columnsArray, array_keys($columnsArray))), file_get_contents($fname)));
            file_put_contents($fname, str_replace('{{-- columnstd --}}', implode("\n\t\t", array_map(function ($col, $index) use ($labelsArray) {
                if ($col === 'deleted_at') {
                    return "@include('stisla.includes.others.td-deleted-at')";
                } else if (Str::contains($col, 'email') || Str::contains($col, 'birthdate') || Str::contains($col, 'name')) {
                    return '';
                    return "@include('stisla.includes.others.td-email')";
                } else if (Str::endsWith($col, '_date') || $col === 'date' || $col === 'birthdate') {
                    return "@include('stisla.includes.others.td-datetime', ['DateTime' => \$item->$col])";
                } else if (Str::contains($col, 'image') || Str::contains($col, 'avatar') || Str::contains($col, 'photo')) {
                    return "@include('stisla.includes.others.td-image', ['file' => \$item->$col])";
                } else if (Str::contains($col, 'address')) {
                    return "@include('stisla.includes.others.td-address')";
                } else if (Str::contains($col, 'phone')) {
                    return "@include('stisla.includes.others.td-phone-number')";
                } else if ($col === 'password') {
                    return "{{-- <td>********</td> --}}";
                }

                return "<td>{{ \$item->$col }}</td>";
            }, $columnsArray, array_keys($columnsArray))), file_get_contents($fname)));
            file_put_contents($fname, str_replace(
                '{{-- formcolumns --}}',
                implode("\n", array_map(
                    function ($col, $index) use ($labelsArray) {
                        if (Str::endsWith($col, '_id')) {
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.selects.select', ['id' => '$col','name' => '$col','options' => '{$col}_options','label' => __('" . $labelsArray[$index] . "'),'required' => true,])\n\t</div>";
                        } elseif ($col === 'name' || $col === 'birthdate' || $col === 'phone_number' || $col === 'address' || $col === 'birth_date') {
                            return '';
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.inputs.input-name')\n\t</div>";
                        } elseif ($col === 'email') {
                            return '';
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.inputs.input-email')\n\t</div>";
                        } elseif ($col === 'password') {
                            return '';
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.inputs.input-password')\n\t</div>";
                        }



                        return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => '$col', 'label' => __('" . $labelsArray[$index] . "')])\n\t</div>";
                    },
                    $columnsArray,
                    array_keys($columnsArray)
                )),
                file_get_contents($fname)
            ));
            file_put_contents($fname, str_replace('crud-examples', $prefix, file_get_contents($fname)));
        }

        // get latest migration files

        // if ()
        // Artisan::call("make:migration create_" . $pluralSnake . "_table --create=" . $pluralSnake);
        $migrations = glob(database_path('migrations/*_create_' . $pluralSnake . '_table.php'));
        if (count($migrations) > 0) {
            FacadesFile::delete($migrations);
        }
        Artisan::call("make:migration create_" . $pluralSnake . "_table --create=" . $pluralSnake);
        $migrations = glob(database_path('migrations/*_create_' . $pluralSnake . '_table.php'));
        if ($migrations) {
            $latestMigration = array_reduce($migrations, function ($a, $b) {
                return filemtime($a) > filemtime($b) ? $a : $b;
            });
            // $this->info('Latest migration created: ' . $latestMigration);
        }
        $soft = "";
        if ($softDeletes) {
            $soft = "\$table->softDeletes();";
        }
        file_put_contents($latestMigration, str_replace(
            '$table->timestamps();',
            implode("\n\t\t\t", array_map(function ($col, $index) use ($softDeletes, $labelsArray) {

                if (Str::endsWith($col, '_id')) {
                    $table = Str::plural(Str::snake(substr($col, 0, -3)));
                    return "\$table->unsignedBigInteger('$col')->nullable()->comment('" . $labelsArray[$index] . "');\n\t\t\t\$table->foreign('$col')->references('id')->on('" . $table . "')->onUpdate('set null')->onDelete('set null');";
                } else if ($col === 'password') {
                    return "\$table->string('$col', 191)->comment('" . $labelsArray[$index] . "');";
                } else if ($col === 'email') {
                    return "\$table->string('$col', 191)->unique()->comment('" . $labelsArray[$index] . "');";
                } else if ($col === 'birthdate' || Str::endsWith($col, '_date') || $col === 'date') {
                    return "\$table->date('$col')->comment('" . $labelsArray[$index] . "');";
                }


                return "\$table->string('$col', 50)->comment('" . $labelsArray[$index] . "');";
            }, $columnsArray, array_keys($columnsArray))) . "

            // wajib
            \$table->timestamps();
            $soft
            \$table->unsignedBigInteger('created_by_id')->nullable()->comment('Created By');
            \$table->unsignedBigInteger('last_updated_by_id')->nullable()->comment('Last Updated By');
            \$table->foreign('created_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            \$table->foreign('last_updated_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        ",
            file_get_contents($latestMigration)
        ));

        // start seeder
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
                } else if ($col == 'birthdate' || Str::endsWith($col, '_date') || $col == 'date') {
                    return "'$col' => fake()->date(),";
                }

                return "'$col' => fake()->word(),";
            }, $columnsArray)),
            file_get_contents($seeder)
        ));

        if (Str::contains($file = file_get_contents(database_path('seeders/DatabaseSeeder.php')), '$this->call(' . $name . 'Seeder::class);') === false) {
            file_put_contents(database_path('seeders/DatabaseSeeder.php'), str_replace(
                '// seeders',
                "\$this->call(" . $name . "Seeder::class);\n        // seeders ",
                file_get_contents(database_path('seeders/DatabaseSeeder.php'))
            ));
        }


        // exec('cp ' . base_path('config/crud-example-permission.php') . ' ' . ($path = base_path('config/' . $slug . '-permission.php')));
        $this->copy(base_path('config/crud-example-permission.php'), $path = base_path('config/' . $slug . '-permission.php'));
        file_put_contents($path, str_replace('Contoh CRUD', $title, file_get_contents($path)));
        file_put_contents($path, str_replace('crud_examples', $pluralSnake, file_get_contents($path)));

        // route
        $this->generateRoute();

        if (Str::contains($file = file_get_contents(config_path('stisla.php')), "'permission' => '$title',") === false) {
            file_put_contents(config_path('stisla.php'), str_replace('// additionalmenus', "
                [
                    'menu_name' => '$title',
                    'route_name' => '$prefix.index',
                    'icon' => '$icon',
                    'permission' => '$title',
                    'is_active_if_url_includes' => '$prefix*'
                ],
                // additionalmenus", file_get_contents(config_path('stisla.php'))));
        }

        $this->info('Controller: ' . $name . 'Controller');
        $this->info('Model: ' . $name);
        $this->info('Repository: ' . $name . 'Repository');
        $this->info('Request: ' . $name . 'Request');
        $this->info('Views: ' . $prefix);
        $this->info('Migration: ' . $latestMigration);
        $this->info('Seeder: ' . $name . 'Seeder');
        $this->info('Permission Config: ' . $slug . '-permission.php');
        $this->info('Module created successfully.');
    }

    /**
     * generate route file
     *
     * @return void
     */
    private function generateRoute()
    {
        $name       = $this->modelName;
        $prefix     = $this->prefix;
        $snake      = $this->snake;
        $title = $this->title;
        $content = "
<?php

use Illuminate\Support\Facades\Route;

# $title Module Routes
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
Route::post('$prefix/duplicate/{{$snake}}', [\App\Http\Controllers\\{$name}Controller::class, 'duplicate'])->name('$prefix.duplicate');
Route::put('$prefix/restore/{{$snake}}', [\App\Http\Controllers\\{$name}Controller::class, 'restore'])->name('$prefix.restore');
Route::put('$prefix/restore-all', [\App\Http\Controllers\\{$name}Controller::class, 'restoreAll'])->name('$prefix.restore-all');
Route::delete('$prefix/force-delete/{{$snake}}', [\App\Http\Controllers\\{$name}Controller::class, 'forceDelete'])->name('$prefix.force-delete');
Route::delete('$prefix/force-delete-all', [\App\Http\Controllers\\{$name}Controller::class, 'forceDeleteAll'])->name('$prefix.force-delete-all');
Route::get('$prefix', [\App\Http\Controllers\\{$name}Controller::class, 'indexData'])->name('$prefix.index');
Route::get('$prefix/create', [\App\Http\Controllers\\{$name}Controller::class, 'createData'])->name('$prefix.create');
Route::post('$prefix', [\App\Http\Controllers\\{$name}Controller::class, 'storeData'])->name('$prefix.store');
Route::get('$prefix/{{$snake}}', [\App\Http\Controllers\\{$name}Controller::class, 'showData'])->name('$prefix.show');
Route::get('$prefix/{{$snake}}/edit', [\App\Http\Controllers\\{$name}Controller::class, 'editData'])->name('$prefix.edit');
Route::put('$prefix/{{$snake}}', [\App\Http\Controllers\\{$name}Controller::class, 'updateData'])->name('$prefix.update');
Route::delete('$prefix/{{$snake}}', [\App\Http\Controllers\\{$name}Controller::class, 'destroyData'])->name('$prefix.destroy');
// Route::resource('$prefix', \App\Http\Controllers\\{$name}Controller::class);
//route
        ";
        // $path = base_path('routes/stisla-web-auth.php');
        $path = base_path('routes/modules/' . $prefix . '-web-auth.php');
        // file_put_contents($path, str_replace('//route', $content, @file_get_contents($path)));
        file_put_contents($path, $content);
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
