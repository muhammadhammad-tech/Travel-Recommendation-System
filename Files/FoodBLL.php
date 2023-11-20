<?php 
    include "FoodDAL.php";
    
    class FoodBLL{
        public function __construct(){
            $this->objFoodDAL = new FoodDAL();
        }
        public function showAllFoods(){
            return $this->objFoodDAL->showAllFoods();
        }
        public function insertFood(FoodEntity $objFoodEntity){
            $this->objFoodDAL->insertFood($objFoodEntity);
        }
        public function deleteFoodByID($foodID){
            $this->objFoodDAL->deleteFoodByID($foodID);
        }
        public function getFoodByID($foodID){
            return $this->objFoodDAL->getFoodByID($foodID);
        }
        public function updateFood(FoodEntity $objFoodEntity){
            $this->objFoodDAL->updateFood($objFoodEntity);
        }
        private $objFoodDAL;
    }
?>