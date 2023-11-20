<?PHP
class PackageEntity
{
    public function __construct($pID = 0, $pPrice = 0, $pName = "", $tID = 0)
    {
        $this->setPackageID($pID);
        $this->setPackageName($pName);
        $this->setPackagePrice($pPrice);
        $this->setTransportID($tID);
    }

    public function setPackageID($pID)
    {
        if ($pID > 0)
            $this->packageID = $pID;
        else
            $this->packageID = 0;
    }

    public function setPackageName($pName)
    {
        if ($pName != "")
            $this->packageName = $pName;
        else
            $this->packageName = "Undefined";
    }

    public function setPackagePrice($pPrice)
    {
        if ($pPrice > 0)
            $this->packagePrice = $pPrice;
        else
            $this->packagePrice = 0;
    }

    public function setTransportID($tID)
    {
        if ($tID > 0)
            $this->transportID = $tID;
        else
            $this->transID = 0;
    }

    public function getPackageID()
    {
        return $this->packageID;
    }

    public function getPackageName()
    {
        return $this->packageName;
    }

    public function getPackagePrice()
    {
        return $this->packagePrice;
    }

    public function getTransportID()
    {
        return $this->transportID;
    }
    public function __toString()
    {
        return $this->getPackageID() . "-" . $this->getPackageName() . "(" . $this->getPackagePrice() . "Rs" . ")";
    }
    private $packageID;
    private $packagePrice;
    private $packageName;
    private $transportID;
}
