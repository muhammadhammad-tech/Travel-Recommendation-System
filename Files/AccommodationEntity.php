<?PHP

class AccommodationEntity{
    public function __constuctor($accommodationID=0,$accommodationName="",$foodID=0)
    {
        $this->setAccommodationID($accommodationID);
        $this->setAccommodationName($accommodationName);
        $this->setFoodID($foodID);
    }

    public function setAccommodationID($accommodationID){
        if($accommodationID > 0)
            $this->accommodationID = $accommodationID;
        else
           $this->accommodationID = 0;
    }

    public function setAccommodationName($accommodationName){
        if($accommodationName != ""){
            $this->accommodationName = $accommodationName;
        }
        else{
            $this->accommodationName= "Undefined";
        }
    }

    public function setFoodID($foodID){
        if($foodID > 0){
            $this->foodID = $foodID;
        }
        else{
            $this->foodID= 0;
        }
    }

    public function getAccommodationID(){
        return $this->accommodationID;
    }

    public function getAccommodationName(){
        return $this->accommodationName;
    }

    public function getFoodID(){
        return $this->foodID;
    }

    public function __toString(){
        return $this->getAccommodationID().")- ".$this->getAccommodationName()."(".$this->getFoodID().")";
    }
    
    private $accommodationID;
    private $acommodationName;
    private $foodID;
}

?>