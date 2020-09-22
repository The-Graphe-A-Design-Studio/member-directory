<?php

namespace Illuminate\Database;

use Illuminate\Console\Command;
use Illuminate\Container\Container;
use Illuminate\Support\Arr;
use InvalidArgumentException;

abstract class Seeder
{
    /**
     * The container instance.
     *
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * The console command instance.
     *
     * @var \Illuminate\Console\Command
     */
    protected $command;

    /**
     * Seed the given connection from the given path.
     *
     * @param  array|string  $class
     * @param  bool  $silent
<<<<<<< HEAD
     * @return $this
     */
    public function call($class, $silent = false)
=======
     * @param  mixed ...$parameters
     * @return $this
     */
    public function call($class, $silent = false, ...$parameters)
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $classes = Arr::wrap($class);

        foreach ($classes as $class) {
            $seeder = $this->resolve($class);

            $name = get_class($seeder);

            if ($silent === false && isset($this->command)) {
                $this->command->getOutput()->writeln("<comment>Seeding:</comment> {$name}");
            }

            $startTime = microtime(true);

<<<<<<< HEAD
            $seeder->__invoke();

            $runTime = round(microtime(true) - $startTime, 2);

            if ($silent === false && isset($this->command)) {
                $this->command->getOutput()->writeln("<info>Seeded:</info>  {$name} ({$runTime} seconds)");
=======
            $seeder->__invoke(...$parameters);

            $runTime = number_format((microtime(true) - $startTime) * 1000, 2);

            if ($silent === false && isset($this->command)) {
                $this->command->getOutput()->writeln("<info>Seeded:</info>  {$name} ({$runTime}ms)");
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            }
        }

        return $this;
    }

    /**
     * Silently seed the given connection from the given path.
     *
     * @param  array|string  $class
<<<<<<< HEAD
     * @return void
     */
    public function callSilent($class)
    {
        $this->call($class, true);
=======
     * @param  mixed ...$parameters
     * @return void
     */
    public function callSilent($class, ...$parameters)
    {
        $this->call($class, true, ...$parameters);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Resolve an instance of the given seeder class.
     *
     * @param  string  $class
     * @return \Illuminate\Database\Seeder
     */
    protected function resolve($class)
    {
        if (isset($this->container)) {
            $instance = $this->container->make($class);

            $instance->setContainer($this->container);
        } else {
            $instance = new $class;
        }

        if (isset($this->command)) {
            $instance->setCommand($this->command);
        }

        return $instance;
    }

    /**
     * Set the IoC container instance.
     *
     * @param  \Illuminate\Container\Container  $container
     * @return $this
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Set the console command instance.
     *
     * @param  \Illuminate\Console\Command  $command
     * @return $this
     */
    public function setCommand(Command $command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Run the database seeds.
     *
<<<<<<< HEAD
=======
     * @param  mixed ...$parameters
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
<<<<<<< HEAD
    public function __invoke()
=======
    public function __invoke(...$parameters)
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        if (! method_exists($this, 'run')) {
            throw new InvalidArgumentException('Method [run] missing from '.get_class($this));
        }

        return isset($this->container)
<<<<<<< HEAD
                    ? $this->container->call([$this, 'run'])
                    : $this->run();
=======
                    ? $this->container->call([$this, 'run'], $parameters)
                    : $this->run(...$parameters);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
