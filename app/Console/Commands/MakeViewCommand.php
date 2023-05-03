<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewCommand extends Command
{
    protected $signature = 'make:view {name : The name of the view}';

    protected $description = 'Create a new view file.';

    public function handle()
    {
        $name = $this->argument('name');

        $path = resource_path('views/' . str_replace('.', '/', $name) . '.blade.php');

        File::ensureDirectoryExists(dirname($path));

        File::put($path, '');

        $this->info('View created successfully.');
    }
}
