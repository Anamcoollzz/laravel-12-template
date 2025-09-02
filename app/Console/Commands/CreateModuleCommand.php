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
            $fname = $view->getRealPath();
            file_put_contents($fname, str_replace('{{-- columns --}}', implode("\n\t\t", array_map(fn($col) => "<th>{{ __('$col') }}</th>", $columns)), file_get_contents($fname)));
            file_put_contents($fname, str_replace('{{-- columnstd --}}', implode("\n\t\t", array_map(fn($col) => "<td>{{ \$item->$col }}</td>", $columns)), file_get_contents($fname)));
            file_put_contents($fname, str_replace(
                '{{-- formcolumns --}}',
                implode("\n", array_map(
                    function ($col) {
                        if (Str::endsWith($col, '_id')) {
                            return "<div class=\"col-md-6\">\n\t\t@include('stisla.includes.forms.selects.select', ['id' => '$col','name' => '$col','options' => '{$col}_options','label' => '$col','required' => true,])\n\t</div>";
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

        exec('cp ' . base_path('database/seeders/CrudExampleSeeder.php') . ' ' . ($seeder = base_path('database/seeders/' . $name . 'Seeder.php')));
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

        exec('cp ' . base_path('config/example-crud-permission.php') . ' ' . ($path = base_path('config/' . Str::slug($name) . '-permission.php')));
        file_put_contents($path, str_replace('Contoh CRUD', $title, file_get_contents($path)));

        $this->info('Controller: ' . $name . 'Controller');
        $this->info('Model: ' . $name);
        $this->info('Repository: ' . $name . 'Repository');
        $this->info('Request: ' . $name . 'Request');
        $this->info('Views: ' . $prefix);
        $this->info('Migration: ' . $latestMigration);
        $this->info('Seeder: ' . $name . 'Seeder');
        $this->info('Permission Config: ' . Str::slug($name) . '-permission.php');
        $this->info('Module created successfully.');
    }
}
