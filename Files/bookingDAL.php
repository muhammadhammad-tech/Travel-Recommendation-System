<?php
include "bookingEntity.php";
include_once "DatabaseConnectivity.php";
class BookingDAL
{
    public function __construct()
    {
        $objDatabaseConnectivity = new DataBaseConnectivity();
        $this->objConnection = $objDatabaseConnectivity->getConnection();
    }

    public function showAllBooking()
    {
        $query = "call showAllBooking";
        $statement = $this->objConnection->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $bookingList = array();

        foreach ($results as $row) {
            $objBooking = new BookingEntity();
            if ($row) {
                $objBooking->setAgentName($row["agentName"]);
                $objBooking->setBookingID($row["bookingID"]);
                $objBooking->setAgentID($row["agentID"]);
                $objBooking->setDepartureID($row["departureID"]);
            }
            $bookingList[] = $objBooking;
        }
        return $bookingList;
    }

    public function insertBooking(BookingEntity $objBookingEntity)
    {
        $query = "call insertBooking(:bookingID,:agentID,:agentName,:departureID)";
        $statement = $this->objConnection->prepare($query);

        $bookingID = $objBookingEntity->getBookingID();
        $agentID = $objBookingEntity->getAgentID();
        $agentName = $objBookingEntity->getAgentName();
        $departureID = $objBookingEntity->getDepartureID();

        $statement->bindParam(":bookingID", $bookingID);
        $statement->bindParam(":agentID", $agentID);
        $statement->bindParam(":agentName", $agentName);
        $statement->bindParam(":departureID", $departureID);

        $statement->execute();
    }

    public function deleteBookingByID($bookingID)
    {
        $query = "call deleteBookingByID(:bookingID)";
        $statement = $this->objConnection->prepare($query);

        $statement->bindParam(":bookingID", $bookingID);

        $statement->execute();
    }

    public function getBookingByID($bookingID)
    {
        $query = "call getBookingByID(:bookingID)";
        $statement = $this->objConnection->prepare($query);
        $statement->bindParam(":bookingID", $bookingID);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $objBooking = new BookingEntity();
        if ($row) {
            $objBooking->setAgentName($row["agentName"]);
            $objBooking->setBookingID($row["bookingID"]);
            $objBooking->setAgentID($row["agentID"]);
            $objBooking->setDepartureID($row["departureID"]);
        }

        return $objBooking;
    }

    public function updateBooking(BookingEntity $objBookingEntity)
    {
        $query = "call updateBooking(:bookingID,:agentID,:agentName,:departureID)";
        $statement = $this->objConnection->prepare($query);

        $bookingID = $objBookingEntity->getBookingID();
        $agentID = $objBookingEntity->getAgentID();
        $agentName = $objBookingEntity->getAgentName();
        $departureID = $objBookingEntity->getDepartureID();

        $statement->bindParam(":bookingID", $bookingID);
        $statement->bindParam(":agentID", $agentID);
        $statement->bindParam(":agentName", $agentName);
        $statement->bindParam(":departureID ", $departureID);

        $statement->execute();
    }




    private $objConnection;
}
