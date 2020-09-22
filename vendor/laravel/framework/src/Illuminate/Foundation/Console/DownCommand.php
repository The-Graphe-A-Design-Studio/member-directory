<?php

namespace Illuminate\Foundation\Console;

use Exception;
use Illuminate\Console\Command;
<<<<<<< HEAD
use Illuminate\Support\InteractsWithTime;

class DownCommand extends Command
{
    use InteractsWithTime;

=======
use Illuminate\Foundation\Exceptions\RegisterErrorViewPaths;
use Illuminate\Support\Facades\View;

class DownCommand extends Command
{
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    /**
     * The console command signature.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $signature = 'down {--message= : The message for the maintenance mode}
                                 {--retry= : The number of seconds after which the request may be retried}
                                 {--allow=* : IP or networks allowed to access the application while in maintenance mode}';
=======
    protected $signature = 'down {--redirect= : The path that users should be redirected to}
                                 {--render= : The view that should be prerendered for display during maintenance mode}
                                 {--retry= : The number of seconds after which the request may be retried}
                                 {--secret= : The secret phrase that may be used to bypass maintenance mode}
                                 {--status=503 : The status code that should be used when returning the maintenance mode response}';
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * The console command description.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $description = 'Put the application into maintenance mode';
=======
    protected $description = 'Put the application into maintenance / demo mode';
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
<<<<<<< HEAD
            if (file_exists(storage_path('framework/down'))) {
                $this->comment('Application is already down.');

                return true;
            }

            file_put_contents(storage_path('framework/down'),
                              json_encode($this->getDownFilePayload(),
                              JSON_PRETTY_PRINT));
=======
            if (is_file(storage_path('framework/down'))) {
                $this->comment('Application is already down.');

                return 0;
            }

            file_put_contents(
                storage_path('framework/down'),
                json_encode($this->getDownFilePayload(), JSON_PRETTY_PRINT)
            );

            file_put_contents(
                storage_path('framework/maintenance.php'),
                file_get_contents(__DIR__.'/stubs/maintenance-mode.stub')
            );
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

            $this->comment('Application is now in maintenance mode.');
        } catch (Exception $e) {
            $this->error('Failed to enter maintenance mode.');

            $this->error($e->getMessage());

            return 1;
        }
    }

    /**
     * Get the payload to be placed in the "down" file.
     *
     * @return array
     */
    protected function getDownFilePayload()
    {
        return [
<<<<<<< HEAD
            'time' => $this->currentTime(),
            'message' => $this->option('message'),
            'retry' => $this->getRetryTime(),
            'allowed' => $this->option('allow'),
=======
            'redirect' => $this->redirectPath(),
            'retry' => $this->getRetryTime(),
            'secret' => $this->option('secret'),
            'status' => (int) $this->option('status', 503),
            'template' => $this->option('render') ? $this->prerenderView() : null,
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        ];
    }

    /**
<<<<<<< HEAD
=======
     * Get the path that users should be redirected to.
     *
     * @return string
     */
    protected function redirectPath()
    {
        if ($this->option('redirect') && $this->option('redirect') !== '/') {
            return '/'.trim($this->option('redirect'), '/');
        }

        return $this->option('redirect');
    }

    /**
     * Prerender the specified view so that it can be rendered even before loading Composer.
     *
     * @return string
     */
    protected function prerenderView()
    {
        (new RegisterErrorViewPaths)();

        return view($this->option('render'))->render();
    }

    /**
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * Get the number of seconds the client should wait before retrying their request.
     *
     * @return int|null
     */
    protected function getRetryTime()
    {
        $retry = $this->option('retry');

        return is_numeric($retry) && $retry > 0 ? (int) $retry : null;
    }
}
