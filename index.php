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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" href="img/assets/logo_transparente.png" type="image/x-icon">
    <title>Leitor Manga</title>
</head>

<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="container">
        <div class="card-banner">
            <img src="img/slide/Banner-1.png" class="banner">
            <img src="img/slide/e5e53eae-c765-4961-954d-92799ef50a94-removebg-preview.png" class="letreiro">
        </div>

        <!-- mais Lidos -->

        <div class="cont">
            <h1 class="titulo">Mais Lidos</h1>
            <div class="card-itens">
                <div class="container-item">
                <?php
                $comando = "SELECT * FROM manga WHERE status2 = 'ONLINE' ORDER BY vizu DESC";
                if ($result = mysqli_query($con, $comando)) {
                    while ($row = mysqli_fetch_array($result)) { 
                        $n = str_replace(" ", "_", $row["nome"]);?>
                        <div class="card">
                            <a href="<?php echo $n ?>"><img src="img/mangas/capas/<?php echo $row['capa'] ?>" class="capa"></a>
                            <p><?php echo $row['nome'] ?></p>
                        </div>
                <?php
                    }
                } else {
                    echo 'Erro ao fazer a Procura!!';
                }
                ?>
                </div>
            </div>
        </div>

        <!-- banner move -->
        <div class="cont-slid">
            <div class="slide">
                <div id="voltar" class="btn">
                    <img src="img/assets/arrow-left-short.svg" class="arrow_left">
                </div>
                <div id="avancar" class="btn">
                    <img src="img/assets/arrow-right-short.svg" class="arrow_right">
                </div>
                <div class="slides">

                    <div id="atual" class="imagens">
                        <img src="img/slide/the biginning1.png" alt="slides" />
                    </div>
                    <div id="atual" class="imagens">
                        <img src="img/slide/Banner-1.png" alt="slides" />
                    </div>
                    <div id="atual" class="imagens">
                        <img src="img/slide/the biginning1.png" alt="slides" />
                    </div>
                    <div id="atual" class="imagens">
                        <img src="img/slide/the biginning1.png" alt="slides" />
                    </div>
                </div>
                <div class="balls">
                    <div class="imgatual" style="display: none;"></div>
                </div>
            </div>
        </div>

        <!-- Manga -->

        <div class="cont">
            <h1 class="titulo">Mangas</h1>
            <div class="card-itens">
                <div class="container-item">
                <?php
                $comando = "select * from manga where tipo = 'manga' and status2 = 'Online' order by vizu desc";
                $result = mysqli_query($con, $comando);
                while ($row = mysqli_fetch_array($result)) {
                    $n = str_replace(" ", "_", $row["nome"]); ?>
                    <div class="card">
                        <a href="<?php echo $n ?>"><img src="img/mangas/capas/<?php echo $row['capa'] ?>" class="capa"></a>
                        <p><?php echo $row['nome'] ?></p>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>

        <!-- webtoons -->

        <div class="cont">
            <h1 class="titulo">webtoons</h1>
            <div class="card-itens">
                <div class="container-item">
                <?php
                $comando = "select * from manga where tipo = 'webtoom' and status2 = 'Online' order by vizu desc";
                $result = mysqli_query($con, $comando);
                while ($row = mysqli_fetch_array($result)) {
                    $n = str_replace(" ", "_", $row["nome"]); ?>
                    <div class="card">
                        <a href="<?php echo $n ?>"><img src="img/mangas/capas/<?php echo $row['capa'] ?>" class="capa"></a>
                        <p><?php echo $row['nome'] ?></p>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>

        <!-- manhwa -->

        <div class="cont">
            <h1 class="titulo">Manhwas</h1>
            <div class="card-itens">
                <div class="container-item">
                <?php
                $comando = "select * from manga where tipo = 'manhwa' and status2 = 'Online' order by vizu desc";
                $result = mysqli_query($con, $comando);
                while ($row = mysqli_fetch_array($result)) {
                    $n = str_replace(" ", "_", $row["nome"]); ?>

                    <div class="card">
                        <a href="<?php echo $n ?>"><img src="img/mangas/capas/<?php echo $row['capa'] ?>" class="capa"></a>
                        <p><?php echo $row['nome'] ?></p>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->

    <?php
    include_once 'footer.php';
    ?>

    <!-- banner move -->
    <script src="js/slid.js"></script>
    <script src="js/movcard.js"></script>
    <script src="js/cardItem.js"></script>
    <script src="js/ftPerfil.js"></script>
    
    <?php
    mysqli_close($con);
    ?>
</body>

</html>