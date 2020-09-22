<?php

namespace Illuminate\Foundation\Bus;

use Closure;
<<<<<<< HEAD
use Illuminate\Queue\CallQueuedClosure;
=======
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Queue\CallQueuedClosure;
use Illuminate\Queue\SerializableClosure;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

class PendingChain
{
    /**
     * The class name of the job being dispatched.
     *
     * @var mixed
     */
    public $job;

    /**
     * The jobs to be chained.
     *
     * @var array
     */
    public $chain;

    /**
<<<<<<< HEAD
=======
     * The name of the connection the chain should be sent to.
     *
     * @var string|null
     */
    public $connection;

    /**
     * The name of the queue the chain should be sent to.
     *
     * @var string|null
     */
    public $queue;

    /**
     * The callbacks to be executed on failure.
     *
     * @var array
     */
    public $catchCallbacks = [];

    /**
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * Create a new PendingChain instance.
     *
     * @param  mixed  $job
     * @param  array  $chain
     * @return void
     */
    public function __construct($job, $chain)
    {
        $this->job = $job;
        $this->chain = $chain;
    }

    /**
<<<<<<< HEAD
=======
     * Set the desired connection for the job.
     *
     * @param  string|null  $connection
     * @return $this
     */
    public function onConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * Set the desired queue for the job.
     *
     * @param  string|null  $queue
     * @return $this
     */
    public function onQueue($queue)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Add a callback to be executed on job failure.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function catch($callback)
    {
        $this->catchCallbacks[] = $callback instanceof Closure
                        ? new SerializableClosure($callback)
                        : $callback;

        return $this;
    }

    /**
     * Get the "catch" callbacks that have been registered.
     *
     * @return array
     */
    public function catchCallbacks()
    {
        return $this->catchCallbacks ?? [];
    }

    /**
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * Dispatch the job with the given arguments.
     *
     * @return \Illuminate\Foundation\Bus\PendingDispatch
     */
    public function dispatch()
    {
        if (is_string($this->job)) {
            $firstJob = new $this->job(...func_get_args());
        } elseif ($this->job instanceof Closure) {
            $firstJob = CallQueuedClosure::create($this->job);
        } else {
            $firstJob = $this->job;
        }

<<<<<<< HEAD
        return (new PendingDispatch($firstJob))->chain($this->chain);
=======
        $firstJob->allOnConnection($this->connection);
        $firstJob->allOnQueue($this->queue);
        $firstJob->chain($this->chain);
        $firstJob->chainCatchCallbacks = $this->catchCallbacks();

        return app(Dispatcher::class)->dispatch($firstJob);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
