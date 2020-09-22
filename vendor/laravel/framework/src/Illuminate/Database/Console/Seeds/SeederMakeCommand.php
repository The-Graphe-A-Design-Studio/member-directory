<?php

namespace Illuminate\Database\Console\Seeds;

use Illuminate\Console\GeneratorCommand;
<<<<<<< HEAD
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

class SeederMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new seeder class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Seeder';

    /**
<<<<<<< HEAD
     * The Composer instance.
     *
     * @var \Illuminate\Support\Composer
     */
    protected $composer;

    /**
     * Create a new command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Illuminate\Support\Composer  $composer
     * @return void
     */
    public function __construct(Filesystem $files, Composer $composer)
    {
        parent::__construct($files);

        $this->composer = $composer;
    }

    /**
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();
<<<<<<< HEAD

        $this->composer->dumpAutoloads();
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/seeder.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
<<<<<<< HEAD
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
=======
        return is_file($customPath = $this->laravel->basePath(trim($stub, '/')))
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            ? $customPath
            : __DIR__.$stub;
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
<<<<<<< HEAD
        return $this->laravel->databasePath().'/seeds/'.$name.'.php';
=======
        if (is_dir($this->laravel->databasePath().'/seeds')) {
            return $this->laravel->databasePath().'/seeds/'.$name.'.php';
        } else {
            return $this->laravel->databasePath().'/seeders/'.$name.'.php';
        }
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Parse the class name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function qualifyClass($name)
    {
        return $name;
    }
}
