<?php
include "agentDAL.php";
class AgentBLL {
    public function __construct()
    {
        $this->objAgentDAL = new AgentDAL();
    }
    public function showAllAgent(){
        return $this->objAgentDAL->showAllAgent();
    }
    public function insertAgent(AgentEntity $objAgentEntity){
        $this->objAgentDAL->insertAgent($objAgentEntity);
    }

    public function deleteAgentByID($agentID){
        $this->objAgentDAL->deleteAgentByID($agentID);
    }

    public function getAgentByID($agentID){
        return $this->objAgentDAL->getAgentByID($agentID);
    }

    public function updateAgent(AgentEntity $objAgentEntity)
    {
        $this->objAgentDAL->updateAgent($objAgentEntity);
    }
   private $objAgentDAL;

}
