<?php
    include "DestinationEntity.php";
    include_once "DatabaseConnectivity.php";

    class DestinationDAL{
        public function __construct(){
            $objDataBaseConnectivity = new DataBaseConnectivity();
            $this->objConnection = $objDataBaseConnectivity->getConnection();
        }
        public function showAllDestinations(){
            $query = "call showAllDestinations()";
            $statement = $this->objConnection->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll();
            $DestinationList = array();
            foreach($results as $row){
                $objDestination = new DestinationEntity();
                $objDestination->setDestinationID($row["destinationID"]);
                $objDestination->setDestinationName($row["destinationName"]);
                $objDestination->setAccommodationID($row["accommodationID"]);
                $objDestination->setPackageID($row["packageID"]);
                $objDestination->setCustomerID($row["customerID"]);

                $DestinationList[] = $objDestination;
            }
            return $DestinationList;
        }
        public function insertDestination(DestinationEntity $objDestinationEntity){
            $query = "call insertDestination(:destinationID, :destinationName, :accommodationID, :packageID, :customerID)";
            $statement = $this->objConnection->prepare($query);

            $destinationID = $objDestinationEntity->getDestinationID();
            $destinationName = $objDestinationEntity->getDestinationName();
            $accommodationID = $objDestinationEntity->getAccommodationID();
            $packageID = $objDestinationEntity->getPackageID();
            $customerID = $objDestinationEntity->getCustomerID();
        
            $statement->bindParam(":destinationID", $destinationID);            
            $statement->bindParam(":destinationName", $destinationName);  
            $statement->bindParam(":accommodationID", $accommodationID); 
            $statement->bindParam(":packageID", $packageID); 
            $statement->bindParam(":customerID", $customerID);                     
                        
            $statement->execute();
        }
        public function deleteDestinationByID($destinationID){
            $query = "call deleteDestinationByID(:destinationID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":destinationID", $destinationID);            
            $statement->execute();
        }
        public function getDestinationByID($destinationID){
            $query = "call getDestinationByID(:destinationID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":destinationID", $destinationID);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $objDestination = new DestinationEntity();

            $objDestination->setDestinationID($row["destinationID"]);
            $objDestination->setDestinationName($row["destinationName"]);
            $objDestination->setAccommodationID($row["accommodationID"]);
            $objDestination->setPackageID($row["packageID"]);
            $objDestination->setCustomerID($row["customerID"]);

            return $objDestination;
        }
        public function updateDestination(DestinationEntity $objDestinationEntity){
            $query = "call updateDestination(:destinationID, :destinationName, :accommodationID, :packageID, :customerID)";
            $statement = $this->objConnection->prepare($query);

            $destinationID = $objDestinationEntity->getDestinationID();
            $destinationName = $objDestinationEntity->getDestinationName();
            $accommodationID = $objDestinationEntity->getAccommodationID();
            $packageID = $objDestinationEntity->getPackageID();
            $customerID = $objDestinationEntity->getCustomerID();
        
            $statement->bindParam(":destinationID", $destinationID);            
            $statement->bindParam(":destinationName", $destinationName);  
            $statement->bindParam(":accommodationID", $accommodationID); 
            $statement->bindParam(":packageID", $packageID); 
            $statement->bindParam(":customerID", $customerID);                                 
            
            $statement->execute();
        }
        private $objConnection;
    }
?>