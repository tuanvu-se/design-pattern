<?php

namespace WeatherMonitor;

/**
 * Class WeatherData.
 */
class WeatherData implements SubjectInterface
{
    /**
     * @var ObserverInterface[]
     */
    private $observers = [];

    /**
     * @var float
     */
    private $temperature;

    /**
     * @var float
     */
    private $humidity;

    /**
     * @var float
     */
    private $pressure;

    /**
     * {@inheritdoc}
     */
    public function attach(ObserverInterface $observer): void
    {
        $index = array_search($observer, $this->observers);
        if (false === $index) {
            $this->observers[] = $observer;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function detach(ObserverInterface $observer): void
    {
        $index = array_search($observer, $this->observers);
        if (false !== $index) {
            unset($this->observers[$index]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Gets weather temperature data.
     *
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * Gets weather humidity data.
     *
     * @return float
     */
    public function getHumidity(): float
    {
        return $this->humidity;
    }

    /**
     * Gets weather pressure data.
     *
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * This method gets called
     * whenever the weather measurements
     * have been updated.
     *
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     */
    public function measurementsChanged(float $temperature, float $humidity, float $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;

        $this->notify();
    }
}