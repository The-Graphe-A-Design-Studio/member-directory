<?php

<<<<<<< HEAD
namespace Cron\Tests;

use Cron\FieldFactory;
=======
declare(strict_types=1);

namespace Cron\Tests;

use Cron\FieldFactory;
use InvalidArgumentException;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
use PHPUnit\Framework\TestCase;

/**
 * @author Michael Dowling <mtdowling@gmail.com>
 */
class FieldFactoryTest extends TestCase
{
    /**
     * @covers \Cron\FieldFactory::getField
     */
    public function testRetrievesFieldInstances()
    {
<<<<<<< HEAD
        $mappings = array(
=======
        $mappings = [
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            0 => 'Cron\MinutesField',
            1 => 'Cron\HoursField',
            2 => 'Cron\DayOfMonthField',
            3 => 'Cron\MonthField',
            4 => 'Cron\DayOfWeekField',
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

        $f = new FieldFactory();

        foreach ($mappings as $position => $class) {
<<<<<<< HEAD
            $this->assertSame($class, get_class($f->getField($position)));
=======
            $this->assertSame($class, \get_class($f->getField($position)));
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        }
    }

    /**
     * @covers \Cron\FieldFactory::getField
<<<<<<< HEAD
     * @expectedException InvalidArgumentException
     */
    public function testValidatesFieldPosition()
    {
=======
     */
    public function testValidatesFieldPosition()
    {
        $this->expectException(InvalidArgumentException::class);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        $f = new FieldFactory();
        $f->getField(-1);
    }
}
