<?php
    $tipo = $_GET['tipo'];
    $url = $tipo;
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
    <title>tipos</title>
</head>
<body class="content">
<input type="submit" class="btnindex" value="Voltar ao inicio" onclick="location.href='pokemons.php'">
    <?php
    echo "<h3>Pokemons do tipo escolhido: </h3>";
    foreach ($resultado->pokemon as $pokemon)
    {
        $link = $pokemon->pokemon->url;
        $tag_a = "<a href=details.php?link=$link>Details</a>";
        echo "Nome: " . $pokemon->pokemon->name . '<p></p>';
        echo "$tag_a";
        echo "<hr>";
    }
    ?>
</body>
</html>