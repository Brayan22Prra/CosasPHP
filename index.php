<?php
//Peticion a una api
const API_URL = "https://whenisthenextmcufilm.com/api";
//inicialisamos una nueva sesion de cURL; ch = cHRL handle
$ch = curl_init(API_URL);
//Queremos recibir el resultado de la peticion y no mostrsrlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ejecutamos la peticion , y guardamos el resultado;
$resultado = curl_exec($ch);
$data = json_decode($resultado, true);

curl_close($ch);
?>

<head>
    <title>La Proxima Pelicula De Marvel</title>
    <meta name="descripcion" content="La Proxima Pelicula De Marvel"  />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>


<main>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 16px" />
    </section>

    <hgroup>
        <h3> <?= $data["title"]; ?> Se estrena en <?= $data["days_until"]; ?> dias </h3>
        <p>Fecha de estreno <?= $data["release_date"]; ?> </p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?> </p>
        <p>Pagina By: Brian Bernardt </p>
    </hgroup>

</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>
