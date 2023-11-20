<?PHP
class TransportEntity
{
  public function __construct($tansportID = 0, $transportName = "")
  {
    $this->setTransportID($tansportID);
    $this->setTransportName($transportName);
  }

  public function setTransportID($tansportID)
  {
    if ($tansportID > 0)
      $this->transportID = $tansportID;
    else
      $this->transportID = 0;
  }

  public function setTransportName($transportName)
  {
    if ($transportName != "") {
      $this->transportName = $transportName;
    } else {
      $this->transportName = "Undefined";
    }
  }
  public function getTransportID()
  {
    return $this->transportID;
  }


  public function getTransportName()
  {
    return $this->transportName;
  }

  public function __toString()
  {
    return $this->getTransportID() . "- " . $this->getTransportName();
  }
  private $transportID;
  private $transportName;
}
