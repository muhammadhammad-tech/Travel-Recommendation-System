<?php
include "transportDAL.php";
class TransportBLL {
    public function __construct()
    {
        $this->objTransportDAL = new transportDAL();
    }
    public function showAllTransports(){
        return $this->objTransportDAL->showAllTransports();
    }
    public function insertTransport(TransportEntity $objTransportEntity){
        $this->objTransportDAL->insertTransport($objTransportEntity);
    }

    public function deleteTransportByID($transportID){
        $this->objTransportDAL->deleteTransportByID($transportID);
    }

    public function getTransportByID($transportID){
        return $this->objTransportDAL->getTransportByID($transportID);
    }

    public function updateTransport(TransportEntity $objTransportEntity)
    {
        $this->objTransportDAL->updateTransport($objTransportEntity);
    }
   private $objTransportDAL;

}
