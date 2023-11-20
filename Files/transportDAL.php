<?php
include "transportEntity.php";
include_once "DatabaseConnectivity.php";

class TransportDAL
{
  public function __construct()
  {
    $objDatabaseConnectivity = new DataBaseConnectivity();
    $this->objConnection = $objDatabaseConnectivity->getConnection();
  }

  public function showAllTransports()
  {
    $query = "call showAllTransports";
    $statement = $this->objConnection->prepare($query);
    $statement->execute();

    $results = $statement->fetchAll();
    $transportList = array();

    foreach ($results as $row) {
      $objTransport = new TransportEntity();

      if ($row) {
        $objTransport->setTransportID($row["transportID"]);
        $objTransport->setTransportName($row["transportName"]);
      }

      $transportList[] = $objTransport;
    }
    return $transportList;
  }

  public function insertTransport(TransportEntity $objTransportEntity)
  {
    $query = "call insertTransport(:transportID, :transportName)";
    $statement = $this->objConnection->prepare($query);

    $transportID = $objTransportEntity->getTransportID();
    $transportName = $objTransportEntity->getTransportName();

    $statement->bindParam(":transportID", $transportID);
    $statement->bindParam(":transportName", $transportName);

    $statement->execute();
  }

  public function deleteTransportByID($transportID)
  {
    $query = "call deleteTransportByID(:transportID)";
    $statement = $this->objConnection->prepare($query);

    $statement->bindParam(":transportID", $transportID);

    $statement->execute();
  }

  public function getTransportByID($transportID)
  {
    $query = "call getTransportByID(:transportID)";
    $statement = $this->objConnection->prepare($query);
    $statement->bindParam(":transportID", $transportID);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $objTransport = new TransportEntity();

    if ($row) {
      $objTransport->setTransportID($row["transportID"]);
      $objTransport->setTransportName($row["transportName"]);
    }


    return $objTransport;
  }

  public function updateTransport(TransportEntity $objTransportEntity)
  {
    $query = "call updateTransport(:transportID, :transportName)";
    $statement = $this->objConnection->prepare($query);

    $transportID = $objTransportEntity->getTransportID();
    $transportName = $objTransportEntity->getTransportName();

    $statement->bindParam(":transportID", $transportID);
    $statement->bindParam(":transportName", $transportName);

    $statement->execute();
  }


  private $objConnection;
}
