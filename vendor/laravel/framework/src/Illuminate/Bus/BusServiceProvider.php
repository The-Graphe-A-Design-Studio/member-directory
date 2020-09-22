<?php

namespace Illuminate\Bus;

use Illuminate\Contracts\Bus\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Bus\QueueingDispatcher as QueueingDispatcherContract;
use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BusServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Dispatcher::class, function ($app) {
            return new Dispatcher($app, function ($connection = null) use ($app) {
                return $app[QueueFactoryContract::class]->connection($connection);
            });
        });

<<<<<<< HEAD
=======
        $this->registerBatchServices();

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        $this->app->alias(
            Dispatcher::class, DispatcherContract::class
        );

        $this->app->alias(
            Dispatcher::class, QueueingDispatcherContract::class
        );
    }

    /**
<<<<<<< HEAD
=======
     * Register the batch handling services.
     *
     * @return void
     */
    protected function registerBatchServices()
    {
        $this->app->singleton(BatchRepository::class, DatabaseBatchRepository::class);

        $this->app->singleton(DatabaseBatchRepository::class, function ($app) {
            return new DatabaseBatchRepository(
                $app->make(BatchFactory::class),
                $app->make('db')->connection(config('queue.batching.database')),
                config('queue.batching.table', 'job_batches'),
            );
        });
    }

    /**
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Dispatcher::class,
            DispatcherContract::class,
            QueueingDispatcherContract::class,
<<<<<<< HEAD
=======
            BatchRepository::class,
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        ];
    }
}
