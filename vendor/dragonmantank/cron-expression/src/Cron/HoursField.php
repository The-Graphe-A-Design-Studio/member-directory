<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron;

use DateTimeInterface;
use DateTimeZone;

/**
<<<<<<< HEAD
 * Hours field.  Allows: * , / -
=======
 * Hours field.  Allows: * , / -.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
 */
class HoursField extends AbstractField
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
    protected $rangeEnd = 23;

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function isSatisfiedBy(DateTimeInterface $date, $value)
    {
        if ($value == '?') {
            return true;
        }

        return $this->isSatisfied($date->format('H'), $value);
    }

    /**
     * {@inheritDoc}
=======
     * {@inheritdoc}
     */
    public function isSatisfiedBy(DateTimeInterface $date, $value): bool
    {
        return $this->isSatisfied((int) $date->format('H'), $value);
    }

    /**
     * {@inheritdoc}
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param \DateTime|\DateTimeImmutable &$date
     * @param string|null                  $parts
     */
<<<<<<< HEAD
    public function increment(DateTimeInterface &$date, $invert = false, $parts = null)
=======
    public function increment(DateTimeInterface &$date, $invert = false, $parts = null): FieldInterface
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        // Change timezone to UTC temporarily. This will
        // allow us to go back or forwards and hour even
        // if DST will be changed between the hours.
<<<<<<< HEAD
        if (is_null($parts) || $parts == '*') {
=======
        if (null === $parts || '*' === $parts) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            $timezone = $date->getTimezone();
            $date = $date->setTimezone(new DateTimeZone('UTC'));
            $date = $date->modify(($invert ? '-' : '+') . '1 hour');
            $date = $date->setTimezone($timezone);

<<<<<<< HEAD
            $date = $date->setTime($date->format('H'), $invert ? 59 : 0);
            return $this;
        }

        $parts = strpos($parts, ',') !== false ? explode(',', $parts) : array($parts);
        $hours = array();
=======
            $date = $date->setTime((int)$date->format('H'), $invert ? 59 : 0);
            return $this;
        }

        $parts = false !== strpos($parts, ',') ? explode(',', $parts) : [$parts];
        $hours = [];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        foreach ($parts as $part) {
            $hours = array_merge($hours, $this->getRangeForExpression($part, 23));
        }

        $current_hour = $date->format('H');
<<<<<<< HEAD
        $position = $invert ? count($hours) - 1 : 0;
        if (count($hours) > 1) {
            for ($i = 0; $i < count($hours) - 1; $i++) {
                if ((!$invert && $current_hour >= $hours[$i] && $current_hour < $hours[$i + 1]) ||
                    ($invert && $current_hour > $hours[$i] && $current_hour <= $hours[$i + 1])) {
                    $position = $invert ? $i : $i + 1;
=======
        $position = $invert ? \count($hours) - 1 : 0;
        $countHours = \count($hours);
        if ($countHours > 1) {
            for ($i = 0; $i < $countHours - 1; ++$i) {
                if ((!$invert && $current_hour >= $hours[$i] && $current_hour < $hours[$i + 1]) ||
                    ($invert && $current_hour > $hours[$i] && $current_hour <= $hours[$i + 1])) {
                    $position = $invert ? $i : $i + 1;

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                    break;
                }
            }
        }

<<<<<<< HEAD
        $hour = $hours[$position];
        if ((!$invert && $date->format('H') >= $hour) || ($invert && $date->format('H') <= $hour)) {
            $date = $date->modify(($invert ? '-' : '+') . '1 day');
            $date = $date->setTime($invert ? 23 : 0, $invert ? 59 : 0);
        }
        else {
=======
        $hour = (int) $hours[$position];
        if ((!$invert && (int) $date->format('H') >= $hour) || ($invert && (int) $date->format('H') <= $hour)) {
            $date = $date->modify(($invert ? '-' : '+') . '1 day');
            $date = $date->setTime($invert ? 23 : 0, $invert ? 59 : 0);
        } else {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            $date = $date->setTime($hour, $invert ? 59 : 0);
        }

        return $this;
    }
}
