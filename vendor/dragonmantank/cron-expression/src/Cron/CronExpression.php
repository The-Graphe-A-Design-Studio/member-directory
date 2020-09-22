<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Exception;
use InvalidArgumentException;
use RuntimeException;

/**
 * CRON expression parser that can determine whether or not a CRON expression is
 * due to run, the next run date and previous run date of a CRON expression.
 * The determinations made by this class are accurate if checked run once per
 * minute (seconds are dropped from date time comparisons).
 *
 * Schedule parts must map to:
 * minute [0-59], hour [0-23], day of month, month [1-12|JAN-DEC], day of week
 * [1-7|MON-SUN], and an optional year.
 *
<<<<<<< HEAD
 * @link http://en.wikipedia.org/wiki/Cron
 */
class CronExpression
{
    const MINUTE = 0;
    const HOUR = 1;
    const DAY = 2;
    const MONTH = 3;
    const WEEKDAY = 4;
    const YEAR = 5;
=======
 * @see http://en.wikipedia.org/wiki/Cron
 */
class CronExpression
{
    public const MINUTE = 0;
    public const HOUR = 1;
    public const DAY = 2;
    public const MONTH = 3;
    public const WEEKDAY = 4;
    public const YEAR = 5;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * @var array CRON expression parts
     */
    private $cronParts;

    /**
<<<<<<< HEAD
     * @var FieldFactory CRON field factory
=======
     * @var FieldFactoryInterface CRON field factory
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    private $fieldFactory;

    /**
     * @var int Max iteration count when searching for next run date
     */
    private $maxIterationCount = 1000;

    /**
     * @var array Order in which to test of cron parts
     */
<<<<<<< HEAD
    private static $order = array(self::YEAR, self::MONTH, self::DAY, self::WEEKDAY, self::HOUR, self::MINUTE);
=======
    private static $order = [self::YEAR, self::MONTH, self::DAY, self::WEEKDAY, self::HOUR, self::MINUTE];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Factory method to create a new CronExpression.
     *
     * @param string $expression The CRON expression to create.  There are
     *                           several special predefined values which can be used to substitute the
     *                           CRON expression:
     *
     *      `@yearly`, `@annually` - Run once a year, midnight, Jan. 1 - 0 0 1 1 *
     *      `@monthly` - Run once a month, midnight, first of month - 0 0 1 * *
     *      `@weekly` - Run once a week, midnight on Sun - 0 0 * * 0
     *      `@daily` - Run once a day, midnight - 0 0 * * *
     *      `@hourly` - Run once an hour, first minute - 0 * * * *
<<<<<<< HEAD
     * @param FieldFactory|null $fieldFactory Field factory to use
     *
     * @return CronExpression
     */
    public static function factory($expression, FieldFactory $fieldFactory = null)
    {
        $mappings = array(
=======
     * @param null|FieldFactoryInterface $fieldFactory Field factory to use
     *
     * @return CronExpression
     */
    public static function factory(string $expression, FieldFactoryInterface $fieldFactory = null): CronExpression
    {
        $mappings = [
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            '@yearly' => '0 0 1 1 *',
            '@annually' => '0 0 1 1 *',
            '@monthly' => '0 0 1 * *',
            '@weekly' => '0 0 * * 0',
            '@daily' => '0 0 * * *',
<<<<<<< HEAD
            '@hourly' => '0 * * * *'
        );

        if (isset($mappings[$expression])) {
            $expression = $mappings[$expression];
=======
            '@hourly' => '0 * * * *',
        ];

        $shortcut = strtolower($expression);
        if (isset($mappings[$shortcut])) {
            $expression = $mappings[$shortcut];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        }

        return new static($expression, $fieldFactory ?: new FieldFactory());
    }

    /**
     * Validate a CronExpression.
     *
<<<<<<< HEAD
     * @param string $expression The CRON expression to validate.
     *
     * @return bool True if a valid CRON expression was passed. False if not.
     * @see \Cron\CronExpression::factory
     */
    public static function isValidExpression($expression)
=======
     * @param string $expression the CRON expression to validate
     *
     * @return bool True if a valid CRON expression was passed. False if not.
     *
     * @see \Cron\CronExpression::factory
     */
    public static function isValidExpression(string $expression): bool
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        try {
            self::factory($expression);
        } catch (InvalidArgumentException $e) {
            return false;
        }

        return true;
    }

    /**
<<<<<<< HEAD
     * Parse a CRON expression
     *
     * @param string       $expression   CRON expression (e.g. '8 * * * *')
     * @param FieldFactory|null $fieldFactory Factory to create cron fields
     */
    public function __construct($expression, FieldFactory $fieldFactory = null)
    {
        $this->fieldFactory = $fieldFactory;
=======
     * Parse a CRON expression.
     *
     * @param string $expression CRON expression (e.g. '8 * * * *')
     * @param null|FieldFactory $fieldFactory Factory to create cron fields
     */
    public function __construct(string $expression, FieldFactory $fieldFactory = null)
    {
        $this->fieldFactory = $fieldFactory ?: new FieldFactory();
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        $this->setExpression($expression);
    }

    /**
<<<<<<< HEAD
     * Set or change the CRON expression
     *
     * @param string $value CRON expression (e.g. 8 * * * *)
     *
     * @return CronExpression
     * @throws \InvalidArgumentException if not a valid CRON expression
     */
    public function setExpression($value)
    {
        $this->cronParts = preg_split('/\s/', $value, -1, PREG_SPLIT_NO_EMPTY);
        if (count($this->cronParts) < 5) {
=======
     * Set or change the CRON expression.
     *
     * @param string $value CRON expression (e.g. 8 * * * *)
     *
     * @throws \InvalidArgumentException if not a valid CRON expression
     *
     * @return CronExpression
     */
    public function setExpression(string $value): CronExpression
    {
        $this->cronParts = preg_split('/\s/', $value, -1, PREG_SPLIT_NO_EMPTY);
        if (\count($this->cronParts) < 5) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            throw new InvalidArgumentException(
                $value . ' is not a valid CRON expression'
            );
        }

        foreach ($this->cronParts as $position => $part) {
            $this->setPart($position, $part);
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * Set part of the CRON expression
     *
     * @param int    $position The position of the CRON expression to set
     * @param string $value    The value to set
     *
     * @return CronExpression
     * @throws \InvalidArgumentException if the value is not valid for the part
     */
    public function setPart($position, $value)
=======
     * Set part of the CRON expression.
     *
     * @param int $position The position of the CRON expression to set
     * @param string $value The value to set
     *
     * @throws \InvalidArgumentException if the value is not valid for the part
     *
     * @return CronExpression
     */
    public function setPart(int $position, string $value): CronExpression
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        if (!$this->fieldFactory->getField($position)->validate($value)) {
            throw new InvalidArgumentException(
                'Invalid CRON field value ' . $value . ' at position ' . $position
            );
        }

        $this->cronParts[$position] = $value;

        return $this;
    }

    /**
<<<<<<< HEAD
     * Set max iteration count for searching next run dates
=======
     * Set max iteration count for searching next run dates.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param int $maxIterationCount Max iteration count when searching for next run date
     *
     * @return CronExpression
     */
<<<<<<< HEAD
    public function setMaxIterationCount($maxIterationCount)
=======
    public function setMaxIterationCount(int $maxIterationCount): CronExpression
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $this->maxIterationCount = $maxIterationCount;

        return $this;
    }

    /**
     * Get a next run date relative to the current date or a specific date
     *
     * @param string|\DateTimeInterface $currentTime      Relative calculation date
     * @param int                       $nth              Number of matches to skip before returning a
     *                                                    matching next run date.  0, the default, will return the
     *                                                    current date and time if the next run date falls on the
     *                                                    current date and time.  Setting this value to 1 will
     *                                                    skip the first match and go to the second match.
     *                                                    Setting this value to 2 will skip the first 2
     *                                                    matches and so on.
     * @param bool                      $allowCurrentDate Set to TRUE to return the current date if
     *                                                    it matches the cron expression.
     * @param null|string               $timeZone         TimeZone to use instead of the system default
     *
<<<<<<< HEAD
     * @return \DateTime
     * @throws \RuntimeException on too many iterations
     */
    public function getNextRunDate($currentTime = 'now', $nth = 0, $allowCurrentDate = false, $timeZone = null)
=======
     * @throws \RuntimeException on too many iterations
     * @throws \Exception
     *
     * @return \DateTime
     */
    public function getNextRunDate($currentTime = 'now', int $nth = 0, bool $allowCurrentDate = false, $timeZone = null): DateTime
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        return $this->getRunDate($currentTime, $nth, false, $allowCurrentDate, $timeZone);
    }

    /**
<<<<<<< HEAD
     * Get a previous run date relative to the current date or a specific date
=======
     * Get a previous run date relative to the current date or a specific date.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param string|\DateTimeInterface $currentTime      Relative calculation date
     * @param int                       $nth              Number of matches to skip before returning
     * @param bool                      $allowCurrentDate Set to TRUE to return the
     *                                                    current date if it matches the cron expression
     * @param null|string               $timeZone         TimeZone to use instead of the system default
     *
<<<<<<< HEAD
     * @return \DateTime
     * @throws \RuntimeException on too many iterations
     * @see \Cron\CronExpression::getNextRunDate
     */
    public function getPreviousRunDate($currentTime = 'now', $nth = 0, $allowCurrentDate = false, $timeZone = null)
=======
     * @throws \RuntimeException on too many iterations
     * @throws \Exception
     *
     * @return \DateTime
     *
     * @see \Cron\CronExpression::getNextRunDate
     */
    public function getPreviousRunDate($currentTime = 'now', int $nth = 0, bool $allowCurrentDate = false, $timeZone = null): DateTime
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        return $this->getRunDate($currentTime, $nth, true, $allowCurrentDate, $timeZone);
    }

    /**
<<<<<<< HEAD
     * Get multiple run dates starting at the current date or a specific date
=======
     * Get multiple run dates starting at the current date or a specific date.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param int                       $total            Set the total number of dates to calculate
     * @param string|\DateTimeInterface $currentTime      Relative calculation date
     * @param bool                      $invert           Set to TRUE to retrieve previous dates
     * @param bool                      $allowCurrentDate Set to TRUE to return the
     *                                                    current date if it matches the cron expression
     * @param null|string               $timeZone         TimeZone to use instead of the system default
     *
     * @return \DateTime[] Returns an array of run dates
     */
<<<<<<< HEAD
    public function getMultipleRunDates($total, $currentTime = 'now', $invert = false, $allowCurrentDate = false, $timeZone = null)
    {
        $matches = array();
        for ($i = 0; $i < max(0, $total); $i++) {
=======
    public function getMultipleRunDates(int $total, $currentTime = 'now', bool $invert = false, bool $allowCurrentDate = false, $timeZone = null): array
    {
        $matches = [];
        $max = max(0, $total);
        for ($i = 0; $i < $max; ++$i) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            try {
                $matches[] = $this->getRunDate($currentTime, $i, $invert, $allowCurrentDate, $timeZone);
            } catch (RuntimeException $e) {
                break;
            }
        }

        return $matches;
    }

    /**
<<<<<<< HEAD
     * Get all or part of the CRON expression
     *
     * @param string $part Specify the part to retrieve or NULL to get the full
     *                     cron schedule string.
     *
     * @return string|null Returns the CRON expression, a part of the
     *                     CRON expression, or NULL if the part was specified but not found
     */
    public function getExpression($part = null)
    {
        if (null === $part) {
            return implode(' ', $this->cronParts);
        } elseif (array_key_exists($part, $this->cronParts)) {
=======
     * Get all or part of the CRON expression.
     *
     * @param string $part specify the part to retrieve or NULL to get the full
     *                     cron schedule string
     *
     * @return null|string Returns the CRON expression, a part of the
     *                     CRON expression, or NULL if the part was specified but not found
     */
    public function getExpression($part = null): ?string
    {
        if (null === $part) {
            return implode(' ', $this->cronParts);
        }

        if (array_key_exists($part, $this->cronParts)) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return $this->cronParts[$part];
        }

        return null;
    }

    /**
     * Helper method to output the full expression.
     *
     * @return string Full CRON expression
     */
<<<<<<< HEAD
    public function __toString()
    {
        return $this->getExpression();
=======
    public function __toString(): string
    {
        return (string) $this->getExpression();
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Determine if the cron is due to run based on the current date or a
     * specific date.  This method assumes that the current number of
     * seconds are irrelevant, and should be called once per minute.
     *
     * @param string|\DateTimeInterface $currentTime Relative calculation date
     * @param null|string               $timeZone    TimeZone to use instead of the system default
     *
     * @return bool Returns TRUE if the cron is due to run or FALSE if not
     */
<<<<<<< HEAD
    public function isDue($currentTime = 'now', $timeZone = null)
=======
    public function isDue($currentTime = 'now', $timeZone = null): ?bool
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $timeZone = $this->determineTimeZone($currentTime, $timeZone);

        if ('now' === $currentTime) {
            $currentTime = new DateTime();
        } elseif ($currentTime instanceof DateTime) {
<<<<<<< HEAD
            //
=======
            $currentTime = clone $currentTime;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        } elseif ($currentTime instanceof DateTimeImmutable) {
            $currentTime = DateTime::createFromFormat('U', $currentTime->format('U'));
        } else {
            $currentTime = new DateTime($currentTime);
        }
<<<<<<< HEAD
        $currentTime->setTimeZone(new DateTimeZone($timeZone));

        // drop the seconds to 0
        $currentTime = DateTime::createFromFormat('Y-m-d H:i', $currentTime->format('Y-m-d H:i'));
=======
        $currentTime->setTimezone(new DateTimeZone($timeZone));

        // drop the seconds to 0
        $currentTime->setTime((int) $currentTime->format('H'), (int) $currentTime->format('i'), 0);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

        try {
            return $this->getNextRunDate($currentTime, 0, true)->getTimestamp() === $currentTime->getTimestamp();
        } catch (Exception $e) {
            return false;
        }
    }

    /**
<<<<<<< HEAD
     * Get the next or previous run date of the expression relative to a date
=======
     * Get the next or previous run date of the expression relative to a date.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param string|\DateTimeInterface $currentTime      Relative calculation date
     * @param int                       $nth              Number of matches to skip before returning
     * @param bool                      $invert           Set to TRUE to go backwards in time
     * @param bool                      $allowCurrentDate Set to TRUE to return the
     *                                                    current date if it matches the cron expression
     * @param string|null               $timeZone         TimeZone to use instead of the system default
     *
<<<<<<< HEAD
     * @return \DateTime
     * @throws \RuntimeException on too many iterations
     */
    protected function getRunDate($currentTime = null, $nth = 0, $invert = false, $allowCurrentDate = false, $timeZone = null)
=======
     * @throws \RuntimeException on too many iterations
     * @throws Exception
     *
     * @return \DateTime
     */
    protected function getRunDate($currentTime = null, int $nth = 0, bool $invert = false, bool $allowCurrentDate = false, $timeZone = null): DateTime
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $timeZone = $this->determineTimeZone($currentTime, $timeZone);

        if ($currentTime instanceof DateTime) {
            $currentDate = clone $currentTime;
        } elseif ($currentTime instanceof DateTimeImmutable) {
            $currentDate = DateTime::createFromFormat('U', $currentTime->format('U'));
        } else {
            $currentDate = new DateTime($currentTime ?: 'now');
        }

<<<<<<< HEAD
        $currentDate->setTimeZone(new DateTimeZone($timeZone));
        $currentDate->setTime($currentDate->format('H'), $currentDate->format('i'), 0);
        $nextRun = clone $currentDate;
        $nth = (int) $nth;

        // We don't have to satisfy * or null fields
        $parts = array();
        $fields = array();
=======
        $currentDate->setTimezone(new DateTimeZone($timeZone));
        $currentDate->setTime((int) $currentDate->format('H'), (int) $currentDate->format('i'), 0);

        $nextRun = clone $currentDate;

        // We don't have to satisfy * or null fields
        $parts = [];
        $fields = [];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        foreach (self::$order as $position) {
            $part = $this->getExpression($position);
            if (null === $part || '*' === $part) {
                continue;
            }
            $parts[$position] = $part;
            $fields[$position] = $this->fieldFactory->getField($position);
        }

<<<<<<< HEAD
        // Set a hard limit to bail on an impossible date
        for ($i = 0; $i < $this->maxIterationCount; $i++) {

=======
        if (isset($parts[2]) && isset($parts[4])) {
            $domExpression = sprintf('%s %s %s %s *', $this->getExpression(0), $this->getExpression(1), $this->getExpression(2), $this->getExpression(3));
            $dowExpression = sprintf('%s %s * %s %s', $this->getExpression(0), $this->getExpression(1), $this->getExpression(3), $this->getExpression(4));

            $domExpression = new self($domExpression);
            $dowExpression = new self($dowExpression);

            $domRunDates = $domExpression->getMultipleRunDates($nth + 1, $currentTime, $invert, $allowCurrentDate, $timeZone);
            $dowRunDates = $dowExpression->getMultipleRunDates($nth + 1, $currentTime, $invert, $allowCurrentDate, $timeZone);

            $combined = array_merge($domRunDates, $dowRunDates);
            usort($combined, function ($a, $b) {
                return $a->format('Y-m-d H:i:s') <=> $b->format('Y-m-d H:i:s');
            });

            return $combined[$nth];
        }

        // Set a hard limit to bail on an impossible date
        for ($i = 0; $i < $this->maxIterationCount; ++$i) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            foreach ($parts as $position => $part) {
                $satisfied = false;
                // Get the field object used to validate this part
                $field = $fields[$position];
                // Check if this is singular or a list
<<<<<<< HEAD
                if (strpos($part, ',') === false) {
=======
                if (false === strpos($part, ',')) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                    $satisfied = $field->isSatisfiedBy($nextRun, $part);
                } else {
                    foreach (array_map('trim', explode(',', $part)) as $listPart) {
                        if ($field->isSatisfiedBy($nextRun, $listPart)) {
                            $satisfied = true;
<<<<<<< HEAD
=======

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                            break;
                        }
                    }
                }

                // If the field is not satisfied, then start over
                if (!$satisfied) {
                    $field->increment($nextRun, $invert, $part);
<<<<<<< HEAD
=======

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                    continue 2;
                }
            }

            // Skip this match if needed
            if ((!$allowCurrentDate && $nextRun == $currentDate) || --$nth > -1) {
<<<<<<< HEAD
                $this->fieldFactory->getField(0)->increment($nextRun, $invert, isset($parts[0]) ? $parts[0] : null);
=======
                $this->fieldFactory->getField(0)->increment($nextRun, $invert, $parts[0] ?? null);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                continue;
            }

            return $nextRun;
        }

        // @codeCoverageIgnoreStart
        throw new RuntimeException('Impossible CRON expression');
        // @codeCoverageIgnoreEnd
    }

    /**
     * Workout what timeZone should be used.
     *
     * @param string|\DateTimeInterface $currentTime      Relative calculation date
     * @param string|null               $timeZone         TimeZone to use instead of the system default
     *
     * @return string
     */
<<<<<<< HEAD
    protected function determineTimeZone($currentTime, $timeZone)
    {
        if (! is_null($timeZone)) {
            return $timeZone;
        }

        if ($currentTime instanceOf DateTimeInterface) {
=======
    protected function determineTimeZone($currentTime, $timeZone): string
    {
        if (null !== $timeZone) {
            return $timeZone;
        }

        if ($currentTime instanceof DateTimeInterface) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return $currentTime->getTimeZone()->getName();
        }

        return date_default_timezone_get();
    }
}
