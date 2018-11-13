<?php

include "../connection/connection.php";
session_start();

class API {
    
    public function __construct(){
        $conn = new Connection();

        $this->connection = $conn->DBConnect();
    }

    public function loginWeb($matricula, $senha){

        
        $query = "select * from usuario where matricula = $matricula and senha = $senha ";
        $query = mysqli_query($this->connection, $query);
        
        if ($query){

            $dados = mysqli_fetch_assoc($query);

            $_SESSION['nome_usuario'] = $dados['nome'];
            $_SESSION['tipo_usuario'] = $dados['tipo_usuario'];
            return true;
        }
        else return false;
    }

    public function baterPonto($matricula, $senha){

        if($this->loginWeb($matricula, $senha)){

            $data = date("Y-m-d H:i:s");

            $query = "INSERT INTO ponto (matricula_usuario, data_ponto) VALUES ($matricula, '$data')";
            
            mysqli_query($this->connection, $query);

            echo "Ponto batido com sucesso!";
            
        }else
            echo "Não foi possível bater o ponto, o usuário informado não existe";
    }


    public function insertUser($nome, $matricula, $cpf, $endereco, $email, $nascimento, $senha, $tipo_usuario){
        
        /* verificando se já existe o usuário */
        if(!$this->getUser($matricula)){

            $query = "INSERT INTO usuario 
                (nome, matricula, cpf, endereco, email, nascimento, senha, tipo_usuario, biometria) VALUES
                ('$nome', $matricula, '$cpf', '$endereco', '$email', '$nascimento', '$senha', '$tipo_usuario', 'ada')";

            mysqli_query($this->connection, $query);
            
            $_SESSION['msg'] = "<div class = 'alert alert-success'>Usuário cadastrado com sucesso!</div>";


        }else{
            $_SESSION['msg'] = "<div class = 'alert alert-danger'>Erro ao cadastrar usuário, essa matrícula já está em uso</div>";
        }

        header("Location: ../front/home.php");
        
    }

    public function getUsers($user){

        $query = "SELECT * FROM usuario WHERE tipo_usuario = '$user'";

        return mysqli_query($this->connection, $query);

    }

    public function getUser($matricula){
        
        $query = "SELECT * FROM usuario WHERE matricula = $matricula";

        return mysqli_fetch_assoc(mysqli_query($this->connection, $query));
    }

}

$requisicao = isset($_POST["requisicao"]) ? $_POST['requisicao'] : false;

if($requisicao){

    $api = new API();

    switch($requisicao){

        case "login":

            if($api->loginWeb(
                $_POST["matricula"],
                $_POST["senha"] 
            )) header("Location: ../front/home.php");

            else header("Location: ../index.php?err=1");

            break;


        case "ponto":
            return $api->baterPonto(
                $_POST['matricula'],
                $_POST['senha']
            );

        case "novo_usuario":

            return $api->insertUser(
                $_POST['nome'],
                $_POST['matricula'],
                $_POST['cpf'],
                $_POST['endereco'],
                $_POST['email'],
                $_POST['nascimento'],
                $_POST['senha'],
                $_POST['tipo_usuario']
            );
        }
}


?>