<?PHP

class DestinationEntity{
    public function __constuctor($destinationID=0,$destinationName="",$accommodationID=0,$packageID=0,$customerID=0)
    {
        $this->setDestinationID($destinationID);
        $this->setDestinationName($destinationName);
        $this->setAccommodationID($accommodationID);
        $this->setPackageID($packageID);
        $this->setCustomerID($customerID);
    }

    public function setDestinationID($destinationID){
        if($destinationID > 0)
            $this->destinationID = $destinationID;
        else
           $this->destinationID = 0;
    }

    public function setDestinationName($destinationName){
        if($destinationName != ""){
            $this->destinationName = $destinationName;
        }
        else{
            $this->entertainmentName= "Undefined";
        }
    }

    public function setAccommodationID($accommodationID ){
        if($accommodationID > 0)
            $this->accommodationID = $accommodationID;
        else
           $this->accommodationID = 0;
    }

    public function setPackageID($packageID){
        if($packageID > 0)
            $this->packageID = $packageID;
        else
           $this->packageID = 0;
    }

    public function setCustomerID($customerID){
        if($customerID > 0)
            $this->customerID = $customerID;
        else
           $this->customerID = 0;
    }
    
    public function getDestinationID(){
        return $this->destinationID;
    }

    public function getDestinationName(){
        return $this->destinationName;
    }

    public function getAccommodationID(){
        return $this->accommodationID;
    }

    public function getPackageID(){
        return $this->packageID;
    }
    public function getCustomerID(){
        return $this->customerID;
    }

    public function __toString(){
        return $this->getDestinationID()."- ".$this->getDestinationName()."(".$this->getAccommodationID().")"."(".$this->getPackageID().")"."(".$this->getCustomerID().")";
    }
    
    private $destinationID;
    private $destinationName;
    private $accommodationID;
    private $packageID;
    private $customerID;
}

?>