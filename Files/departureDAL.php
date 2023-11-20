<?php
include "departureEntity.php";
include_once "DatabaseConnectivity.php";

class DepartureDAL
{
    public function __construct()
    {
        $objDatabaseConnectivity = new DataBaseConnectivity();
        $this->objConnection = $objDatabaseConnectivity->getConnection();
    }

    public function showAllDepartures()
    {
        $query = "call showAllDepartures";
        $statement = $this->objConnection->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $departureList = array();

        foreach ($results as $row) {
            $objDeparture = new DepartureEntity();

            if ($row) {

                $objDeparture->setDepartureID($row["departureID"]);
                $objDeparture->setPackageID($row["packageID"]);
            }

            $departureList[] = $objDeparture;
        }
        return $departureList;
    }

    public function insertDeparture(DepartureEntity $objDepartureEntity)
    {
        $query = "call insertDeparture(:departureID,:packageID)";
        $statement = $this->objConnection->prepare($query);

        $departureID = $objDepartureEntity->getDepartureID();
        $packageID = $objDepartureEntity->getPackageID();

        $statement->bindParam(":departureID", $departureID);
        $statement->bindParam(":packageID", $packageID);

        $statement->execute();
    }

    public function deleteDepartureByID($departureID)
    {
        $query = "call deleteDepartureByID(:departureID)";
        $statement = $this->objConnection->prepare($query);

        $statement->bindParam(":departureID", $departureID);

        $statement->execute();
    }

    public function getDepartureByID($departureID)
    {
        $query = "call getDepartureByID(:departureID)";
        $statement = $this->objConnection->prepare($query);
        $statement->bindParam(":departureID", $departureID);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $objDeparture = new DepartureEntity();
        if ($row) {
            $objDeparture->setDepartureID($row["departureID"]);
            $objDeparture->setPackageID($row["packageID"]);
        }


        return $objDeparture;
    }

    public function updateDeparture(DepartureEntity $objDepartureEntity)
    {
        $query = "call updateDeparture(:departureID, :packageID)";
        $statement = $this->objConnection->prepare($query);

        $departureID = $objDepartureEntity->getDepartureID();
        $packageID = $objDepartureEntity->getPackageID();

        $statement->bindParam(":departureID", $departureID);
        $statement->bindParam(":packageID", $packageID);

        $statement->execute();
    }


    private $objConnection;
}
