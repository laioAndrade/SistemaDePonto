<?php

include "../connection/connection.php"


class API {
    
    public function __construct(){
        $this->connection = new Connection();

        $this->connection = $this->connection->DBConnect();
    }

    public function loginWeb($matricula, $senha){
        $query = "select * from usuario where matricula = $matricula and senha = $senha ";
        $query = mysqli_query($this->connection, $query);
        if (mysqli_fetch_assoc($query)) echo "sim";
        else echo "não"
    }

}

$requisicao = $_POST["requisicao"];

$api = new API();

switch($requisicao){
    case "login":
        return $api->login(
            $_POST["matricula"],
            $_POST["senha"] 
        );
}







?>