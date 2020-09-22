<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron;

use DateTime;
use DateTimeInterface;
use InvalidArgumentException;

/**
<<<<<<< HEAD
 * Day of week field.  Allows: * / , - ? L #
=======
 * Day of week field.  Allows: * / , - ? L #.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
 *
 * Days of the week can be represented as a number 0-7 (0|7 = Sunday)
 * or as a three letter string: SUN, MON, TUE, WED, THU, FRI, SAT.
 *
 * 'L' stands for "last". It allows you to specify constructs such as
 * "the last Friday" of a given month.
 *
 * '#' is allowed for the day-of-week field, and must be followed by a
 * number between one and five. It allows you to specify constructs such as
 * "the second Friday" of a given month.
 */
class DayOfWeekField extends AbstractField
{
    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritdoc}
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    protected $rangeStart = 0;

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritdoc}
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    protected $rangeEnd = 7;

    /**
     * @var array Weekday range
     */
    protected $nthRange;

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritdoc}
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    protected $literals = [1 => 'MON', 2 => 'TUE', 3 => 'WED', 4 => 'THU', 5 => 'FRI', 6 => 'SAT', 7 => 'SUN'];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nthRange = range(1, 5);
        parent::__construct();
    }

    /**
     * @inheritDoc
     *
     * @param \DateTime|\DateTimeImmutable $date
     */
<<<<<<< HEAD
    public function isSatisfiedBy(DateTimeInterface $date, $value)
    {
        if ($value == '?') {
=======
    public function isSatisfiedBy(DateTimeInterface $date, $value): bool
    {
        if ('?' === $value) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return true;
        }

        // Convert text day of the week values to integers
        $value = $this->convertLiterals($value);

<<<<<<< HEAD
        $currentYear = $date->format('Y');
        $currentMonth = $date->format('m');
        $lastDayOfMonth = $date->format('t');

        // Find out if this is the last specific weekday of the month
        if (strpos($value, 'L')) {
            $weekday = $this->convertLiterals(substr($value, 0, strpos($value, 'L')));
            $weekday = str_replace('7', '0', $weekday);
=======
        $currentYear = (int) $date->format('Y');
        $currentMonth = (int) $date->format('m');
        $lastDayOfMonth = (int) $date->format('t');

        // Find out if this is the last specific weekday of the month
        if (strpos($value, 'L')) {
            $weekday = (int) $this->convertLiterals(substr($value, 0, strpos($value, 'L')));
            $weekday = (int) str_replace(7, 0, $weekday);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

            $tdate = clone $date;
            $tdate = $tdate->setDate($currentYear, $currentMonth, $lastDayOfMonth);
            while ($tdate->format('w') != $weekday) {
                $tdateClone = new DateTime();
                $tdate = $tdateClone
                    ->setTimezone($tdate->getTimezone())
                    ->setDate($currentYear, $currentMonth, --$lastDayOfMonth);
            }

<<<<<<< HEAD
            return $date->format('j') == $lastDayOfMonth;
=======
            return (int) $date->format('j') === $lastDayOfMonth;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        }

        // Handle # hash tokens
        if (strpos($value, '#')) {
<<<<<<< HEAD
            list($weekday, $nth) = explode('#', $value);
=======
            [$weekday, $nth] = explode('#', $value);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

            if (!is_numeric($nth)) {
                throw new InvalidArgumentException("Hashed weekdays must be numeric, {$nth} given");
            } else {
                $nth = (int) $nth;
            }

            // 0 and 7 are both Sunday, however 7 matches date('N') format ISO-8601
<<<<<<< HEAD
            if ($weekday === '0') {
                $weekday = 7;
            }

            $weekday = $this->convertLiterals($weekday);
=======
            if ('0' === $weekday) {
                $weekday = 7;
            }

            $weekday = (int) $this->convertLiterals((string) $weekday);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

            // Validate the hash fields
            if ($weekday < 0 || $weekday > 7) {
                throw new InvalidArgumentException("Weekday must be a value between 0 and 7. {$weekday} given");
            }

<<<<<<< HEAD
            if (!in_array($nth, $this->nthRange)) {
=======
            if (!\in_array($nth, $this->nthRange, true)) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                throw new InvalidArgumentException("There are never more than 5 or less than 1 of a given weekday in a month, {$nth} given");
            }

            // The current weekday must match the targeted weekday to proceed
<<<<<<< HEAD
            if ($date->format('N') != $weekday) {
=======
            if ((int) $date->format('N') !== $weekday) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                return false;
            }

            $tdate = clone $date;
            $tdate = $tdate->setDate($currentYear, $currentMonth, 1);
            $dayCount = 0;
            $currentDay = 1;
            while ($currentDay < $lastDayOfMonth + 1) {
<<<<<<< HEAD
                if ($tdate->format('N') == $weekday) {
=======
                if ((int) $tdate->format('N') === $weekday) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                    if (++$dayCount >= $nth) {
                        break;
                    }
                }
                $tdate = $tdate->setDate($currentYear, $currentMonth, ++$currentDay);
            }

<<<<<<< HEAD
            return $date->format('j') == $currentDay;
        }

        // Handle day of the week values
        if (strpos($value, '-')) {
            $parts = explode('-', $value);
            if ($parts[0] == '7') {
                $parts[0] = '0';
            } elseif ($parts[1] == '0') {
                $parts[1] = '7';
=======
            return (int) $date->format('j') === $currentDay;
        }

        // Handle day of the week values
        if (false !== strpos($value, '-')) {
            $parts = explode('-', $value);
            if ('7' === $parts[0]) {
                $parts[0] = 0;
            } elseif ('0' === $parts[1]) {
                $parts[1] = 7;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            }
            $value = implode('-', $parts);
        }

        // Test to see which Sunday to use -- 0 == 7 == Sunday
<<<<<<< HEAD
        $format = in_array(7, str_split($value)) ? 'N' : 'w';
        $fieldValue = $date->format($format);
=======
        $format = \in_array(7, array_map(function ($value) {
            return (int) $value;
        }, str_split($value)), true) ? 'N' : 'w';
        $fieldValue = (int) $date->format($format);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

        return $this->isSatisfied($fieldValue, $value);
    }

    /**
     * @inheritDoc
     *
     * @param \DateTime|\DateTimeImmutable &$date
     */
<<<<<<< HEAD
    public function increment(DateTimeInterface &$date, $invert = false)
=======
    public function increment(DateTimeInterface &$date, $invert = false): FieldInterface
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        if ($invert) {
            $date = $date->modify('-1 day')->setTime(23, 59, 0);
        } else {
            $date = $date->modify('+1 day')->setTime(0, 0, 0);
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function validate($value)
=======
     * {@inheritdoc}
     */
    public function validate(string $value): bool
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $basicChecks = parent::validate($value);

        if (!$basicChecks) {
<<<<<<< HEAD
            // Handle the # value
            if (strpos($value, '#') !== false) {
                $chunks = explode('#', $value);
                $chunks[0] = $this->convertLiterals($chunks[0]);

                if (parent::validate($chunks[0]) && is_numeric($chunks[1]) && in_array($chunks[1], $this->nthRange)) {
=======
            if ('?' === $value) {
                return true;
            }

            // Handle the # value
            if (false !== strpos($value, '#')) {
                $chunks = explode('#', $value);
                $chunks[0] = $this->convertLiterals($chunks[0]);

                if (parent::validate($chunks[0]) && is_numeric($chunks[1]) && \in_array((int) $chunks[1], $this->nthRange, true)) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                    return true;
                }
            }

            if (preg_match('/^(.*)L$/', $value, $matches)) {
                return $this->validate($matches[1]);
            }

            return false;
        }

        return $basicChecks;
    }
}
