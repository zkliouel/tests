<?php

namespace App;

/** @todo create specific exception */
/** @todo manage exception */
class App
{
    /** @var $myFleet Vehicle[] */
    protected $myFleet;

    /** @var $parkVehicleService ParkVehicle */
    protected $parkVehicleService;

    /**
     * App Constructor
     *
     * @param ParkVehicle $parkVehicleService
     */
    public function __construct(ParkVehicle $parkVehicleService)
    {
        $this->myFleet = [];
        $this->parkVehicleService = $parkVehicleService;
    }

    /**
     * @param array $vehicleData
     *
     * @throws \Exception
     *
     * @todo move it into a service
     * @todo use const for keys
     */
    public function registerVehicle(array $vehicleData)
    {
        if (!Vehicle::validateData($vehicleData)) {
            throw new \Exception('Vehicle data not valid');
        }
        if (isset($this->myFleet[$vehicleData['licence_plate']])) {
            throw new \Exception('Vehicle already registred');
        }
        $vehicle = new Vehicle();
        $vehicle->populateFromArray($vehicleData);
        $this->myFleet[$vehicleData['licence_plate']] = $vehicle;
    }

    /**
     * @param string $licencePlate
     * @param array  $geoLoc
     *
     * @return bool
     * @throws \Exception
     */
    public function parkVehicle(string $licencePlate, array $geoLoc)
    {
        if (!isset($this->myFleet[$licencePlate])) {
            throw new \Exception('Vehicle not in fleet, register it');
        }
        $vehicle = $this->myFleet[$licencePlate];
        if(empty($vehicle->getGeoLoc())) {
            $vehicle->setGeoLoc($geoLoc);
            return true;
        }
        try {
            $this->parkVehicleService->parkVehicle($vehicle, $geoLoc);
            return true;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}
