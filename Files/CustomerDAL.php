<?php
    include "CustomerEntity.php";
    include_once "DatabaseConnectivity.php";

    class CustomerDAL{
        public function __construct(){
            $objDataBaseConnectivity = new DataBaseConnectivity();
            $this->objConnection = $objDataBaseConnectivity->getConnection();
        }
        public function showAllCustomers(){
            $query = "call showAllCustomers()";
            $statement = $this->objConnection->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll();
            $CustomerList = array();
            foreach($results as $row){
                $objCustomer = new CustomerEntity();
                $objCustomer->setCustomerID($row["customerID"]);
                $objCustomer->setCustomerName($row["customerName"]);
                $objCustomer->setCustomerNumber($row["customerNumber"]);

                $CustomerList[] = $objCustomer;
            }
            return $CustomerList;
        }
        public function insertCustomer(CustomerEntity $objCustomerEntity){
            $query = "call insertCustomer(:customerID, :customerName, :customerNumber)";
            $statement = $this->objConnection->prepare($query);

            $customerID = $objCustomerEntity->getCustomerID();
            $customerName = $objCustomerEntity->getCustomerName();
            $customerNumber = $objCustomerEntity->getCustomerNumber();
        
            $statement->bindParam(":customerID", $customerID);            
            $statement->bindParam(":customerName", $customerName);                      
            $statement->bindParam(":customerNumber", $customerNumber);            
            
            $statement->execute();
        }
        public function deleteCustomerByID($customerID){
            $query = "call deleteCustomerByID(:customerID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":customerID", $customerID);            
            $statement->execute();
        }
        public function getCustomerByID($customerID){
            $query = "call getCustomerByID(:customerID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":customerID", $customerID);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $objCustomer = new CustomerEntity();

            $objCustomer->setCustomerID($row["customerID"]);
            $objCustomer->setCustomerName($row["customerName"]);
            $objCustomer->setCustomerNumber($row["customerNumber"]);

            return $objCustomer;
        }
        public function updateCustomer(CustomerEntity $objCustomerEntity){
            $query = "call updateCustomer(:customerID, :customerName,:customerNumber)";
            $statement = $this->objConnection->prepare($query);

            $customerID = $objCustomerEntity->getCustomerID();
            $customerName = $objCustomerEntity->getCustomerName();
            $customerNumber = $objCustomerEntity->getCustomerNumber();
        
            $statement->bindParam(":customerID", $customerID);            
            $statement->bindParam(":customerName", $customerName);                       
            $statement->bindParam(":customerNumber", $customerNumber);            
            
            $statement->execute();
        }
        private $objConnection;
    }
?>