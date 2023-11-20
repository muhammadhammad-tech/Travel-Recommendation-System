<?php
    include "EntertainmentEntity.php";
    include_once "DatabaseConnectivity.php";

    class EntertainmentDAL{
        public function __construct(){
            $objDataBaseConnectivity = new DataBaseConnectivity();
            $this->objConnection = $objDataBaseConnectivity->getConnection();
        }
        public function showAllEntertainments(){
            $query = "call showAllEntertainments()";
            $statement = $this->objConnection->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll();
            $EntertainmentList = array();
            foreach($results as $row){
                $objEntertainment = new EntertainmentEntity();
                $objEntertainment->setEntertainmentID($row["entertainmentID"]);
                $objEntertainment->setEntertainmentName($row["entertainmentName"]);
                $objEntertainment->setAccommodationID($row["accommodationID"]);

                $EntertainmentList[] = $objEntertainment;
            }
            return $EntertainmentList;
        }
        public function insertEntertainment(EntertainmentEntity $objEntertainmentEntity){
            $query = "call insertEntertainment(:entertainmentID,:entertainmentName, :accommodationID)";
            $statement = $this->objConnection->prepare($query);

              $entertainmentID = $objEntertainmentEntity->getEntertainmentID();
            $entertainmentName = $objEntertainmentEntity->getEntertainmentName();
            $accommodationID = $objEntertainmentEntity->getAccommodationID();
        
             $statement->bindParam(":entertainmentID", $entertainmentID);            
            $statement->bindParam(":entertainmentName", $entertainmentName);                      
            $statement->bindParam(":accommodationID", $accommodationID);           
            
            $statement->execute();
        }
        public function deleteEntertainmentByID($entertainmentID){
            $query = "call deleteEntertainmentByID(:entertainmentID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":entertainmentID", $entertainmentID);            
            $statement->execute();
        }
        public function getEntertainmentByID($entertainmentID){
            $query = "call getEntertainmentByID(:entertainmentID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":entertainmentID", $entertainmentID);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $objEntertainment = new EntertainmentEntity();

            $objEntertainment->setEntertainmentID($row["entertainmentID"]);
            $objEntertainment->setEntertainmentName($row["entertainmentName"]);
            $objEntertainment->setAccommodationID($row["accommodationID"]);

            return $objEntertainment;
        }
        public function updateEntertainment(EntertainmentEntity $objEntertainmentEntity){
            $query = "call updateEntertainment(:entertainmentID,:entertainmentName, :accommodationID)";
            $statement = $this->objConnection->prepare($query);

              $entertainmentID = $objEntertainmentEntity->getEntertainmentID();
            $entertainmentName = $objEntertainmentEntity->getEntertainmentName();
            $accommodationID = $objEntertainmentEntity->getAccommodationID();
        
             $statement->bindParam(":entertainmentID", $entertainmentID);            
            $statement->bindParam(":entertainmentName", $entertainmentName);                      
            $statement->bindParam(":accommodationID", $accommodationID);           
            
            $statement->execute();
        }
        private $objConnection;
    }
?>