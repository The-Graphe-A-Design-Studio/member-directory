<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron;

use DateTime;
use DateTimeInterface;

/**
<<<<<<< HEAD
 * Day of month field.  Allows: * , / - ? L W
=======
 * Day of month field.  Allows: * , / - ? L W.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
 *
 * 'L' stands for "last" and specifies the last day of the month.
 *
 * The 'W' character is used to specify the weekday (Monday-Friday) nearest the
 * given day. As an example, if you were to specify "15W" as the value for the
 * day-of-month field, the meaning is: "the nearest weekday to the 15th of the
 * month". So if the 15th is a Saturday, the trigger will fire on Friday the
 * 14th. If the 15th is a Sunday, the trigger will fire on Monday the 16th. If
 * the 15th is a Tuesday, then it will fire on Tuesday the 15th. However if you
 * specify "1W" as the value for day-of-month, and the 1st is a Saturday, the
 * trigger will fire on Monday the 3rd, as it will not 'jump' over the boundary
 * of a month's days. The 'W' character can only be specified when the
 * day-of-month is a single day, not a range or list of days.
 *
 * @author Michael Dowling <mtdowling@gmail.com>
 */
class DayOfMonthField extends AbstractField
{
    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritdoc}
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    protected $rangeStart = 1;

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritdoc}
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    protected $rangeEnd = 31;

    /**
<<<<<<< HEAD
     * Get the nearest day of the week for a given day in a month
     *
     * @param int $currentYear  Current year
     * @param int $currentMonth Current month
     * @param int $targetDay    Target day of the month
     *
     * @return \DateTime Returns the nearest date
     */
    private static function getNearestWeekday($currentYear, $currentMonth, $targetDay)
    {
        $tday = str_pad($targetDay, 2, '0', STR_PAD_LEFT);
        $target = DateTime::createFromFormat('Y-m-d', "$currentYear-$currentMonth-$tday");
=======
     * Get the nearest day of the week for a given day in a month.
     *
     * @param int $currentYear Current year
     * @param int $currentMonth Current month
     * @param int $targetDay Target day of the month
     *
     * @return \DateTime Returns the nearest date
     */
    private static function getNearestWeekday(int $currentYear, int $currentMonth, int $targetDay): ?DateTime
    {
        $tday = str_pad((string) $targetDay, 2, '0', STR_PAD_LEFT);
        $target = DateTime::createFromFormat('Y-m-d', "${currentYear}-${currentMonth}-${tday}");
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        $currentWeekday = (int) $target->format('N');

        if ($currentWeekday < 6) {
            return $target;
        }

        $lastDayOfMonth = $target->format('t');
<<<<<<< HEAD

        foreach (array(-1, 1, -2, 2) as $i) {
            $adjusted = $targetDay + $i;
            if ($adjusted > 0 && $adjusted <= $lastDayOfMonth) {
                $target->setDate($currentYear, $currentMonth, $adjusted);
                if ($target->format('N') < 6 && $target->format('m') == $currentMonth) {
=======
        foreach ([-1, 1, -2, 2] as $i) {
            $adjusted = $targetDay + $i;
            if ($adjusted > 0 && $adjusted <= $lastDayOfMonth) {
                $target->setDate($currentYear, $currentMonth, $adjusted);

                if ((int) $target->format('N') < 6 && (int) $target->format('m') === $currentMonth) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                    return $target;
                }
            }
        }
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function isSatisfiedBy(DateTimeInterface $date, $value)
    {
        // ? states that the field value is to be skipped
        if ($value == '?') {
=======
     * {@inheritdoc}
     */
    public function isSatisfiedBy(DateTimeInterface $date, $value): bool
    {
        // ? states that the field value is to be skipped
        if ('?' === $value) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return true;
        }

        $fieldValue = $date->format('d');

        // Check to see if this is the last day of the month
<<<<<<< HEAD
        if ($value == 'L') {
            return $fieldValue == $date->format('t');
=======
        if ('L' === $value) {
            return $fieldValue === $date->format('t');
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        }

        // Check to see if this is the nearest weekday to a particular value
        if (strpos($value, 'W')) {
            // Parse the target day
<<<<<<< HEAD
            $targetDay = substr($value, 0, strpos($value, 'W'));
            // Find out if the current day is the nearest day of the week
            return $date->format('j') == self::getNearestWeekday(
                $date->format('Y'),
                $date->format('m'),
=======
            $targetDay = (int) substr($value, 0, strpos($value, 'W'));
            // Find out if the current day is the nearest day of the week
            return $date->format('j') === self::getNearestWeekday(
                    (int) $date->format('Y'),
                    (int) $date->format('m'),
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                $targetDay
            )->format('j');
        }

<<<<<<< HEAD
        return $this->isSatisfied($date->format('d'), $value);
=======
        return $this->isSatisfied((int) $date->format('d'), $value);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
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
            $date = $date->modify('previous day')->setTime(23, 59);
        } else {
            $date = $date->modify('next day')->setTime(0, 0);
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

        // Validate that a list don't have W or L
<<<<<<< HEAD
        if (strpos($value, ',') !== false && (strpos($value, 'W') !== false || strpos($value, 'L') !== false)) {
=======
        if (false !== strpos($value, ',') && (false !== strpos($value, 'W') || false !== strpos($value, 'L'))) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return false;
        }

        if (!$basicChecks) {
<<<<<<< HEAD

            if ($value === 'L') {
=======
            if ('?' === $value) {
                return true;
            }

            if ('L' === $value) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                return true;
            }

            if (preg_match('/^(.*)W$/', $value, $matches)) {
                return $this->validate($matches[1]);
            }

            return false;
        }

        return $basicChecks;
    }
}
