<?php
include "bookingDAL.php";
class BookingBLL
{
    public function __construct()
    {
        $this->objBookingDAL = new BookingDAL();
    }

    public function showAllBooking()
    {
        return $this->objBookingDAL->showAllBooking();
    }

    public function insertBooking(BookingEntity $objBookingEntity)
    {
        $this->objBookingDAL->insertBooking($objBookingEntity);
    }

    public function deleteBookingByID($bookingID)
    {
        $this->objBookingDAL->deleteBookingByID($bookingID);
    }

    public function getBookingByID($bookingID)
    {
        return $this->objBookingDAL->getBookingByID($bookingID);
    }

    public function updateBooking(BookingEntity $objBookingEntity)
    {
        $this->objBookingDAL->updateBooking($objBookingEntity);
    }
    private $objBookingDAL;
}
