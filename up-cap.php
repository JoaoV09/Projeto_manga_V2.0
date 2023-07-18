<?php

$nome = $_POST['nome'];
$studio = $_POST['studio'];
$descricao = $_POST['descricao'];
$avaliacao = $_POST['avaliacao'];
$lancamento = $_POST['lancamento'];
$categoria = $_POST['categoria'];
$tipo = $_POST['tipo'];
$capa = $_FILES['capa'];

$ext = explode(".", $capa["name"]);
$ext = array_reverse($ext);
$ext = strtolower($ext[0]);

if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif'){
    echo 'O arquivo enviado não e uma imagem!!';
}elseif($capa['size'] > 1024*500){
    echo 'A imagem e grande de mais!!';
}else{
    $nomedacapa = date("Y-m-d-h-m-s").".".$ext;
}

$sql = "insert manga values(null,'".$nome."','".$nomedacapa."','".$studio."','".$categoria."','".$tipo."','".$lancamento."','".$avaliacao."','0','".$descricao."','0','".date('Y-m-d')."','Producao','Online') ";

include_once 'conexao.php';

if(mysqli_query($con, $sql)) {
    move_uploaded_file($capa['tmp_name'], "img/mangas/capas/".$nomedacapa);
    ?>
    <style>*{margin: 0; padding: 0;} div {width: 50vw;height: 50vh; margin: 20vh auto;padding: 1vh 1vw; background-color: #131313; border-radius: 15px 0;} h1{color: #872162; margin-top: 2vh;} a {width: 3vw; padding: 1vh 1vw;display: block;margin:15vh auto 0 auto; border-radius: 15px 0; text-decoration: none; color: #872162;background-color: #454545;}</style>
<div><h1>Manga Enviado com sucesso!!</h1><a href="/projeto_manga_v2.0">Voltar</a></div>
<?php

}else {?>
    <style>*{margin: 0; padding: 0;} div {width: 50vw;height: 50vh; margin: 20vh auto;padding: 1vh 1vw; background-color: #131313; border-radius: 15px 0;} h1{color: #872162; margin-top: 2vh;} a {width: 3vw; padding: 1vh 1vw;display: block;margin:15vh auto 0 auto; border-radius: 15px 0; text-decoration: none; color: #872162;background-color: #454545;}</style>
<div><h1>Erro ao enviar o Manga!!</h1><a href="/projeto_manga_v2.0">Voltar</a></div><?php
}
mysqli_close($con);
?>