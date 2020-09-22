<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD
use RuntimeException;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

class StorageLinkCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'storage:link {--relative : Create the symbolic link using relative paths}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the symbolic links configured for the application';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
        foreach ($this->links() as $link => $target) {
            if (file_exists($link)) {
                $this->error("The [$link] link already exists.");
            } else {
                if ($this->option('relative')) {
                    $target = $this->getRelativeTarget($link, $target);
                }

                $this->laravel->make('files')->link($target, $link);

                $this->info("The [$link] link has been connected to [$target].");
            }
=======
        $relative = $this->option('relative');

        foreach ($this->links() as $link => $target) {
            if (file_exists($link)) {
                $this->error("The [$link] link already exists.");
                continue;
            }

            if ($relative) {
                $this->laravel->make('files')->relativeLink($target, $link);
            } else {
                $this->laravel->make('files')->link($target, $link);
            }

            $this->info("The [$link] link has been connected to [$target].");
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        }

        $this->info('The links have been created.');
    }

    /**
     * Get the symbolic links that are configured for the application.
     *
     * @return array
     */
    protected function links()
    {
        return $this->laravel['config']['filesystems.links'] ??
               [public_path('storage') => storage_path('app/public')];
    }
<<<<<<< HEAD

    /**
     * Get the relative path to the target.
     *
     * @param  string  $link
     * @param  string  $target
     * @return string
     */
    protected function getRelativeTarget($link, $target)
    {
        if (! class_exists(SymfonyFilesystem::class)) {
            throw new RuntimeException('To enable support for relative links, please install the symfony/filesystem package.');
        }

        return (new SymfonyFilesystem)->makePathRelative($target, dirname($link));
    }
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
}
