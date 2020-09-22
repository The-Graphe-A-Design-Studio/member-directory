<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron;

use DateTimeInterface;

/**
<<<<<<< HEAD
 * CRON field interface
=======
 * CRON field interface.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
 */
interface FieldInterface
{
    /**
<<<<<<< HEAD
     * Check if the respective value of a DateTime field satisfies a CRON exp
=======
     * Check if the respective value of a DateTime field satisfies a CRON exp.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param DateTimeInterface $date  DateTime object to check
     * @param string            $value CRON expression to test against
     *
     * @return bool Returns TRUE if satisfied, FALSE otherwise
     */
<<<<<<< HEAD
    public function isSatisfiedBy(DateTimeInterface $date, $value);

    /**
     * When a CRON expression is not satisfied, this method is used to increment
     * or decrement a DateTime object by the unit of the cron field
=======
    public function isSatisfiedBy(DateTimeInterface $date, $value): bool;

    /**
     * When a CRON expression is not satisfied, this method is used to increment
     * or decrement a DateTime object by the unit of the cron field.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param DateTimeInterface &$date  DateTime object to change
     * @param bool              $invert (optional) Set to TRUE to decrement
     *
     * @return FieldInterface
     */
<<<<<<< HEAD
    public function increment(DateTimeInterface &$date, $invert = false);

    /**
     * Validates a CRON expression for a given field
=======
    public function increment(DateTimeInterface &$date, $invert = false): FieldInterface;

    /**
     * Validates a CRON expression for a given field.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param string $value CRON expression value to validate
     *
     * @return bool Returns TRUE if valid, FALSE otherwise
     */
<<<<<<< HEAD
    public function validate($value);
=======
    public function validate(string $value): bool;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
}
