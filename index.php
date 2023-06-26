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
    <link rel="shortcut icon" href="img/logo_transparente.png" type="image/x-icon">
    <title>Leitor Manga</title>
</head>

<body>
    <nav>
        <a href="index.php"><img src="img/assets/logo_transparente.png" alt="logo" class="logo"></a>
        <a href="#" class="nav-link">Manga</a>
        <a href="#" class="nav-link">Categoria</a>
        <a href="#" class="nav-link">Grupos</a>

        <div class="funcion">
            <a href="#" class="nav-link"><img src="img/assets/person-circle.svg" alt="perfil" class="icon"></a>
            <div class="drop">
                <a href="#" class="nav-link"><img src="img/assets/star-fill.svg" class="icon2"></a>
                <a href="#" class="nav-link"><img src="img/assets/eye-fill.svg" class="icon2"></a>
                <a href="#" class="nav-link"><img src="img/assets/gear-fill.svg" class="icon2"></a>
            </div>
        </div>

    </nav>

    <div class="container">
        <div class="card-banner">
            <img src="img/slide/Banner-1.png" class="banner">
            <img src="img/slide/e5e53eae-c765-4961-954d-92799ef50a94-removebg-preview.png" class="letreiro">
        </div>

        <!-- mais Lidos -->

        <div class="cont">
            <h1 class="titulo">Mais Lidos</h1>
            <div class="card-itens">
                <?php

                $comando = "SELECT * FROM manga WHERE status2 = 'ONLINE' ORDER BY vizu DESC";
                if ($result = mysqli_query($con, $comando)) {
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="card">
                            <a href="<?php echo $row['nome'] ?>"><img src="img/mangas/<?php echo $row['capa'] ?>" class="capa"></a>
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

        <!-- banner move -->

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

        <!-- Manga -->

        <div class="cont">
            <h1 class="titulo">Mangas</h1>
            <div class="card-itens">
                <?php
                $comando = "select * from manga where tipo = 'manga' and status2 = 'Online' order by vizu desc";
                $result = mysqli_query($con, $comando);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="card">
                        <a href="<?php echo $row['nome'] ?>"><img src="img/manga/<?php echo $row['capa'] ?>" class="capa"></a>
                        <p><?php echo $row['nome'] ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- webtoons -->

        <div class="cont">
            <h1 class="titulo">webtoons</h1>
            <div class="card-itens">
                <?php
                $comando = "select * from manga where tipo = 'webtoom' and status2 = 'Online' order by vizu desc";
                $result = mysqli_query($con, $comando);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="card">
                        <a href="<?php echo $row['nome'] ?>"><img src="img/manga/<?php echo $row['capa'] ?>" class="capa"></a>
                        <p><?php echo $row['nome'] ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- manhwa -->

        <div class="cont">
            <h1 class="titulo">webtoons</h1>
            <div class="card-itens">
                <?php
                $comando = "select * from manga where tipo = 'manhwa' and status2 = 'Online' order by vizu desc";
                $result = mysqli_query($con, $comando);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="card">
                        <a href="<?php echo $row['nome'] ?>"><img src="img/manga/<?php echo $row['capa'] ?>" class="capa"></a>
                        <p><?php echo $row['nome'] ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

                <!-- footer -->

    <footer>
        <div class="cont">
            <a href="index.php"><img src="img/assets/logo_transparente.png" alt="logo" class="logo-footer"></a>
        </div>
        <div class="cont-colum">
            <a href="index.php" class="nav-link">Home</a>
            <a href="#" class="nav-link">Manga</a>
            <a href="#" class="nav-link">Categoria</a>
            <a href="#" class="nav-link">Grupos</a>
        </div>
        <div class="cont">
            <a href="#" class="nav-icon"><img src="img/assets/twitter.svg" class="icon"></a>
            <a href="#" class="nav-icon"><img src="img/assets/discord.svg" class="icon"></a>
            <a href="" class="nav-icon"><img src="img/assets/arrow-up-circle.svg" class="icon"></a>
        </div>
    </footer>

    <!-- banner move -->
    <script src="js/slid.js"></script>
    <script src="js/movcard.js"></script>

    <?php
    mysqli_close($con);
    ?>

    <!-- Solução para a exibição de itens aleatoriamente -->
    <!-- <?php
            for ($i = 0; $i < 10; $i++) {
                $numero = random_int(1, 10);
                echo "<h1>" . $numero . "<h1>";
            }
            ?> -->
</body>

</html>