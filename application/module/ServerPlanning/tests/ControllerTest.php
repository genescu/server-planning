<?php

namespace ServerPlanning;

use PHPUnit\Framework\TestCase;

final class ControllerTest extends TestCase
{

    public function testCalculate()
    {

        $server = array(2, 32, 100);

        $virtualMachines = array(
            array(1, 16, 10),
            array(1, 16, 10),
            array(2, 32, 100)
        );

        $controller = new Controller();

        $controller->init($server, $virtualMachines)->calculate();

        $this->assertEquals(2, $controller->init($server, $virtualMachines)->calculate());

        $controller = new Controller();

        $server = array(2, 32, 100);

        $virtualMachines = array(
            array(1, 16, 80),
            array(1, 16, 10),
            array(1, 16, 10),
            array(2, 32, 100)
        );


        $controller->init($server, $virtualMachines)->calculate();

        $this->assertEquals(3, $controller->init($server, $virtualMachines)->calculate());


    }
}
