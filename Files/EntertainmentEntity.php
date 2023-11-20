<?PHP

class EntertainmentEntity{
    public function __constuctor($entertainmentID=0,$entertainmentName="",$accommodationID=0)
    {
        $this->setEntertainmentID($entertainmentID);
        $this->setEntertainmentName($entertainmentName);
        $this->setAccommodationID($accommodationID);
    }

    public function setEntertainmentID($entertainmentID){
        if($entertainmentID > 0)
            $this->entertainmentID = $entertainmentID;
        else
           $this->entertainmentID = 0;
    }

    public function setEntertainmentName($entertainmentName){
        if($entertainmentName != ""){
            $this->entertainmentName = $entertainmentName;
        }
        else{
            $this->entertainmentName= "Undefined";
        }
    }

    public function setAccommodationID($accommodationID){
        if($accommodationID > 0)
            $this->accommodationID = $accommodationID;
        else
           $this->accommodationID = 0;
    }

    public function getEntertainmentID(){
        return $this->entertainmentID;
    }

    public function getEntertainmentName(){
        return $this->entertainmentName;
    }

    public function getAccommodationID(){
        return $this->accommodationID;
    }

    public function __toString(){
        return $this->getEntertainmentID()."- ".$this->getEntertainmentName()."(".$this->getAccommodationID().")";
    }
    
    private $entertainmentID;
    private $entertainmentName;
    private $accommodationID;
}

?>