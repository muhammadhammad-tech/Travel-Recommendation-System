<?PHP
class BookingEntity
{
    public function __construct($bID = 0, $aID = 0, $aName = "", $dID = 0)
    {
        $this->setBookingID($bID);
        $this->setAgentID($aID);
        $this->setAgentName($aName);
        $this->setDepartureID($dID);
    }
    public function setAgentName($aName)
    {
        if ($aName != "") {
            $this->aName = $aName;
        } else {
            $this->aName = "Undefined";
        }
    }
    public function setDepartureID($dID)
    {
        if ($dID > 0)
            $this->departureID = $dID;
        else
            $this->departureID = 0;
    }

    public function setBookingID($bID)
    {
        if ($bID > 0)
            $this->bookingID = $bID;
        else
            $this->bookingID = 0;
    }

    public function setAgentID($agentID)
    {
        if ($agentID > 0)
            $this->agentID = $agentID;
        else
            $this->agentID = 0;
    }

    public function getBookingID()
    {
        return $this->bookingID;
    }

    public function getDepartureID()
    {
        return $this->departureID;
    }

    public function getAgentID()
    {
        return $this->agentID;
    }

    public function getAgentName()
    {
        return $this->aName;
    }

    public function __toString()
    {
        return $this->getBookingID() . " # " . $this->getAgentName() . "(" . $this->getBookingID() . ")";
    }


    private $bookingID;
    private $agentID;
    private $departureID;
    private $aName;
}
