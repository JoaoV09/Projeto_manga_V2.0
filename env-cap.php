<?php
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/env-cap.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" href="img/assets/logo_transparente.png" type="image/x-icon">
    <title>Leitor Manga</title>
</head>

<body>

    <?php
        include_once 'header.php';
    ?>

    <!-- conteudo -->

    <div class="container">


        <form action="up-cap.php" method="post" class="form" enctype="multipart/form-data">
            <h1 class="titulo">Cadastro de conteudo!</h1>
            <input type="text" class="inputs" name="nome" placeholder="Nome">
            <input type="text" class="inputs" name="studio" placeholder="Studio">
            <input type="text" class="inputs" name="descricao" placeholder="Descrição">
            <input type="number" class="inputs" name="avaliacao" placeholder="Avaliação">
            <input type="number" class="inputs" name="lancamento" placeholder="Lançamento">
            <input type="text" class="inputs" name="categoria" placeholder="Categorias">
            <select name="tipo" class="inputs" id="select">
                <option value="valor" selected>Selecione uma capa</option>
                <option value="manga">Manga</option>
                <option value="manhwa">manhwa</option>
                <option value="webtoom">webtoom</option>
            </select>

            <label for="meuInputFile" class="custom-file-upload">
                Selecione um arquivo
            </label>
            <input type="file" id="meuInputFile" name="capa" style="display: none;">



            <input type="submit" value="Enviar" class="button">
        </form>

    </div>

    <!-- footer -->
    <?php
        include_once 'footer.php';
    ?>

    <!-- envent click do perfil -->
    <script>
        var alvo = document.getElementById("perfil");
        var alvo2 = document.getElementById("alvo");

        alvo.addEventListener("click", function() {
            alvo2.style.display = "block";
        })

        document.addEventListener("click", function(event) {

            if (!alvo.contains(event.target) && !alvo2.contains(event.target)) {
                alvo2.style.display = "none";
            }
        });
    </script>

    <?php
    mysqli_close($con);
    ?>
</body>

</html>