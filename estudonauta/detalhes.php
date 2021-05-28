<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Detalhes do Jogo</title>
</head>
<body>
    <div id="corpo">
        <?php
        include_once "topo.php";
        $c = $_GET['cod'] ?? 0;
        $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php
            if (!$busca) {
                echo "<tr><td>Busca falhou! $banco->error";
            } else {
                if ($busca->num_rows == 1) {
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);
                    echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                    echo "<td><h2>$reg->nome</h2>";
                    echo "Nota: " . number_format($reg->nota, 1) . "/10.0";
                    if (is_admin()) {
                        echo " <i class='material-icons'>add_circle</i> ";
                        echo "<i class='material-icons'>edit</i> ";
                        echo "<i class='material-icons'>delete</i>";
                    } else if (is_editor()){
                        echo " <i class='material-icons'>edit</i> ";
                    }
                    echo "<tr><td>$reg->descricao";
                } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            ?>
        </table>
        <?php echo voltar() ?>
    </div>
    <?php include_once "rodape.php"; ?>
</body>

</html>