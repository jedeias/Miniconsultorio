<?php  

require_once ($_SERVER['DOCUMENT_ROOT']."/miniconsultorio/app/config/host.php");

Class Connect extends Host{
    private $conn;
    public function __construct()
    {
        try{
            $host = $this->getHost();
            $dbname = $this->getDbName();
            $user = $this->getUserName();
            $pass = $this->getPass();

            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            //atributos para facilitar na tratariva de erros
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo 'Error in this connect with data base: ' . $e->getMessage();
        }
    }

	public function getConn() {
		return $this->conn;
	}

    public function __destruct()
    {
        $this->conn = null;
    }
}

?>