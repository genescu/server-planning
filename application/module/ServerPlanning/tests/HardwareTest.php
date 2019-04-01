<?php

namespace ServerPlanning;

use Exception;
use PHPUnit\Framework\TestCase;

final class HardwareTest extends TestCase
{


    public function testsetHardwareCannotBeCreatedFromInvalidInput()
    {

        $hardware = new Hardware();

        $this->expectException(Error::class);
        $hardware->setConfig("1");

        $this->expectException(Error::class);
        $hardware->setConfig([1, 23]);

        $this->expectException(Error::class);
        $hardware->setConfig([1, 23,-1]);

    }

}
