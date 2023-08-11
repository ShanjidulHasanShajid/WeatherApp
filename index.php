<?php
    if (isset($_GET['submit'])) 
    {
        $city = $_GET['city'];
    }
    else 
    {
        $city = "Dhaka";
    }

    $url = "https://api.openweathermap.org/data/2.5/forecast?q=". $city. "&appid=a68189c6d16a7377324ec603a8d13ac7";
    $contents = file_get_contents($url);
    $clima = json_decode($contents);

    $city_name = $clima->city->name;
    $country = $clima->city->country;

    $day1 = $clima->list[0];
    $day1_icon = "http://openweathermap.org/img/wn/" .$day1->weather[0]->icon . "@2x.png";
   
   
   
    $day2 = $clima->list[8];
    $day3 = $clima->list[16];
    $day4 = $clima->list[24];
    $day5 = $clima->list[32];

 
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="index.css" />
    <title>Weather Forecast</title>
    <script src="https://kit.fontawesome.com/ba626738b7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="subContainer">
            <div class="subContainer-top">
                <div class="present-forcast">
                    <h1 style="justify-content: center; align-items: center;"><?= $city_name?>,<?= $country?> <img style="width: 55px;"
                            src="placeholderblack.png" alt=""></h1>
                        <p><?=substr($day1->dt_txt,0,10)?></p>
                        <p ><?= $day1->main->temp - 272.15 ?>&deg;C</p>
                        <p><?= $day1->weather[0]->description?></p>
                        <!-- <p>Min Temp:</p> -->
                        <p>Min: <?= $day1->main->temp_min - 272.15 ?>&deg;C</p>
                        <p>Max: <?= $day1->main->temp_max - 272.15 ?>&deg;C</p>
                        <p>Wind: <?= $day1->wind->speed?> km/h</p>
                </div>
                <div class="search">
                    <form>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="city" placeholder="Search City" />
                        <button class="button" name="submit" value="submit" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
            <div class="forecast">
                <div style="font-size: 20px;" class="forcst">
                <h1 style="font-size: 20px;"><?=substr($day2->dt_txt,0,10)?></h1>
                    <p><?= $day2->main->temp - 272.15 ?>&deg;C</p>
                    <p><?= $day2->weather[0]->description?></p>
                    <p><?= $day2->wind->speed?> km/h</p>
                </div>
                <div style="font-size: 20px;" class="forcst">
                <h1 style="font-size: 20px;"><?=substr($day3->dt_txt,0,10)?></h1>
                    <p><?= $day3->main->temp - 272.15 ?>&deg;C</p>
                    <p><?= $day3->weather[0]->description?></p>
                    <p><?= $day3->wind->speed?> km/h</p>
                </div>
                <div style="font-size: 20px;" class="forcst">
                <h1 style="font-size: 20px;"><?=substr($day4->dt_txt,0,10)?></h1>
                    <p><?= $day4->main->temp - 272.15 ?>&deg;C</p>
                    <p><?= $day4->weather[0]->description?></p>
                    <p><?= $day4->wind->speed?> km/h</p>
                </div>
                <div style="font-size: 20px;" class="forcst">
                <h1 style="font-size: 20px;"><?=substr($day5->dt_txt,0,10)?></h1>
                    <p><?= $day5->main->temp - 272.15 ?>&deg;C</p>
                    <p><?= $day5->weather[0]->description?></p>
                    <p><?= $day5->wind->speed?> km/h</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>