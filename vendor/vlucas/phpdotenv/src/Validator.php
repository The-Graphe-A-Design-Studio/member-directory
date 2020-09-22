<?php

<<<<<<< HEAD
namespace Dotenv;

use Dotenv\Exception\ValidationException;
use Dotenv\Regex\Regex;
use Dotenv\Repository\RepositoryInterface;
=======
declare(strict_types=1);

namespace Dotenv;

use Dotenv\Exception\ValidationException;
use Dotenv\Repository\RepositoryInterface;
use Dotenv\Util\Regex;
use Dotenv\Util\Str;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

class Validator
{
    /**
     * The environment repository instance.
     *
     * @var \Dotenv\Repository\RepositoryInterface
     */
<<<<<<< HEAD
    protected $repository;
=======
    private $repository;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * The variables to validate.
     *
     * @var string[]
     */
<<<<<<< HEAD
    protected $variables;
=======
    private $variables;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Create a new validator instance.
     *
     * @param \Dotenv\Repository\RepositoryInterface $repository
     * @param string[]                               $variables
<<<<<<< HEAD
     * @param bool                                   $required
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(RepositoryInterface $repository, array $variables, $required = true)
    {
        $this->repository = $repository;
        $this->variables = $variables;

        if ($required) {
            $this->assertCallback(
                function ($value) {
                    return $value !== null;
                },
                'is missing'
            );
        }
=======
    public function __construct(RepositoryInterface $repository, array $variables)
    {
        $this->repository = $repository;
        $this->variables = $variables;
    }

    /**
     * Assert that each variable is present.
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function required()
    {
        return $this->assert(
            static function (?string $value) {
                return $value !== null;
            },
            'is missing'
        );
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Assert that each variable is not empty.
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function notEmpty()
    {
<<<<<<< HEAD
        return $this->assertCallback(
            function ($value) {
                if ($value === null) {
                    return true;
                }

                return strlen(trim($value)) > 0;
=======
        return $this->assertNullable(
            static function (string $value) {
                return Str::len(\trim($value)) > 0;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            },
            'is empty'
        );
    }

    /**
     * Assert that each specified variable is an integer.
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function isInteger()
    {
<<<<<<< HEAD
        return $this->assertCallback(
            function ($value) {
                if ($value === null) {
                    return true;
                }

                return ctype_digit($value);
=======
        return $this->assertNullable(
            static function (string $value) {
                return \ctype_digit($value);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            },
            'is not an integer'
        );
    }

    /**
     * Assert that each specified variable is a boolean.
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function isBoolean()
    {
<<<<<<< HEAD
        return $this->assertCallback(
            function ($value) {
                if ($value === null) {
                    return true;
                }

=======
        return $this->assertNullable(
            static function (string $value) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                if ($value === '') {
                    return false;
                }

<<<<<<< HEAD
                return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null;
=======
                return \filter_var($value, \FILTER_VALIDATE_BOOLEAN, \FILTER_NULL_ON_FAILURE) !== null;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            },
            'is not a boolean'
        );
    }

    /**
     * Assert that each variable is amongst the given choices.
     *
     * @param string[] $choices
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function allowedValues(array $choices)
    {
<<<<<<< HEAD
        return $this->assertCallback(
            function ($value) use ($choices) {
                if ($value === null) {
                    return true;
                }

                return in_array($value, $choices, true);
            },
            sprintf('is not one of [%s]', implode(', ', $choices))
=======
        return $this->assertNullable(
            static function (string $value) use ($choices) {
                return \in_array($value, $choices, true);
            },
            \sprintf('is not one of [%s]', \implode(', ', $choices))
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        );
    }

    /**
     * Assert that each variable matches the given regular expression.
     *
     * @param string $regex
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
<<<<<<< HEAD
    public function allowedRegexValues($regex)
    {
        return $this->assertCallback(
            function ($value) use ($regex) {
                if ($value === null) {
                    return true;
                }

                return Regex::match($regex, $value)->success()->getOrElse(0) === 1;
            },
            sprintf('does not match "%s"', $regex)
=======
    public function allowedRegexValues(string $regex)
    {
        return $this->assertNullable(
            static function (string $value) use ($regex) {
                return Regex::matches($regex, $value)->success()->getOrElse(false);
            },
            \sprintf('does not match "%s"', $regex)
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        );
    }

    /**
     * Assert that the callback returns true for each variable.
     *
<<<<<<< HEAD
     * @param callable $callback
     * @param string   $message
=======
     * @param callable(?string):bool $callback
     * @param string                 $message
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
<<<<<<< HEAD
    protected function assertCallback(callable $callback, $message = 'failed callback assertion')
=======
    private function assert(callable $callback, string $message)
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $failing = [];

        foreach ($this->variables as $variable) {
            if ($callback($this->repository->get($variable)) === false) {
<<<<<<< HEAD
                $failing[] = sprintf('%s %s', $variable, $message);
            }
        }

        if (count($failing) > 0) {
            throw new ValidationException(sprintf(
                'One or more environment variables failed assertions: %s.',
                implode(', ', $failing)
=======
                $failing[] = \sprintf('%s %s', $variable, $message);
            }
        }

        if (\count($failing) > 0) {
            throw new ValidationException(\sprintf(
                'One or more environment variables failed assertions: %s.',
                \implode(', ', $failing)
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            ));
        }

        return $this;
    }
<<<<<<< HEAD
=======

    /**
     * Assert that the callback returns true for each variable.
     *
     * Skip checking null variable values.
     *
     * @param callable(string):bool $callback
     * @param string                $message
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    private function assertNullable(callable $callback, string $message)
    {
        return $this->assert(
            static function (?string $value) use ($callback) {
                if ($value === null) {
                    return true;
                }

                return $callback($value);
            },
            $message
        );
    }
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
}
