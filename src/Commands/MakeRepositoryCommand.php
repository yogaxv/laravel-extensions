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
        $stub = '/Stubs/Repository.php.stub';

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

            $this->info('Make repository success');


        } catch (\Exception $e) {
            $this->error("Error: ".$e->getMessage());
        }
    }

    protected function doOtherOperations()
    {
        // Get the fully qualified class name (FQN)
        $class = $this->qualifyClass($this->getNameInput());

        // get the destination path, based on the default namespace
        $path = $this->getPath($class);

        $content = file_get_contents($path);

        // Update the file content with additional data (regular expressions)

        file_put_contents($path, $content);
    }
}
