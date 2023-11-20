<?php
    include "CustomerDAL.php";

    class CustomerBLL{
        public function __construct(){
            $this->objCustomerDAL = new CustomerDAL();
        }
        public function showAllCustomers(){
            return $this->objCustomerDAL->showAllCustomers();
        }
        public function insertCustomer(CustomerEntity $objCustomerEntity){
            $this->objCustomerDAL->insertCustomer($objCustomerEntity);
        }
        public function deleteCustomerByID($customerID){
            $this->objCustomerDAL->deleteCustomerByID($customerID);
        }
        public function getCustomerByID($customerID){
            return $this->objCustomerDAL->getCustomerByID($customerID);
        }
        public function updateCustomer(CustomerEntity $objCustomerEntity){
            $this->objCustomerDAL->updateCustomer($objCustomerEntity);
        }
        private $objCustomerDAL;
    }
?>