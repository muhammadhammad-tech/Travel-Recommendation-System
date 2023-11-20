<?php
    include "FoodEntity.php";
    include_once "DatabaseConnectivity.php";
    class FoodDAL{
        public function __construct(){
            $objDataBaseConnectivity = new DataBaseConnectivity();
            $this->objConnection = $objDataBaseConnectivity->getConnection();
        }
        public function showAllFoods(){
            $query = "call showAllFoods()";
            $statement = $this->objConnection->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll();
            $foodList = array();
            foreach($results as $row){
                $objFood = new FoodEntity();

                $objFood->setFoodID($row["foodID"]);
                $objFood->setFoodPrice($row["foodPrice"]);
                $objFood->setFoodName($row["foodName"]);
                

                $foodList[] = $objFood;
            }
            return $foodList;
        }
        public function insertFood(FoodEntity $objFoodEntity){
            $query = "call insertFood(:foodID, :foodPrice,:foodName)";
            $statement = $this->objConnection->prepare($query);
            
            $foodID = $objFoodEntity->getFoodID();
            $foodPrice = $objFoodEntity->getFoodPrice();
            $foodName = $objFoodEntity->getFoodName();
            
        
            $statement->bindParam(":foodID", $foodID);
            $statement->bindParam(":foodPrice", $foodPrice); 
            $statement->bindParam(":foodName", $foodName);  
                                          
            
            $statement->execute();
            
        }
        public function deleteFoodByID($foodID){
            $query = "call deleteFoodByID(:foodID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":foodID", $foodID);            
            $statement->execute();
        }
        public function getFoodByID($foodID){
            $query = "call getFoodByID(:foodID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":foodID", $foodID);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $objFood= new FoodEntity();
            if($row){
            $objFood->setFoodID($row["foodID"]);
            $objFood->setFoodPrice($row["foodPrice"]);
            $objFood->setFoodName($row["foodName"]);
            
            }

            return $objFood;
        }
        public function updateFood(FoodEntity $objFoodEntity){
            $query = "call updateFood(:foodID,:foodPrice,:foodName)";
            $statement = $this->objConnection->prepare($query);
            
            $foodID = $objFoodEntity->getFoodID();
            $foodPrice = $objFoodEntity->getFoodPrice();
            $foodName = $objFoodEntity->getFoodName();
            
            
            $statement->bindParam(":foodID", $foodID);     
            $statement->bindParam(":foodPrice", $foodPrice);
            $statement->bindParam(":foodName", $foodName); 
            
            $statement->execute();
        }
        private $objConnection;
    } 
?>