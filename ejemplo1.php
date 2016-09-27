<meta charset="UTF-8">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">

</head>

<body>


    <form method="get" action="" class="form-inline">
        <div class="form-group">
            <label for="formGroupExampleInput">Ciudad</label>
            <input type="text" class="form-control" name="ciudad">
        </div>
        <button type="submit" class="btn btn-primary" name="Mostrar el Clima">Mostrar el Clima</button>
    </form>

<?php

    if($_GET["ciudad"]==null) die();

    $openweatherjson =
        file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET["ciudad"]."&appid=ac68d27580188e0bc7457590f00403b5");

    $json = json_decode($openweatherjson);

    $ciudad = $json->name;
    $latitud = $json->coord->lat;
    $longitud = $json->coord->lon;
    $temp_max = $json->main->temp_max;
    $temp_min = $json->main->temp_min;
    $humedad = $json->main->humidity;
    $presion = $json->main->pressure;
    $cielo = $json->weather[0]->main;
    $cielo_detalle = $json->weather[0]->description;

    echo "<h3>Ciudad: ".$ciudad." [lat: ".$latitud.", lon: ".$longitud."]</h3>";
    echo "<br> <b>Estado del cielo:  </b>".$cielo_detalle;

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
</body>