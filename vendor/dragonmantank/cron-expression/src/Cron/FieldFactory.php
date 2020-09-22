<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron;

use InvalidArgumentException;

/**
<<<<<<< HEAD
 * CRON field factory implementing a flyweight factory
 * @link http://en.wikipedia.org/wiki/Cron
 */
class FieldFactory
=======
 * CRON field factory implementing a flyweight factory.
 *
 * @see http://en.wikipedia.org/wiki/Cron
 */
class FieldFactory implements FieldFactoryInterface
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
{
    /**
     * @var array Cache of instantiated fields
     */
<<<<<<< HEAD
    private $fields = array();

    /**
     * Get an instance of a field object for a cron expression position
     *
     * @param int $position CRON expression position value to retrieve
     *
     * @return FieldInterface
     * @throws InvalidArgumentException if a position is not valid
     */
    public function getField($position)
    {
        if (!isset($this->fields[$position])) {
            switch ($position) {
                case 0:
                    $this->fields[$position] = new MinutesField();
                    break;
                case 1:
                    $this->fields[$position] = new HoursField();
                    break;
                case 2:
                    $this->fields[$position] = new DayOfMonthField();
                    break;
                case 3:
                    $this->fields[$position] = new MonthField();
                    break;
                case 4:
                    $this->fields[$position] = new DayOfWeekField();
                    break;
                default:
                    throw new InvalidArgumentException(
                        ($position + 1) . ' is not a valid position'
                    );
            }
        }

        return $this->fields[$position];
=======
    private $fields = [];

    /**
     * Get an instance of a field object for a cron expression position.
     *
     * @param int $position CRON expression position value to retrieve
     *
     * @throws InvalidArgumentException if a position is not valid
     */
    public function getField(int $position): FieldInterface
    {
        return $this->fields[$position] ?? $this->fields[$position] = $this->instantiateField($position);
    }

    private function instantiateField($position): FieldInterface
    {
        switch ($position) {
            case CronExpression::MINUTE:
                return new MinutesField();
            case CronExpression::HOUR:
                return new HoursField();
            case CronExpression::DAY:
                return new DayOfMonthField();
            case CronExpression::MONTH:
                return new MonthField();
            case CronExpression::WEEKDAY:
                return new DayOfWeekField();
        }

        throw new InvalidArgumentException(
            ($position + 1) . ' is not a valid position'
        );
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
