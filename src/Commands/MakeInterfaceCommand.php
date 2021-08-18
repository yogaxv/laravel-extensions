<?php

namespace Yogaxv\LaravelExtensions\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeInterfaceCommand extends GeneratorCommand
{
    protected $name = 'make:interface';
    protected $description = 'Create a new interface class';
    protected $type = 'interface';

    protected function getStub(): string
    {
        $stub = '/Stubs/interface.plain.stub';

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
        return $rootNamespace.'\Http\Interfaces';
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
