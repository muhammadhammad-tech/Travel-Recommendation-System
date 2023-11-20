<?php
    include "DestinationDAL.php";

    class DestinationBLL{
        public function __construct(){
            $this->objDestinationDAL = new DestinationDAL();
        }
        public function showAllDestinations(){
            return $this->objDestinationDAL->showAllDestinations();
        }
        public function insertDestination(DestinationEntity $objDestinationEntity){
            $this->objDestinationDAL->insertDestination($objDestinationEntity);
        }
        public function deleteDestinationByID($destinationID){
            $this->objDestinationDAL->deleteDestinationByID($destinationID);
        }
        public function getDestinationByID($destinationID){
            return $this->objDestinationDAL->getDestinationByID($destinationID);
        }
        public function updateDestination(DestinationEntity $objDestinationEntity){
            $this->objDestinationDAL->updateDestination($objDestinationEntity);
        }
        private $objDestinationDAL;
    }
?>