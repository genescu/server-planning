<?php
/**
 * Created by PhpStorm.
 * User: georgeenescu
 * Date: 01.04.19
 * Time: 18:41
 */

namespace ServerPlanning;

use PHPUnit\Framework\TestCase;

final class ControllerTest extends TestCase
{

//Example:
//- Server type = {CPU: 2, RAM: 32, HDD: 100}
//    - Virtual Machines = [{CPU: 1, RAM: 16, HDD: 10}, {CPU: 1, RAM: 16, HDD: 10}, {CPU: 2, RAM: 32, HDD: 100}]
//    - Result = 2

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
