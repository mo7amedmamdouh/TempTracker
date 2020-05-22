<?php

namespace Tracker;

class TempTracker
{
    /**
     * @var float
     */
    private $minTemp = null; // Set Min Number of temperature that  any input would be less than it

    /**
     * @var float
     */
    private $maxTemp = null; // Set Min Number of temperature that any input would be greater than it

    /**
     * @var float
     */
    private $avgTemp = 0;

    /**
     * @var float
     */
    private $sumTemps = 0;

    /**
     * @var float
     */
    private $numOfTemps = 0;

    /**
     * @var array
     */
    private $temperatures = [];

    /**
     * @param $temperature
     */
    public function push($temperature)
    {
        if (is_numeric($temperature)) {
            $this->temperatures[] = $temperature;

            if ($this->maxTemp == null) {
                $this->maxTemp = $temperature;
                $this->minTemp = $temperature;
            } else if ($temperature > $this->maxTemp) {
                $this->maxTemp = $temperature;
            } else if ($temperature < $this->minTemp) {
                $this->minTemp = $temperature;
            }

            $this->numOfTemps++;
            $this->sumTemps += $temperature;

            $this->avgTemp = $this->sumTemps / $this->numOfTemps;
        }
    }

    /**
     * @return float
     */
    public function getHighest()
    {
        return $this->maxTemp;
    }

    /**
     * @return float
     */
    public function getLowest()
    {
        return $this->minTemp;
    }

    /**
     * @return float
     */
    public function getAvg()
    {
        return $this->avgTemp;
    }

    public function getTemperatures()
    {
        return $this->temperatures;
    }
}

