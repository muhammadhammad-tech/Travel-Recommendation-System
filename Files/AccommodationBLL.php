<?php
    include "AccommodationDAL.php";

    class AccommodationBLL{
        public function __construct(){
            $this->objAccommodationDAL = new AccommodationDAL();
        }
        public function showAllAccommodations(){
            return $this->objAccommodationDAL->showAllAccommodations();
        }
        public function insertAccommodation(AccommodationEntity $objAccommodationEntity){
            $this->objAccommodationDAL->insertAccommodation($objAccommodationEntity);
        }
        public function deleteAccommodationByID($accommodationID){
            $this->objAccommodationDAL->deleteAccommodationByID($accommodationID);
        }
        public function getAccommodationByID($accommodationID){
            return $this->objAccommodationDAL->getAccommodationByID($accommodationID);
        }
        public function updateAccommodation(AccommodationEntity $objAccommodationEntity){
            $this->objAccommodationDAL->updateAccommodation($objAccommodationEntity);
        }
        private $objAccommodationDAL;
    }
?>