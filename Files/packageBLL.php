<?php
include "packageDAL.php";
class PackageBLL
{
    public function __construct()
    {
        $this->objPackageDAL = new PackageDAL();
    }
    public function showAllPackage()
    {
        return $this->objPackageDAL->showAllPackage();
    }
    public function insertPackage(PackageEntity $objPackageEntity)
    {
        $this->objPackageDAL->insertPackage($objPackageEntity);
    }

    public function deletePackageByID($packageID)
    {
        $this->objPackageDAL->deletePackageByID($packageID);
    }

    public function getPackageByID($packageID)
    {
        return $this->objPackageDAL->getPackageByID($packageID);
    }

    public function updatePackage(PackageEntity $objPackageEntity)
    {
        $this->objPackageDAL->updatePackage($objPackageEntity);
    }
    private $objPackageDAL;
}
