
<?php

    include "../API/api.php";

    $api = new API();

    $msg = $_SESSION['msg'];
    $_SESSION['msg'] = "";

    /* Recuperando os professores */
    if($_SESSION['tipo_usuario'] == "Diretor"){
        $professores = $api->getUsers("Professor");
    }
    
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Sistema de Ponto - Home</title>

	<link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
	<script
	src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    
    <script type = "text/javascript" src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
	<script type = "text/javascript" src = "../js/functions.js"></script>

</head>

<body>
	
	<div>
        <nav class="navbar navbar-expand-lg navbar-light bg-color">
            <h3 class="navbar-brand">Sistema de Pontos</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Início</a>
                </li>
                <li class="nav-item">
                    <a data-toggle = 'collapse' data-target = '#gerenciar_professores' class="nav-link" href="#">Gerenciar Professores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gerenciar Relatórios</a>
                </li>

                </ul>
            </div>
        </nav>


        <?= $msg ?>

        <h5 class = 'text-center margin-top'>Usuário ativo: <?= $_SESSION['nome_usuario'] ?></h5>
        <h5 class = 'text-center margin-top'>Tipo de usuário: <?= $_SESSION['tipo_usuario'] ?></h5>


        <!-- Gerenciar professores -->
        <div id = "gerenciar_professores" class = 'collapse content'>

            <form method = 'POST' action = "../API/api.php">
                <input type = 'hidden' name = 'tipo_usuario' value = 'Professor'>
                <input type = 'hidden' name = 'requisicao' value = 'novo_usuario'>
                <div class = "row">
                    <div class = "col-md-4">
                        <label>Nome do Professor</label>
                        <input required class = "form-control" placeholder = "Nome do professor" name = 'nome'>
                    </div>

                    <div class = "col-md-4">
                        <label>Matrícula do Professor</label>
                        <input required  class = "form-control" placeholder = "Matrícula" name = 'matricula'>
                    </div>
                    <div class = "col-md-4">
                        <label>CPF do Professor</label>
                        <input required  class = "form-control" placeholder = "CPF" name = 'cpf'>
                    </div>
                </div>

                <div class = "row margin-top">
                    <div class = "col-md-3">
                        <label>Endereço</label>
                        <input required  class = "form-control" placeholder = "Endereço" name = 'endereco'>
                    </div>

                    <div class = "col-md-3">
                        <label>E-mail</label>
                        <input required  type = 'email' class = "form-control" placeholder = "E-mail" name = 'email'>
                    </div>
                    <div class = "col-md-3">
                        <label>Data de Nascimento</label>
                        <input required  class = "form-control" type = 'date' name = 'nascimento'>
                    </div>
                    <div class = "col-md-3">
                        <label>Senha</label>
                        <input required  class = "form-control" type = 'password' name = 'senha'>
                    </div>
                </div>
                        
                <button class = 'btn btn-success margin-bottom margin-top'><i class = 'fa fa-user-plus icon'></i>Cadastrar Professor</button>
            
            </form>

            <table class="table margin-top">
                <thead class = 'thead-dark'>
                    <tr>
                        <th scope="col">Matricula</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Nascimento</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while($row = mysqli_fetch_assoc($professores)){ ?>
                        <td><?= $row['matricula'] ?></td>
                        <td><?= $row['nome'] ?></td>
                        <td><?= $row['cpf'] ?></td>
                        <td><?= $row['endereco'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['nascimento'] ?></td>
                    <?php } ?>
                    
                </tbody>
                </table>

        </div>
        <!-- Gerenciar professores -->

    </div>


</body>

</html>