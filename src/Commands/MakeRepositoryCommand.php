<?php

namespace Yogaxv\LaravelExtensions\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeRepositoryCommand extends GeneratorCommand
{
    protected $name = 'make:repository';
    protected $description = 'Create a new repository class';
    protected $type = 'repository';

    protected function getStub(): string
    {
//        return __DIR__ . '/Stubs/Repository.php.stub';
        $stub = '/Stubs/repository.plain.stub';

        return $this->resolveStubPath($stub);
    }

    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    protected function getClassName()
    {
        return $this->argument('name');
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Http\Repositories';
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            parent::handle();
        } catch (\Exception $e) {
            $this->error("Error: ".$e->getMessage());
        }
    }
}
