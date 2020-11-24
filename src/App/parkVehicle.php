<?php 
namespace App;

class parkVehicle
{

    /**
     * @param \App\Vehicle $vehicle
     * @param array        $geoLoc
     *
     * @return bool
     */
    public function parkVehicle(Vehicle $vehicle, array $geoLoc):bool
    {
        $vehicleGeoloc = $vehicle->getGeoLoc();
        if(empty(array_diff($vehicleGeoloc, $geoLoc))) {
            throw new \Exception('Vehicule already  parked a this location');
        }
        $vehicle->setGeoLoc($geoLoc);
    }
}
