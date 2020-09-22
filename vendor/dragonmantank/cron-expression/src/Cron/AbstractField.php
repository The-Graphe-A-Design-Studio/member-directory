<?php

<<<<<<< HEAD
namespace Cron;

/**
 * Abstract CRON expression field
=======
declare(strict_types=1);

namespace Cron;

/**
 * Abstract CRON expression field.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
 */
abstract class AbstractField implements FieldInterface
{
    /**
<<<<<<< HEAD
     * Full range of values that are allowed for this field type
=======
     * Full range of values that are allowed for this field type.
     *
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @var array
     */
    protected $fullRange = [];

    /**
<<<<<<< HEAD
     * Literal values we need to convert to integers
=======
     * Literal values we need to convert to integers.
     *
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @var array
     */
    protected $literals = [];

    /**
<<<<<<< HEAD
     * Start value of the full range
     * @var integer
=======
     * Start value of the full range.
     *
     * @var int
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    protected $rangeStart;

    /**
<<<<<<< HEAD
     * End value of the full range
     * @var integer
=======
     * End value of the full range.
     *
     * @var int
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    protected $rangeEnd;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fullRange = range($this->rangeStart, $this->rangeEnd);
    }

    /**
<<<<<<< HEAD
     * Check to see if a field is satisfied by a value
     *
     * @param string $dateValue Date value to check
     * @param string $value     Value to test
     *
     * @return bool
     */
    public function isSatisfied($dateValue, $value)
    {
        if ($this->isIncrementsOfRanges($value)) {
            return $this->isInIncrementsOfRanges($dateValue, $value);
        } elseif ($this->isRange($value)) {
            return $this->isInRange($dateValue, $value);
        }

        return $value == '*' || $dateValue == $value;
    }

    /**
     * Check if a value is a range
=======
     * Check to see if a field is satisfied by a value.
     *
     * @param string $dateValue Date value to check
     * @param string $value Value to test
     *
     * @return bool
     */
    public function isSatisfied(int $dateValue, string $value): bool
    {
        if ($this->isIncrementsOfRanges($value)) {
            return $this->isInIncrementsOfRanges($dateValue, $value);
        }

        if ($this->isRange($value)) {
            return $this->isInRange($dateValue, $value);
        }

        return '*' === $value || $dateValue === (int) $value;
    }

    /**
     * Check if a value is a range.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param string $value Value to test
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isRange($value)
    {
        return strpos($value, '-') !== false;
    }

    /**
     * Check if a value is an increments of ranges
=======
    public function isRange(string $value): bool
    {
        return false !== strpos($value, '-');
    }

    /**
     * Check if a value is an increments of ranges.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param string $value Value to test
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isIncrementsOfRanges($value)
    {
        return strpos($value, '/') !== false;
    }

    /**
     * Test if a value is within a range
     *
     * @param string $dateValue Set date value
     * @param string $value     Value to test
     *
     * @return bool
     */
    public function isInRange($dateValue, $value)
    {
        $parts = array_map(function($value) {
                $value = trim($value);
                $value = $this->convertLiterals($value);
                return $value;
            },
            explode('-', $value, 2)
        );


=======
    public function isIncrementsOfRanges(string $value): bool
    {
        return false !== strpos($value, '/');
    }

    /**
     * Test if a value is within a range.
     *
     * @param int $dateValue Set date value
     * @param string $value Value to test
     *
     * @return bool
     */
    public function isInRange(int $dateValue, $value): bool
    {
        $parts = array_map(function ($value) {
            $value = trim($value);

            return $this->convertLiterals($value);
        },
            explode('-', $value, 2)
        );

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        return $dateValue >= $parts[0] && $dateValue <= $parts[1];
    }

    /**
<<<<<<< HEAD
     * Test if a value is within an increments of ranges (offset[-to]/step size)
     *
     * @param string $dateValue Set date value
     * @param string $value     Value to test
     *
     * @return bool
     */
    public function isInIncrementsOfRanges($dateValue, $value)
    {
        $chunks = array_map('trim', explode('/', $value, 2));
        $range = $chunks[0];
        $step = isset($chunks[1]) ? $chunks[1] : 0;

        // No step or 0 steps aren't cool
        if (is_null($step) || '0' === $step || 0 === $step) {
=======
     * Test if a value is within an increments of ranges (offset[-to]/step size).
     *
     * @param string $dateValue Set date value
     * @param string $value Value to test
     *
     * @return bool
     */
    public function isInIncrementsOfRanges(int $dateValue, string $value): bool
    {
        $chunks = array_map('trim', explode('/', $value, 2));
        $range = $chunks[0];
        $step = $chunks[1] ?? 0;

        // No step or 0 steps aren't cool
        if (null === $step || '0' === $step || 0 === $step) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return false;
        }

        // Expand the * to a full range
<<<<<<< HEAD
        if ('*' == $range) {
=======
        if ('*' === $range) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            $range = $this->rangeStart . '-' . $this->rangeEnd;
        }

        // Generate the requested small range
        $rangeChunks = explode('-', $range, 2);
        $rangeStart = $rangeChunks[0];
<<<<<<< HEAD
        $rangeEnd = isset($rangeChunks[1]) ? $rangeChunks[1] : $rangeStart;
=======
        $rangeEnd = $rangeChunks[1] ?? $rangeStart;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

        if ($rangeStart < $this->rangeStart || $rangeStart > $this->rangeEnd || $rangeStart > $rangeEnd) {
            throw new \OutOfRangeException('Invalid range start requested');
        }

        if ($rangeEnd < $this->rangeStart || $rangeEnd > $this->rangeEnd || $rangeEnd < $rangeStart) {
            throw new \OutOfRangeException('Invalid range end requested');
        }

        // Steps larger than the range need to wrap around and be handled slightly differently than smaller steps
        if ($step >= $this->rangeEnd) {
<<<<<<< HEAD
            $thisRange = [$this->fullRange[$step % count($this->fullRange)]];
        } else {
            $thisRange = range($rangeStart, $rangeEnd, $step);
        }

        return in_array($dateValue, $thisRange);
    }

    /**
     * Returns a range of values for the given cron expression
     *
     * @param string $expression The expression to evaluate
     * @param int $max           Maximum offset for range
     *
     * @return array
     */
    public function getRangeForExpression($expression, $max)
    {
        $values = array();
        $expression = $this->convertLiterals($expression);

        if (strpos($expression, ',') !== false) {
=======
            $thisRange = [$this->fullRange[$step % \count($this->fullRange)]];
        } else {
            $thisRange = range($rangeStart, $rangeEnd, (int) $step);
        }

        return \in_array($dateValue, $thisRange, true);
    }

    /**
     * Returns a range of values for the given cron expression.
     *
     * @param string $expression The expression to evaluate
     * @param int $max Maximum offset for range
     *
     * @return array
     */
    public function getRangeForExpression(string $expression, int $max): array
    {
        $values = [];
        $expression = $this->convertLiterals($expression);

        if (false !== strpos($expression, ',')) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            $ranges = explode(',', $expression);
            $values = [];
            foreach ($ranges as $range) {
                $expanded = $this->getRangeForExpression($range, $this->rangeEnd);
                $values = array_merge($values, $expanded);
            }
<<<<<<< HEAD
=======

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return $values;
        }

        if ($this->isRange($expression) || $this->isIncrementsOfRanges($expression)) {
            if (!$this->isIncrementsOfRanges($expression)) {
<<<<<<< HEAD
                list ($offset, $to) = explode('-', $expression);
                $offset = $this->convertLiterals($offset);
                $to = $this->convertLiterals($to);
                $stepSize = 1;
            }
            else {
                $range = array_map('trim', explode('/', $expression, 2));
                $stepSize = isset($range[1]) ? $range[1] : 0;
                $range = $range[0];
                $range = explode('-', $range, 2);
                $offset = $range[0];
                $to = isset($range[1]) ? $range[1] : $max;
            }
            $offset = $offset == '*' ? $this->rangeStart : $offset;
            if ($stepSize >= $this->rangeEnd) {
                $values = [$this->fullRange[$stepSize % count($this->fullRange)]];
            } else {
                for ($i = $offset; $i <= $to; $i += $stepSize) {
                    $values[] = (int)$i;
                }
            }
            sort($values);
        }
        else {
            $values = array($expression);
=======
                [$offset, $to] = explode('-', $expression);
                $offset = $this->convertLiterals($offset);
                $to = $this->convertLiterals($to);
                $stepSize = 1;
            } else {
                $range = array_map('trim', explode('/', $expression, 2));
                $stepSize = $range[1] ?? 0;
                $range = $range[0];
                $range = explode('-', $range, 2);
                $offset = $range[0];
                $to = $range[1] ?? $max;
            }
            $offset = '*' === $offset ? $this->rangeStart : $offset;
            if ($stepSize >= $this->rangeEnd) {
                $values = [$this->fullRange[$stepSize % \count($this->fullRange)]];
            } else {
                for ($i = $offset; $i <= $to; $i += $stepSize) {
                    $values[] = (int) $i;
                }
            }
            sort($values);
        } else {
            $values = [$expression];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        }

        return $values;
    }

    /**
<<<<<<< HEAD
     * Convert literal
     *
     * @param string $value
     * @return string
     */
    protected function convertLiterals($value)
    {
        if (count($this->literals)) {
            $key = array_search($value, $this->literals);
            if ($key !== false) {
=======
     * Convert literal.
     *
     * @param string $value
     *
     * @return string
     */
    protected function convertLiterals(string $value): string
    {
        if (\count($this->literals)) {
            $key = array_search(strtoupper($value), $this->literals, true);
            if (false !== $key) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                return (string) $key;
            }
        }

        return $value;
    }

    /**
<<<<<<< HEAD
     * Checks to see if a value is valid for the field
     *
     * @param string $value
     * @return bool
     */
    public function validate($value)
=======
     * Checks to see if a value is valid for the field.
     *
     * @param string $value
     *
     * @return bool
     */
    public function validate(string $value): bool
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $value = $this->convertLiterals($value);

        // All fields allow * as a valid value
        if ('*' === $value) {
            return true;
        }

<<<<<<< HEAD
        if (strpos($value, '/') !== false) {
            list($range, $step) = explode('/', $value);
=======
        if (false !== strpos($value, '/')) {
            [$range, $step] = explode('/', $value);

            // Don't allow numeric ranges
            if (is_numeric($range)) {
                return false;
            }

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return $this->validate($range) && filter_var($step, FILTER_VALIDATE_INT);
        }

        // Validate each chunk of a list individually
<<<<<<< HEAD
        if (strpos($value, ',') !== false) {
=======
        if (false !== strpos($value, ',')) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            foreach (explode(',', $value) as $listItem) {
                if (!$this->validate($listItem)) {
                    return false;
                }
            }
<<<<<<< HEAD
            return true;
        }

        if (strpos($value, '-') !== false) {
=======

            return true;
        }

        if (false !== strpos($value, '-')) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            if (substr_count($value, '-') > 1) {
                return false;
            }

            $chunks = explode('-', $value);
            $chunks[0] = $this->convertLiterals($chunks[0]);
            $chunks[1] = $this->convertLiterals($chunks[1]);

<<<<<<< HEAD
            if ('*' == $chunks[0] || '*' == $chunks[1]) {
=======
            if ('*' === $chunks[0] || '*' === $chunks[1]) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                return false;
            }

            return $this->validate($chunks[0]) && $this->validate($chunks[1]);
        }

        if (!is_numeric($value)) {
            return false;
        }

<<<<<<< HEAD
        if (is_float($value) || strpos($value, '.') !== false) {
=======
        if (\is_float($value) || false !== strpos($value, '.')) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return false;
        }

        // We should have a numeric by now, so coerce this into an integer
        $value = (int) $value;

<<<<<<< HEAD
        return in_array($value, $this->fullRange, true);
=======
        return \in_array($value, $this->fullRange, true);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
