<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron;

use DateTimeInterface;

/**
<<<<<<< HEAD
 * Minutes field.  Allows: * , / -
=======
 * Minutes field.  Allows: * , / -.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
 */
class MinutesField extends AbstractField
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
    protected $rangeEnd = 59;

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function isSatisfiedBy(DateTimeInterface $date, $value)
=======
     * {@inheritdoc}
     */
    public function isSatisfiedBy(DateTimeInterface $date, $value):bool
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        if ($value == '?') {
            return true;
        }

<<<<<<< HEAD
        return $this->isSatisfied($date->format('i'), $value);
    }

    /**
=======
        return $this->isSatisfied((int)$date->format('i'), $value);
    }

    /**
     * {@inheritdoc}
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * {@inheritDoc}
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
        if (is_null($parts)) {
            $date = $date->modify(($invert ? '-' : '+') . '1 minute');
            return $this;
        }

<<<<<<< HEAD
        $parts = strpos($parts, ',') !== false ? explode(',', $parts) : array($parts);
        $minutes = array();
=======
        $parts = false !== strpos($parts, ',') ? explode(',', $parts) : [$parts];
        $minutes = [];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        foreach ($parts as $part) {
            $minutes = array_merge($minutes, $this->getRangeForExpression($part, 59));
        }

        $current_minute = $date->format('i');
<<<<<<< HEAD
        $position = $invert ? count($minutes) - 1 : 0;
        if (count($minutes) > 1) {
            for ($i = 0; $i < count($minutes) - 1; $i++) {
                if ((!$invert && $current_minute >= $minutes[$i] && $current_minute < $minutes[$i + 1]) ||
                    ($invert && $current_minute > $minutes[$i] && $current_minute <= $minutes[$i + 1])) {
                    $position = $invert ? $i : $i + 1;
=======
        $position = $invert ? \count($minutes) - 1 : 0;
        if (\count($minutes) > 1) {
            for ($i = 0; $i < \count($minutes) - 1; ++$i) {
                if ((!$invert && $current_minute >= $minutes[$i] && $current_minute < $minutes[$i + 1]) ||
                    ($invert && $current_minute > $minutes[$i] && $current_minute <= $minutes[$i + 1])) {
                    $position = $invert ? $i : $i + 1;

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                    break;
                }
            }
        }

        if ((!$invert && $current_minute >= $minutes[$position]) || ($invert && $current_minute <= $minutes[$position])) {
            $date = $date->modify(($invert ? '-' : '+') . '1 hour');
<<<<<<< HEAD
            $date = $date->setTime($date->format('H'), $invert ? 59 : 0);
        }
        else {
            $date = $date->setTime($date->format('H'), $minutes[$position]);
=======
            $date = $date->setTime((int) $date->format('H'), $invert ? 59 : 0);
        } else {
            $date = $date->setTime((int) $date->format('H'), (int) $minutes[$position]);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        }

        return $this;
    }
}
