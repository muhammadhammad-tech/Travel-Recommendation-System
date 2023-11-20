<?php
    include "AccommodationEntity.php";
    include_once "DatabaseConnectivity.php";

    class AccommodationDAL{
        public function __construct(){
            $objDataBaseConnectivity = new DataBaseConnectivity();
            $this->objConnection = $objDataBaseConnectivity->getConnection();
        }
        public function showAllAccommodations(){
            $query = "call showAllAccommodations()";
            $statement = $this->objConnection->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll();
            $AccommodationList = array();
            foreach($results as $row){
                $objAccommodation = new AccommodationEntity();
                $objAccommodation->setAccommodationID($row["accommodationID"]);
                $objAccommodation->setAccommodationName($row["accommodationName"]);
                $objAccommodation->setFoodID($row["foodID"]);

                $AccommodationList[] = $objAccommodation;
            }
            return $AccommodationList;
        }
        public function insertAccommodation(AccommodationEntity $objAccommodationEntity){
            $query = "call insertAccommodation(:accommodationID, :accommodationName, :foodID)";
            $statement = $this->objConnection->prepare($query);

            $accommodationID = $objAccommodationEntity->getAccommodationID();
            $accommodationName = $objAccommodationEntity->getAccommodationName();
            $foodID=$objAccommodationEntity->getFoodID();
        
            $statement->bindParam(":accommodationID", $accommodationID);            
            $statement->bindParam(":accommodationName", $accommodationName);                      
            $statement->bindParam(":foodID", $foodID);            
            
            $statement->execute();
        }
        public function deleteAccommodationByID($accommodationID){
            $query = "call deleteAccommodationByID(:accommodationID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":accommodationID", $accommodationID);            
            $statement->execute();
        }
        public function getAccommodationByID($accommodationID){
            $query = "call getAccommodationByID(:accommodationID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":accommodationID", $accommodationID);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $objAccommodation = new AccommodationEntity();

            $objAccommodation->setAccommodationID($row["accommodationID"]);
            $objAccommodation->setAccommodationName($row["accommodationName"]);
            $objAccommodation->setFoodID($row["foodID"]);

            return $objAccommodation;
        }
        public function updateAccommodation(AccommodationEntity $objAccommodationEntity){
            $query = "call updateAccommodation(:accommodationID, :accommodationName, :foodID)";
            $statement = $this->objConnection->prepare($query);

            $accommodationID = $objAccommodationEntity->getAccommodationID();
            $accommodationName = $objAccommodationEntity->getAccommodationName();
            $foodID=$objAccommodationEntity->getFoodID();
        
            $statement->bindParam(":accommodationID", $accommodationID);            
            $statement->bindParam(":accommodationName", $accommodationName);                      
            $statement->bindParam(":foodID", $foodID);            
            
            $statement->execute();
        }
        private $objConnection;
    }
