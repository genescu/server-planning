<?php

namespace ServerPlanning;

use Exception;

/**
 * Class Controller
 * @package ServerPlanning
 */
class Controller
{
    /**
     * @var
     */
    private $server;

    /**
     * @var
     */
    private $virtualMachines;

    private static $instance;

    public static function newInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $serverConfig
     * @param $virtualMachineConfig
     * @return $this
     */
    public function init($serverConfig, $virtualMachineConfig)
    {

        /*set-up server configuration */

        $serverEntity = new Hardware();

        $serverMachine = $serverEntity->setConfig($serverConfig);

        /*set-up virtual machines configuration */

        $virtualMachineEntity = new Hardware();

        $virtualMachineArray = [];

        if (is_array($virtualMachineConfig)) {

            foreach ($virtualMachineConfig as $cfg) {

                $machine = $virtualMachineEntity->setConfig($cfg);

                if ($this->isVirtualMachineValid($serverMachine, $machine)) {
                    $virtualMachineArray [] = $machine->getHardware();
                }
            }

            if ($virtualMachineArray) {
                $virtualMachineArray = $this->sortArray($virtualMachineArray, array("CPU", "RAM", "HDD"));
            }
        }

        /*get resources as array*/

        $this->server = $serverMachine->getHardware();

        $this->virtualMachines = $virtualMachineArray;

        return $this;
    }


    /**
     * @return int
     */
    public function calculate()
    {
        try {
            if (empty($this->server) || empty($this->virtualMachines)) {
                throw  new  Exception();
            }
        } catch (Exception $e) {

            exit("Exception:: Missing or false configuration");
        }

        return count($this->_calculate());
    }

    /**
     * @return array
     */
    private function _calculate()
    {
        $server = $this->server;

        $pool = [];

        $i = 0;
        $x = 0;

        while ($this->virtualMachines) {
            if (!isset($this->virtualMachines[$i])) {
                $i++;
                continue;
            }

            $server = $this->subtract($server, $this->virtualMachines[$i]);

            if ($server) {

                if (!array_filter($server)) {

                    /* xdebug("perfect");*/

                    $pool[$x] = $this->virtualMachines[$i];

                    unset($this->virtualMachines[$i]);

                    $server = $this->server;

                    $x++;

                } else {

                    $pool[$x][] = $this->virtualMachines[$i];

                    unset($this->virtualMachines[$i]);
                }
            } else {

                //  xdebug("try another ...");

                if ($i > count($this->virtualMachines)) {

                    // xdebug("not found in all. try new server");

                    // resetting the server

                    $server = $this->server;

                    $i = -1;

                    $x++;
                }
            }


            $i++;
        }


        return $pool;
    }


    /**
     * @param $serverConfig
     * @param $virtualMachineConfig
     * @return bool
     */
    private function isVirtualMachineValid(Hardware $server, Hardware $machine)
    {
        try {
            $cpu = $server->getCPU() - $machine->getCPU();
            $ram = $server->getRAM() - $machine->getRAM();
            $hdd = $server->getHDD() - $machine->getHDD();

            if ($cpu < 0 || $ram < 0 || $hdd < 0) {
                throw  new  Exception();
            }
        } catch (Exception $e) {
            exit(sprintf("Exception:: Virtual Machine is too big. Expected lower or equal to  [%s] got [%s]", implode(",", (array)$server), implode(",", (array)$machine)));
        }

        return true;
    }


    /**
     * @param $serverConfig
     * @param $virtualMachineConfig
     * @return bool|mixed
     */
    private function subtract($serverConfig, $virtualMachineConfig)
    {
        $server = new Hardware();
        $machine = new Hardware();
        $tempMachine = new Hardware();

        $serverConfig = (array)$serverConfig;
        $virtualMachineConfig = (array)$virtualMachineConfig;

        $server = $server->setConfig(array_values($serverConfig));
        $machine = $machine->setConfig(array_values($virtualMachineConfig));

        $cpu = $server->getCPU() - $machine->getCPU();
        $ram = $server->getRAM() - $machine->getRAM();
        $hdd = $server->getHDD() - $machine->getHDD();


        if ($cpu >= 0 && $ram >= 0 && $hdd >= 0) {
            return $tempMachine->setHardware($cpu, $ram, $hdd)->getHardware();
        }

        return false;
    }

    /**
     * @param $array
     * @param array $sortBy
     * @param int $sort
     * @return array
     */
    private function sortArray($array, $sortBy = array(), $sort = SORT_REGULAR)
    {
        if (is_array($array) && count($array) > 0 && !empty($sortBy)) {
            $result = array();
            foreach ($array as $item => $value) {
                $key = '';
                foreach ($sortBy as $item_key) {
                    $key .= $value[$item_key];
                }
                $result[$item] = $key;
            }
            asort($result, $sort);
            $sorted = array();
            foreach ($result as $item => $value) {
                $sorted[] = $array[$item];
            }
            return array_reverse($sorted);
        }
        return $array;
    }
}
