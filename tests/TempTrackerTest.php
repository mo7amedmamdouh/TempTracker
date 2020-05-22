<?php

use PHPUnit\Framework\TestCase;

use Tracker\TempTracker;

class TempTrackerTest extends TestCase
{
    // Test Temp Values
    public $temperatures = [
        39,
        43,
        -50,
        12.5,
        45.1,
        33.6
    ];

    public function testInsertTemp()
    {
        $tempTracker = new TempTracker();

        foreach ($this->temperatures as $temperature) {
            $tempTracker->push($temperature);
        }

        $this->assertEquals(count($this->temperatures), count($tempTracker->getTemperatures()));

        return $tempTracker;
    }

    /**
     * @param TempTracker $tempTracker
     * @depends testInsertTemp
     */
    public function testInsertInvalidTemp(TempTracker $tempTracker)
    {
        $tempTracker->push("a");
        $this->assertEquals(count($this->temperatures), count($tempTracker->getTemperatures()));
    }

    /**
     * @param TempTracker $tempTracker
     * @depends testInsertTemp
     */
    public function testGetHighest(TempTracker $tempTracker)
    {
        $this->assertEquals(max($this->temperatures), $tempTracker->getHighest());
    }

    /**
     * @param TempTracker $tempTracker
     * @depends testInsertTemp
     */
    public function testGetLowest(TempTracker $tempTracker)
    {
        $this->assertEquals(min($this->temperatures), $tempTracker->getLowest());
    }

    /**
     * @param TempTracker $tempTracker
     * @depends testInsertTemp
     */
    public function testGetAvg(TempTracker $tempTracker)
    {
        $this->assertEquals(array_sum($this->temperatures) / count($this->temperatures), $tempTracker->getAvg());
    }
}