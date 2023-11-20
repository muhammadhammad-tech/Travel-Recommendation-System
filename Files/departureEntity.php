<?PHP
class DepartureEntity
{
    public function __construct($dID = 0, $pID = 0)
    {
        $this->setDepartureID($dID);
        $this->setPackageID($pID);
    }



    public function setDepartureID($dID)
    {
        if ($dID > 0)
            $this->departureID = $dID;
        else
            $this->departureID = 0;
    }

    public function setPackageID($pID)
    {
        if ($pID > 0)
            $this->packageID = $pID;
        else
            $this->packageID = 0;
    }

    public function getPackageID()
    {
        return $this->packageID;
    }

    public function getDepartureID()
    {
        return $this->departureID;
    }
    public function __toString()
    {
        return  $this->getDepartureID() . " Package ID:" . $this->getPackageID();
    }


    private $departureID;
    private $packageID;
}
