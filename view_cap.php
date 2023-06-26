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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>l</title>
</head>
<body>
    <?php
        while($row_c = mysqli_fetch_array($re)) {
            echo $row_c['pagina'];
        }
    ?>
</body>
</html>