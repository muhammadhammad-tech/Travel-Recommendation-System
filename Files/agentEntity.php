<?PHP
class AgentEntity
{
    public function __construct($aID = 0, $aName = "", $phoneNo = "")
    {
        $this->setAgentID($aID);
        $this->setAgentName($aName);
        $this->setAgentPhoneNo($phoneNo);
    }

    public function setAgentID($aID)
    {
        if ($aID > 0)
            $this->agentID = $aID;
        else
            $this->agentID = 0;
    }

    public function setAgentName($aName)
    {
        if ($aName != "") {
            $this->agentName = $aName;
        } else {
            $this->agentName = "Undefined";
        }
    }

    public function setAgentPhoneNo($pNo)
    {
        if ($pNo != "") {
            $this->phoneNo = $pNo;
        } else {
            $this->phoneNo = "Undefined";
        }
    }

    public function getAgentID()
    {
        return $this->agentID;
    }

    public function getAgentName()
    {
        return $this->agentName;
    }

    public function getAgentPhoneNo()
    {
        return $this->phoneNo;
    }

    public function __toString()
    {
        return $this->getAgentID() . "- " . $this->getAgentName() . " - " . $this->getAgentPhoneNo();
    }
    private $agentID;
    private $agentName;
    private $phoneNo;
}
