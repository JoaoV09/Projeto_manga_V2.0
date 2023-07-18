<?php
    $nome = $_GET['nome'];
    $cap = $_GET['cap'];

    include_once 'conexao.php';
    $pes_n = "select * from manga where nome = '".$nome."' and status2 = 'Online'";
    $re = mysqli_query($con, $pes_n);
    $row_m = mysqli_fetch_array($re);

    $pes_c = "select * from capitulos where id_manga = '".$row_m['id']."' and capitulos = '".$cap."' ";
    $re = mysqli_query($con, $pes_c);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/view-cap.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" href="img/assets/logo_transparente.png" type="image/x-icon">
    <title>Leitor Manga</title>
</head>
<body>
    <?php
        include_once 'header.php';
    ?>

    <?php

        

        while($row_c = mysqli_fetch_array($re)) {
            echo $row_c['pagina'];
        }
    ?>
    
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>