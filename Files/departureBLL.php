<?php
include "departureDAL.php";
class DepartureBLL
{
    public function __construct()
    {
        $this->objDepartureDAL = new DepartureDAL();
    }
    public function showAllDepartures()
    {
        return $this->objDepartureDAL->showAllDepartures();
    }
    public function insertDeparture(DepartureEntity $objDepartureEntity)
    {
        $this->objDepartureDAL->insertDeparture($objDepartureEntity);
    }

    public function deleteDepartureByID($departureID)
    {
        $this->objDepartureDAL->deleteDepartureByID($departureID);
    }

    public function getDepartureByID($departureID)
    {
        return $this->objDepartureDAL->getDepartureByID($departureID);
    }

    public function updateDeparture(DepartureEntity $objDepartureEntity)
    {
        $this->objDepartureDAL->updateDeparture($objDepartureEntity);
    }
    private $objDepartureDAL;
}
