<?php

namespace Illuminate\Foundation\Console;

use Exception;
use Illuminate\Console\Command;

class UpCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bring the application out of maintenance mode';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
<<<<<<< HEAD
            if (! file_exists(storage_path('framework/down'))) {
                $this->comment('Application is already up.');

                return true;
=======
            if (! is_file(storage_path('framework/down'))) {
                $this->comment('Application is already up.');

                return 0;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            }

            unlink(storage_path('framework/down'));

<<<<<<< HEAD
=======
            if (is_file(storage_path('framework/maintenance.php'))) {
                unlink(storage_path('framework/maintenance.php'));
            }

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            $this->info('Application is now live.');
        } catch (Exception $e) {
            $this->error('Failed to disable maintenance mode.');

            $this->error($e->getMessage());

            return 1;
        }
    }
}
