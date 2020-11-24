<?php
namespace App;

use vehicle;
use parkVehicle;

class app 
{
  /** @var $myFleet vehicle[] */
  protected $myFleet;
  
  /** @var $parkVehicleService parkVehicle */
  protected $parkVehicleService;
  
  /**
   * App Constructor
   * 
   *@param parkVehicle $parkVehicleService
   */
  public function __construct(parkVehicle $parkVehicleService)
  {
    $this->myFleet = [];
    $this->parkVehicleService = $parkVehicleService;
  }
  
  public function registerVehicle(array $data)
  {
    if(empty($data) || !isset($data['type']) || !isset($data['licence_plate']) || !isset($data['name']) {
      throw new \Exception('Vehicle data not valid');
    }
    if(isset($this->myFleet[$data['licence_plate']])) {
      throw new \Exception('Vehicle already registred');
    }
    $vehicle = new vehicle();
    $vehicle->populateFromArray($data); 
    $this->myFleet[$data['licence_plate']] = $vehicle; 
  }
       
   
}
