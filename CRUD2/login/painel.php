<?php
include("protect.php");

$userId = $_SESSION['idUsuario'];
const UPLOAD_DIR = "../img/usuarios/";
$foto_perfil = $_SESSION['usuario']['foto_perfil'];
$caminho_foto = UPLOAD_DIR . $foto_perfil;
var_dump($caminho_foto );
// var_dump($_SESSION['usuario']['foto_perfil'] );
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
    <link rel="stylesheet" href="assests/css/index_style.css">
    <link rel="shortcut icon" href="img/icons8-marcador-50.png">
    <link rel="stylesheet" href="../assests/css/login_style.css">
    <link rel="stylesheet" href="../assests/css/admin.css">
    <script src="index.js" defer></script>
    <title>Cliente</title>
</head>
<!--Cabeçalho-->
<header class="main_header">
    <div class="main_header_content">
        <a href="#" class="logo">
            <img id="fitlogo_header" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>
</header>
<!--Fim Cabeçalho-->
<body>
    <div>
        <p id="bemvindo">
            Bem vindo ao Painel, <?php echo $_SESSION["nome"]; ?>.
        </p>
    </div>
    <div class="box">
        <div class="item">
            <p>
                <a href="../view/cliente_academia.php">
                    <img src="../img/gym_pin.png" alt="">
                    <p class="text">Pesquisar Academias</p>
                </a>
            </p>
        </div>
        <div class="item">
            <p>
                <a href="../view/cliente_usuario.php">
                    <img src="../img/account.png" alt="">
                    <p class="text">Alterar meus Dados</p>
                </a>
            </p>
        </div>
        <div class="item">
            <p>
                <a href="../erro.php">
                    <img src="../img/clienteplus.png" alt="">
                    <p class="text">Assinatura Plus</p>
                </a>
            </p>
        </div>

        <br><br>
        <img src="<?=$caminho_foto ?>" alt="imagem do aluno">
    </div>
    <!-- <p>
        <a href="logout.php">Sair</a>
    </p> -->
</body>
</html>