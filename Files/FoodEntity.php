<?PHP

class FoodEntity{
    public function __constuctor($foodID=0,$foodName="",$foodPrice=0)
    {
        $this->setFoodID($foodID);
        $this->setFoodName($foodName);
        $this->setFoodPrice($foodPrice);
    }

    public function setFoodID($foodID){
        if($foodID > 0){
            $this->foodID = $foodID;
        }
        else{
            $this->foodID = 0;
        }
    }

    public function setFoodName($foodName){
        if($foodName != ""){
            $this->foodName = $foodName;
        }
        else{
            $this->foodName= "Undefined";
        }
    }

    public function setFoodPrice($foodPrice){
        if($foodPrice > 0)
            $this->foodPrice = $foodPrice;
        else
           $this->foodPrice = 0;
    }

    public function getFoodID(){
        return $this->foodID;
    }
    public function getFoodName(){
        return $this->foodName;
    }

    public function getFoodPrice(){
        return $this->foodPrice;
    }

    public function __toString(){
        return $this->getFoodID().")-".$this->getFoodName()."-(".$this->getFoodPrice().")";
    }

    private $foodID;
    private $foodName;
    private $foodPrice;
}

?>