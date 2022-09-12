<?php
    $url = "https://pokeapi.co/api/v2/pokemon?limit=150&offset=0";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    $resultado = json_decode(curl_exec($ch));
?>

<?php
    $url2 = "https://pokeapi.co/api/v2/type";
    $ch2 = curl_init($url2);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");
    $filtro = json_decode(curl_exec($ch2));
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Pokedex/css/pk.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <title>Pokemons</title>
    </head>
    <body class="content">
        <form action="type.php" method="get">
            <label for="teste ">Escolha um tipo de Pokemon: </label>
            <select name="tipo" id="title">
                <?php
                foreach ($filtro->results as $f)
                {
                    $filter_n = $f->name;
                    $filter_l = $f->url;
                    ?>
                    <option value="<?php echo $filter_l ?>" id="<?php echo $filter_n ?>"><?php echo $filter_n ?></option>
                <?php } ?>
            </select>
            <input type="submit" class="btnf" value="Filtrar">
        </form>
        <br>
            <?php
                foreach ($resultado->results as $pokemon)
                {
                    $link = $pokemon->url;
                    $tag_a = "<a href=details.php?link=$link>Details</a>";
                    echo "Nome: " . $pokemon->name . '<p></p>';  
                    echo $tag_a; 
                    echo "<hr>";
                }
            ?>
    </body>
</html>