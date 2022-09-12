<?php
    $link = $_GET['link'];
    $url = $link;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    $resultado = json_decode(curl_exec($ch));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pokedex/css/pk.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>detalhes</title>
</head>
<body class="content">
    <?php
        foreach ($resultado->types as $tp)
        $type = $tp->type->url;
        $ltp = $resultado->types[0]->type->name;

        echo '<h3>Habilidades: </h3>';
        foreach ($resultado->abilities as $k)
        {
            echo $k->ability->name . '<p></p>';
        }

        echo '<h3>Tipo: </h3>';
        $tag_t = "<a href=type.php?tipo=$type>$ltp</a>";
        echo $tag_t;

        echo '<h3>Movimentos: </h3>';
        echo $resultado->moves[0]->move->name. '<p></p>';
        echo $resultado->moves[1]->move->name. '<p></p>';
        echo $resultado->moves[2]->move->name. '<p></p>';
        echo $resultado->moves[3]->move->name. '<p></p>';
        echo $resultado->moves[4]->move->name;

        echo '<h3>Fotos: </h3>';
        echo '<img src="'.$resultado->sprites->back_default.'" width="250">';
        echo '<img src="'.$resultado->sprites->front_default.'" width="250">';
    ?>
    <input type="submit" class="btnindex" value="Voltar ao inicio" onclick="location.href='pokemons.php'">
</body>
</html>