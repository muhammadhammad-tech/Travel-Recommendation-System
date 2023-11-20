<?PHP

class CustomerEntity{
    public function __construct($customerID=0,$customerName="",$customerNumber="")
    {
        $this->setCustomerID($customerID);
        $this->setCustomerName($customerName);
        $this->setCustomerNumber($customerNumber);
    }

    public function setCustomerID($customerID){
        if($customerID > 0)
            $this->customerID = $customerID;
        else
           $this->customerID = 0;
    }

    public function setCustomerName($customerName){
        if($customerName != ""){
            $this->customerName = $customerName;
        }
        else{
            $this->customerName= "Undefined";
        }
    }

    public function setCustomerNumber($customerNumber){
        if($customerNumber != "")
            $this->customerNumber = $customerNumber;
        else
           $this->customerNumber = "Undefined";
    }

    public function getCustomerID(){
        return $this->customerID;
    }

    public function getCustomerName(){
        return $this->customerName;
    }

    public function getCustomerNumber(){
        return $this->customerNumber;
    }

    public function __toString(){
        return $this->getCustomerID().")- ".$this->getCustomerName()."(".$this->getCustomerNumber().")";
    }
    
    private $customerID;
    private $customerName;
    private $customerNumber;
}

?>