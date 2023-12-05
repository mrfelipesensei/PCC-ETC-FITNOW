<?php
include("../login/protect.php");

$userPerfil = $_SESSION['perfil'];
// var_dump($userPerfil);

$userId = $_SESSION['idUsuario'];
// var_dump($userId);

require_once __DIR__ ."/../src/dao/usuariodao.php";
include_once __DIR__ ."/../src/databases/conexao.php";

$dbh = Conexao::getConexao();
$query = "SELECT * FROM fitnow.usuarios WHERE idUsuario = $userId;";

// var_dump($query);

$stmt = $dbh->prepare($query);
$stmt->execute();

$usuario = $stmt->fetch();
$dbh = null;

//Foto
$userId = $_SESSION['idUsuario'];
const UPLOAD_DIR = "../img/usuarios/";
$foto_perfil = $_SESSION['usuario']['foto_perfil'];
$caminho_foto = UPLOAD_DIR . $foto_perfil;
// var_dump($caminho_foto );
// var_dump($_SESSION['usuario']['foto_perfil'] );

//se não houver foto cadastrada então redireciona para uma foto
if (!file_exists($caminho_foto) || empty($foto_perfil)) {
    $caminho_foto = "../img/usuarios/user.png"; // Caminho para a foto padrão
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/style.css" rel="stylesheet"> <!--style.css-->
    <link rel="stylesheet" href="../assests/css/table.css"> <!--estilo tabela-->
    <link rel="stylesheet" href="assests/css/index_style.css">
    <link rel="shortcut icon" href="../img/icons8-marcador-50.png">
    <link rel="stylesheet" href="../assests/css/cliente_user.css">
    <link rel="stylesheet" href="../assests/css/foto_perfil.css"> <!--foto perfil-->
    <title>Alterar Usuário</title>
    <style>
        #form_atualizacao{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="#" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="../login/painel_parceiro.php">Voltar</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div id="container_foto">
        <div id="foto">
            <img src="<?=$caminho_foto ?>" alt="imagem do Usuário" id="perfil_img">
        </div>
    </div>
    <br>
    <div id="form_atualizacao">
        <form action="atualizar_foto_parceiro.php" method="post" enctype="multipart/form-data">
            <input type="file" name="nova_foto_perfil" accept="image/*">
            <input type="submit" value="Atualizar Foto">
        </form>
    </div>
    <div class="box_container" >
        <div class="alterar" >
            <h1>Alterar Usuário</h1>
            <br>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="id" value="<?= $perfil ?>">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="" value="<?= htmlspecialchars($usuario['nome']) ?>"><br>
                </div>
                <br>
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="" maxlength="15" value="<?= htmlspecialchars($usuario['cpf']) ?>" readonly><br>
                </div>
                <br>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="" value="<?= htmlspecialchars($usuario['email']) ?>"><br>
                </div>
                <br>
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="" value="<?= htmlspecialchars($usuario['senha']) ?>"><br>
                </div>
                <br><br>
                <p>
                    <button type="submit">Salvar</button>
                </p>
            </form>
        </div>
    </div>
    <br>
    <p id="aviso" ><span>ATENÇÃO: </span>Suas informações serão atualizadas no próximo login</p>
</body>