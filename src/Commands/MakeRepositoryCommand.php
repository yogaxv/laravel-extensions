<?php

namespace Yogaxv\LaravelExtensions\Commands;

use Illuminate\Console\Command;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name : New Repository Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new repository';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // TODO HANDLE COMMAND
        $this->info('Make repository success');
    }
}
