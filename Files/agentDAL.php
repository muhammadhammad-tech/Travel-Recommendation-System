<?php
include "agentEntity.php";
include_once "DatabaseConnectivity.php";

class AgentDAL
{
    public function __construct()
    {
        $objDatabaseConnectivity = new DataBaseConnectivity();
        $this->objConnection = $objDatabaseConnectivity->getConnection();
    }

    public function showAllAgent()
    {
        $query = "call showAllAgent";
        $statement = $this->objConnection->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll();
        $agentList = array();

        foreach ($results as $row) {
            $objAgent = new AgentEntity();

            if ($row) {
                $objAgent->setAgentID($row["agentID"]);
                $objAgent->setAgentName($row["agentName"]);
                $objAgent->setAgentPhoneNo($row["phoneNo"]);
            }

            $agentList[] = $objAgent;
        }
        return $agentList;
    }

    public function insertAgent(AgentEntity $objAgentEntity)
    {
        $query = "call insertAgent(:agentID,:agentName, :phoneNo)";
        $statement = $this->objConnection->prepare($query);

        $agentID = $objAgentEntity->getAgentID();
        $agentName = $objAgentEntity->getAgentName();
        $phoneNo = $objAgentEntity->getAgentPhoneNo();

        $statement->bindParam(":agentID", $agentID);
        $statement->bindParam(":agentName", $agentName);
        $statement->bindParam(":phoneNo", $phoneNo);

        $statement->execute();
    }

    public function deleteAgentByID($agentID)
    {
        $query = "call deleteAgentByID(:agentID)";
        $statement = $this->objConnection->prepare($query);

        $statement->bindParam(":agentID", $agentID);

        $statement->execute();
    }

    public function getAgentByID($agentID)
    {
        $query = "call getAgentByID(:agentID)";
        $statement = $this->objConnection->prepare($query);
        $statement->bindParam(":agentID", $agentID);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $objAgent = new AgentEntity();

        if ($row) {
            $objAgent->setAgentID($row["agentID"]);
            $objAgent->setAgentName($row["agentName"]);
            $objAgent->setAgentPhoneNo($row["phoneNo"]);
        }

        return $objAgent;
    }

    public function updateAgent(AgentEntity $objAgentEntity)
    {
        $query = "call updateAgent(:agentID, :agentName, :phoneNo)";
        $statement = $this->objConnection->prepare($query);

        $agentID = $objAgentEntity->getAgentID();
        $agentName = $objAgentEntity->getAgentName();
        $phoneNo = $objAgentEntity->getAgentPhoneNo();

        $statement->bindParam(":agentID", $agentID);
        $statement->bindParam(":agentName", $agentName);
        $statement->bindParam(":phoneNo", $phoneNo);

        $statement->execute();
    }


    private $objConnection;
}
