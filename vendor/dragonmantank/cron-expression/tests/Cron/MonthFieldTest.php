<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Cron\Tests;

use Cron\MonthField;
use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

/**
 * @author Michael Dowling <mtdowling@gmail.com>
 */
class MonthFieldTest extends TestCase
{
    /**
     * @covers \Cron\MonthField::validate
     */
    public function testValidatesField()
    {
        $f = new MonthField();
        $this->assertTrue($f->validate('12'));
        $this->assertTrue($f->validate('*'));
        $this->assertFalse($f->validate('*/10,2,1-12'));
        $this->assertFalse($f->validate('1.fix-regexp'));
<<<<<<< HEAD
=======
        $this->assertFalse($f->validate('1/10'));
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * @covers \Cron\MonthField::isSatisfiedBy
     */
    public function testChecksIfSatisfied()
    {
        $f = new MonthField();
        $this->assertTrue($f->isSatisfiedBy(new DateTime(), '?'));
        $this->assertTrue($f->isSatisfiedBy(new DateTimeImmutable(), '?'));
    }

    /**
     * @covers \Cron\MonthField::increment
     */
    public function testIncrementsDate()
    {
        $d = new DateTime('2011-03-15 11:15:00');
        $f = new MonthField();
        $f->increment($d);
        $this->assertSame('2011-04-01 00:00:00', $d->format('Y-m-d H:i:s'));

        $d = new DateTime('2011-03-15 11:15:00');
        $f->increment($d, true);
        $this->assertSame('2011-02-28 23:59:00', $d->format('Y-m-d H:i:s'));
    }

    /**
     * @covers \Cron\MonthField::increment
     */
    public function testIncrementsDateTimeImmutable()
    {
        $d = new DateTimeImmutable('2011-03-15 11:15:00');
        $f = new MonthField();
        $f->increment($d);
        $this->assertSame('2011-04-01 00:00:00', $d->format('Y-m-d H:i:s'));
    }

    /**
     * @covers \Cron\MonthField::increment
     */
    public function testIncrementsDateWithThirtyMinuteTimezone()
    {
        $tz = date_default_timezone_get();
        date_default_timezone_set('America/St_Johns');
        $d = new DateTime('2011-03-31 11:59:59');
        $f = new MonthField();
        $f->increment($d);
        $this->assertSame('2011-04-01 00:00:00', $d->format('Y-m-d H:i:s'));

        $d = new DateTime('2011-03-15 11:15:00');
        $f->increment($d, true);
        $this->assertSame('2011-02-28 23:59:00', $d->format('Y-m-d H:i:s'));
        date_default_timezone_set($tz);
    }

<<<<<<< HEAD

=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    /**
     * @covers \Cron\MonthField::increment
     */
    public function testIncrementsYearAsNeeded()
    {
        $f = new MonthField();
        $d = new DateTime('2011-12-15 00:00:00');
        $f->increment($d);
        $this->assertSame('2012-01-01 00:00:00', $d->format('Y-m-d H:i:s'));
    }

    /**
     * @covers \Cron\MonthField::increment
     */
    public function testDecrementsYearAsNeeded()
    {
        $f = new MonthField();
        $d = new DateTime('2011-01-15 00:00:00');
        $f->increment($d, true);
        $this->assertSame('2010-12-31 23:59:00', $d->format('Y-m-d H:i:s'));
    }
<<<<<<< HEAD
=======

    /**
     * Incoming literals should ignore case
     *
     * @author Chris Tankersley <chris@ctankersley.com?
     * @since 2019-07-29
     * @see https://github.com/dragonmantank/cron-expression/issues/24
     */
    public function testLiteralsIgnoreCasingProperly()
    {
        $f = new MonthField();
        $this->assertTrue($f->validate('JAN'));
        $this->assertTrue($f->validate('Jan'));
        $this->assertTrue($f->validate('jan'));
    }
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
}
