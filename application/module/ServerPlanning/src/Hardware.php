<?php

namespace ServerPlanning;

use Exception;

/**
 * Class Hardware
 * @package ServerPlanning
 */
class Hardware
{
    /**
     * @var
     */
    private $CPU;
    /**
     * @var
     */
    private $RAM;
    /**
     * @var
     */
    private $HDD;


    /**
     * @param $config
     * @return $this
     */
    public function setConfig($config)
    {
        try {

            if (!empty($config && is_array($config))) {

                $config = array_values($config);

                $CPU = isset($config[0]) ? $config[0] : null;
                $RAM = isset($config[1]) ? $config[1] : null;
                $HDD = isset($config[2]) ? $config[2] : null;
                $this->setHardware($CPU, $RAM, $HDD);

                if ($CPU >= 0 && $RAM >= 0 && $HDD >= 0) {

                    return $this;
                } else {
                    throw  new Exception("Missing one value from the configuration file ");

                }
            } else {
                throw  new Exception("Configuration must be an array");
            }

        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    /**
     * @param $CPU
     * @param $RAM
     * @param $HDD
     * @return $this
     */
    public function setHardware($CPU, $RAM, $HDD)
    {
        try {
            $CPU = $this->validateConfiguration("CPU", $CPU);
            $RAM = $this->validateConfiguration("RAM", $RAM);
            $HDD = $this->validateConfiguration("HDD", $HDD);

            $this->setCPU($CPU);
            $this->setRAM($RAM);
            $this->setHDD($HDD);

        } catch (Exception $e) {
            exit($e->getMessage());
        }
        return $this;
    }


    /**
     * @return mixed
     */
    public function getHardware()
    {
        $list['CPU'] = $this->getCPU();
        $list['RAM'] = $this->getRAM();
        $list['HDD'] = $this->getHDD();

        return $list;
    }

    /**
     * @param $resources
     * @return mixed
     * @throws Exception
     */
    private function validateConfiguration($name, $resources)
    {
        if ($resources < 0) {
            throw new Exception(sprintf("Exception:: Resource %s expected to be positive, got %s", $name, $resources));
        }

        return $resources;
    }

    /**
     * @return mixed
     */
    public function getCPU()
    {
        return $this->CPU;
    }

    /**
     * @param mixed $CPU
     */
    public function setCPU($CPU)
    {
        $this->CPU = $CPU;
    }

    /**
     * @return mixed
     */
    public function getRAM()
    {
        return $this->RAM;
    }

    /**
     * @param mixed $RAM
     */
    public function setRAM($RAM)
    {
        $this->RAM = $RAM;
    }

    /**
     * @return mixed
     */
    public function getHDD()
    {
        return $this->HDD;
    }

    /**
     * @param mixed $HDD
     */
    public function setHDD($HDD)
    {
        $this->HDD = $HDD;
    }
}
