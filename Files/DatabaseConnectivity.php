<?PHP
class DataBaseConnectivity{
    public function __construct(){
        $this->connection = new PDO("mysql:host=localhost; dbname=trip", "root", "");
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getConnection(){
        return $this->connection;
    }
    private $connection;
}
?>