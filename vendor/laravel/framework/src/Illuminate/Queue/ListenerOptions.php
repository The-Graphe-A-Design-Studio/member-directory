<?php

namespace Illuminate\Queue;

class ListenerOptions extends WorkerOptions
{
    /**
     * The environment the worker should run in.
     *
     * @var string
     */
    public $environment;

    /**
     * Create a new listener options instance.
     *
<<<<<<< HEAD
     * @param  string|null  $environment
     * @param  int  $delay
=======
     * @param  string  $name
     * @param  string|null  $environment
     * @param  int  $backoff
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @param  int  $memory
     * @param  int  $timeout
     * @param  int  $sleep
     * @param  int  $maxTries
     * @param  bool  $force
     * @return void
     */
<<<<<<< HEAD
    public function __construct($environment = null, $delay = 0, $memory = 128, $timeout = 60, $sleep = 3, $maxTries = 1, $force = false)
    {
        $this->environment = $environment;

        parent::__construct($delay, $memory, $timeout, $sleep, $maxTries, $force);
=======
    public function __construct($name = 'default', $environment = null, $backoff = 0, $memory = 128, $timeout = 60, $sleep = 3, $maxTries = 1, $force = false)
    {
        $this->environment = $environment;

        parent::__construct($name, $backoff, $memory, $timeout, $sleep, $maxTries, $force);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
