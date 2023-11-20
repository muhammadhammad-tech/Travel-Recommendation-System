<?php
    include "EntertainmentDAL.php";

    class EntertainmentBLL{
        public function __construct(){
            $this->objEntertainmentDAL = new EntertainmentDAL();
        }
        public function showAllEntertainments(){
            return $this->objEntertainmentDAL->showAllEntertainments();
        }
        public function insertEntertainment(EntertainmentEntity $objEntertainmentEntity){
            $this->objEntertainmentDAL->insertEntertainment($objEntertainmentEntity);
        }
        public function deleteEntertainmentByID($entertainmentID){
            $this->objEntertainmentDAL->deleteEntertainmentByID($entertainmentID);
        }
        public function getEntertainmentByID($entertainmentID){
            return $this->objEntertainmentDAL->getEntertainmentByID($entertainmentID);
        }
        public function updateEntertainment(EntertainmentEntity $objEntertainmentEntity){
            $this->objEntertainmentDAL->updateEntertainment($objEntertainmentEntity);
        }
        private $objEntertainmentDAL;
    }
?>