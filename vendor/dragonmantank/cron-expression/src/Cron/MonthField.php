<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron;

use DateTimeInterface;

/**
<<<<<<< HEAD
 * Month field.  Allows: * , / -
=======
 * Month field.  Allows: * , / -.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
 */
class MonthField extends AbstractField
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
    protected $rangeEnd = 12;

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected $literals = [1 => 'JAN', 2 => 'FEB', 3 => 'MAR', 4 => 'APR', 5 => 'MAY', 6 => 'JUN', 7 => 'JUL',
        8 => 'AUG', 9 => 'SEP', 10 => 'OCT', 11 => 'NOV', 12 => 'DEC'];

    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(DateTimeInterface $date, $value)
=======
     * {@inheritdoc}
     */
    protected $literals = [1 => 'JAN', 2 => 'FEB', 3 => 'MAR', 4 => 'APR', 5 => 'MAY', 6 => 'JUN', 7 => 'JUL',
        8 => 'AUG', 9 => 'SEP', 10 => 'OCT', 11 => 'NOV', 12 => 'DEC', ];

    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(DateTimeInterface $date, $value): bool
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        if ($value == '?') {
            return true;
        }

        $value = $this->convertLiterals($value);

<<<<<<< HEAD
        return $this->isSatisfied($date->format('m'), $value);
=======
        return $this->isSatisfied((int) $date->format('m'), $value);
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
            $date = $date->modify('last day of previous month')->setTime(23, 59);
        } else {
            $date = $date->modify('first day of next month')->setTime(0, 0);
        }

        return $this;
    }
<<<<<<< HEAD


=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
}
