<?php

namespace Illuminate\Queue;

class WorkerOptions
{
    /**
<<<<<<< HEAD
     * The number of seconds before a released job will be available.
     *
     * @var int
     */
    public $delay;
=======
     * The name of the worker.
     *
     * @var int
     */
    public $name;

    /**
     * The number of seconds to wait before retrying a job that encountered an uncaught exception.
     *
     * @var int
     */
    public $backoff;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * The maximum amount of RAM the worker may consume.
     *
     * @var int
     */
    public $memory;

    /**
     * The maximum number of seconds a child worker may run.
     *
     * @var int
     */
    public $timeout;

    /**
     * The number of seconds to wait in between polling the queue.
     *
     * @var int
     */
    public $sleep;

    /**
     * The maximum amount of times a job may be attempted.
     *
     * @var int
     */
    public $maxTries;

    /**
     * Indicates if the worker should run in maintenance mode.
     *
     * @var bool
     */
    public $force;

    /**
     * Indicates if the worker should stop when queue is empty.
     *
     * @var bool
     */
    public $stopWhenEmpty;

    /**
<<<<<<< HEAD
     * Create a new worker options instance.
     *
     * @param  int  $delay
=======
     * The maximum number of jobs to run.
     *
     * @var int
     */
    public $maxJobs;

    /**
     * The maximum number of seconds a worker may live.
     *
     * @var int
     */
    public $maxTime;

    /**
     * Create a new worker options instance.
     *
     * @param  string  $name
     * @param  int  $backoff
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @param  int  $memory
     * @param  int  $timeout
     * @param  int  $sleep
     * @param  int  $maxTries
     * @param  bool  $force
     * @param  bool  $stopWhenEmpty
<<<<<<< HEAD
     * @return void
     */
    public function __construct($delay = 0, $memory = 128, $timeout = 60, $sleep = 3, $maxTries = 1, $force = false, $stopWhenEmpty = false)
    {
        $this->delay = $delay;
=======
     * @param  int  $maxJobs
     * @param  int  $maxTime
     * @return void
     */
    public function __construct($name = 'default', $backoff = 0, $memory = 128, $timeout = 60, $sleep = 3, $maxTries = 1,
                                $force = false, $stopWhenEmpty = false, $maxJobs = 0, $maxTime = 0)
    {
        $this->name = $name;
        $this->backoff = $backoff;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        $this->sleep = $sleep;
        $this->force = $force;
        $this->memory = $memory;
        $this->timeout = $timeout;
        $this->maxTries = $maxTries;
        $this->stopWhenEmpty = $stopWhenEmpty;
<<<<<<< HEAD
=======
        $this->maxJobs = $maxJobs;
        $this->maxTime = $maxTime;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
