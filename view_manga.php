<?php
    $nome  = $_GET["nome"];
    $nome = str_replace("_", " ", $nome);
    include_once 'conexao.php';

    $pash = "select * from manga where nome = '".$nome."' ";
    $re = mysqli_query($con, $pash);
    $v = mysqli_fetch_array($re);

    $vizu = $v["vizu"];
    $vizu = $vizu + 1;

    $up = "UPDATE `manga` SET vizu ='".$vizu."' WHERE nome = '".$nome."'";
    mysqli_query($con, $up);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/view_manga.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" href="img/assets/logo_transparente.png" type="image/x-icon">
    <title>Leitor Manga</title>
</head>

<body>

    <?php
        include_once 'header.php';
    ?>

    <div class="container">
        <div class="cont-primaria">
            <?php
                $comando  = "select * from manga where nome = '".$nome."' and status2 = 'Online' ";
                $result = mysqli_query($con, $comando);
                $row = mysqli_fetch_array($result);
                $categoria = explode(",",$row['categoria']);
            ?>
            <div class="card-capa">
                <img src="img/mangas/capas/<?php echo $row['capa'] ?>"  class="capa">
            </div>
            <div class="info">
                <h1 class="titulo"><?php echo $row['nome'] ?></h1>
                <?php
                 foreach($categoria as $categorias) {
                    
                ?><a href="categoria.php?nome=<?php echo $categorias ?>" class="categoria"><?php echo $categorias ?></a>
                <?php
                }
                ?>
                <br>
                <br>
                <span class="descricao"><?php echo $row['discricao'] ?>.</span>
                <br>
                <span class="info_text">Estudio:</span>
                <br>
                <span class="estudio"><?php echo $row['estudio'] ?></span>
                <br>
                <span class="info_text">Lancamento:</span>
                <br>
                <span class="lancamento"><?php echo $row['data_lancamento']?></span>
            </div>
        </div>
        <div class="avalia">
        <?php
            for($i = 0;$i < $row['avaliacao'] and $i < 5;$i++) {
                ?>
                    <img src="img/assets/star-fill.svg" >
                <?php
            }
        ?>
        </div>
        <!-- capitulos -->
        <?php
            $comando = "select * from capitulos where id_manga = '".$row['id']."' and pagina = 1 order by capitulos desc";
            $result = mysqli_query($con, $comando);

            ?>
        <h1 class="titulos">Capitulos</h1>
    
        <div class="cont-cap">
        <?php 
            while($cap_info = mysqli_fetch_array($result)) { ?>

                <div class="card-cap">
                    <p class="data-cap"><?php echo $cap_info["data_c"] ?></p>
                    <a href="<?php echo $nome.'/'.$cap_info['capitulos'] ?>" class="num-cap">Capitulo <?php echo $cap_info["capitulos"] ?></a>
                </div>

    <?php   }
        ?>
        </div>
    
    </div>

    <!-- footer -->

    <?php
        include_once 'footer.php';
    ?>

<?php
    mysqli_close($con);
?>
</body>

</html>