<?php
include "packageEntity.php";
include_once "DatabaseConnectivity.php";

class PackageDAL
{
    public function __construct()
    {
        $objDatabaseConnectivity = new DataBaseConnectivity();
        $this->objConnection = $objDatabaseConnectivity->getConnection();
    }

    public function showAllPackage()
    {
        $query = "call showAllPackage";
        $statement = $this->objConnection->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $packageList = array();

        foreach ($results as $row) {
            $objPackage = new PackageEntity();

            if ($row) {
                $objPackage->setPackageID($row["packageID"]);
                $objPackage->setPackagePrice($row["packagePrice"]);
                $objPackage->setPackageName($row["packageName"]);
                $objPackage->setTransportID($row["transportID"]);
            }



            $packageList[] = $objPackage;
        }
        return $packageList;
    }

    public function insertPackage(PackageEntity $objPackageEntity)
    {
        $query = "call insertPackage(:packageID,:packagePrice,:packageName,:transportID)";
        $statement = $this->objConnection->prepare($query);

        $packageID = $objPackageEntity->getPackageID();
        $packagePrice = $objPackageEntity->getPackagePrice();
        $packageName = $objPackageEntity->getPackageName();
        $transportID = $objPackageEntity->getTransportID();

        $statement->bindParam(":packageID", $packageID);
        $statement->bindParam(":packagePrice", $packagePrice);
        $statement->bindParam(":packageName", $packageName);
        $statement->bindParam(":transportID", $transportID);

        $statement->execute();
    }

    public function deletePackageByID($packageID)
    {
        $query = "call deletePackageByID(:packageID)";
        $statement = $this->objConnection->prepare($query);

        $statement->bindParam(":packageID", $packageID);

        $statement->execute();
    }

    public function getPackageByID($packageID)
    {
        $query = "call getPackageByID(:packageID)";
        $statement = $this->objConnection->prepare($query);
        $statement->bindParam(":packageID", $packageID);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $objPackage = new PackageEntity();

        if ($row) {
            $objPackage->setPackageID($row["packageID"]);
            $objPackage->setPackageName($row["packageName"]);
            $objPackage->setPackagePrice($row["packagePrice"]);
            $objPackage->setTransportID($row["transportID"]);
        }


        return $objPackage;
    }

    public function updatePackage(PackageEntity $objPackageEntity)
    {
        $query = "call updatePackage(:packageID,:packagePrice,:packageName,:transportID)";
        $statement = $this->objConnection->prepare($query);

        $packageID = $objPackageEntity->getPackageID();
        $packagePrice = $objPackageEntity->getPackagePrice();
        $packageName = $objPackageEntity->getPackageName();
        $transportID = $objPackageEntity->getTransportID();

        $statement->bindParam(":packageID", $packageID);
        $statement->bindParam(":packagePrice", $packagePrice);
        $statement->bindParam(":packageName", $packageName);
        $statement->bindParam(":transportID", $transportID);

        $statement->execute();
    }


    private $objConnection;
}
