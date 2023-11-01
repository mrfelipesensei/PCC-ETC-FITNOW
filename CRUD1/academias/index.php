<?php
    require_once '../src/databases/conexao.php';
    require_once '../src/dao/academiadao.php';

    $dao = new AcademiaDAO();
    $academias = $dao->getAll();
    $quantidadeRegistros = count($academias);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="../assests/css/fonticon.css" rel="stylesheet"> <!--fonticon.css-->
    <link rel="stylesheet" href="../assests/css/modal.css"> <!--modal.css-->
    <link rel="stylesheet" href="../assests/css/login.css"> <!--login.css-->
    <link rel="stylesheet" href="../assests/css/styles.css">
    <link rel="stylesheet" href="../assests/css/index_perfil.css">
    <link rel="stylesheet" href="../assests/css/tabela.css">
    <title>Academias</title>
</head>
<header class="main_header">
    <div class="main_header_content">
        <a href="home.html" class="logo">
            <img id="logofit" src="../img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                title="FITNOW - A qualquer hora e qualquer lugar"></a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="../perfis/index.php">Perfil</a></li>
                <li><a href="index.php">Academias</a></li>
                <li><a href="../auth/index.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>
    <h1>Academias</h1>
    <section>
        <a class="btn" href="create.php">Nova Academia</a>
    </section>
    <?php if (isset($_GET['msg']) || isset($_GET['error'])): ?>
        <div class="<?= (isset($_GET['msg']) ? 'msg__success' : 'msg__error') ?>">
            <p>
                <?= $_GET['msg'] ?? $_GET['error'] ?>
            </p>
        </div>
    <?php endif; ?>
    <br>
    <div class="outcontainer">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Horários</th>
                    <th>Modalidades</th>
                    <th>Valores</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($quantidadeRegistros == "0"): ?>
                    <tr>
                        <td colspan="6">Não existem academias cadastradas.</td>
                    </tr>
            <?php else: ?>
                <?php foreach($academias as $academia) : ?>
                <tr>
                    <td><?php echo $academia['idAcademia'];?></td>
                    <td><?= $academia['nome'];?></td>
                    <td><?= $academia['cnpj'];?></td>
                    <td><?= $academia['horarios'];?></td>
                    <td><?= $academia['modalidades']; ?></td>
                    <td><?= $academia['valores'];?></td>
                    <td class="td__operacao" >
                        <a class="btns" href="edit.php?id=<?=$academia['idAcademia'];?>">Alterar</a>
                        <a class="btns" href="delete.php?<?=$academia['idAcademia'];?>" onclick="return confirm('Deseja confirmar a operação?');">Excluir</a>
                        <a class="btns" href="matricula.php?id=<?=$academia['idAcademia'];?>">Matricular</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; $dbh = null; ?>
            </tbody>
        </table>
    </div>
</body>
</html>