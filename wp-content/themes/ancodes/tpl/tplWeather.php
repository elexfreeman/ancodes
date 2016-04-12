<?php
//Cgbcjr ujhjljd
//https://pogoda.yandex.ru/static/cities.xml

$city_id=8181; // id города
$data_file="http://export.yandex.ru/weather-ng/forecasts/$city_id.xml"; // адрес xml файла

$xml = simplexml_load_file($data_file); // раскладываем xml на массив


// выбираем требуемые параметры (город, температура, пиктограмма и тип погоды текстом (облачно, ясно)

$city=$xml->fact->station;
$temp=$xml->fact->temperature;
$pic=$xml->fact->image;
$type=$xml->fact->weather_type;
$wind_speed=$xml->fact->wind_speed;
$humidity=$xml->fact->humidity;
$water_temperature=$xml->fact->water_temperature;

// Если значение температуры положительно, для наглядности добавляем "+"
if ($temp>0) {$temp='+'.$temp;}
?>
<div class="weather">
    <h3>Погода в Испании</h3>
    <ul id="weather-slider">
        <li>
            <div class="title">
                <span href="#" class="city">Барселона,</span>
                <span><?php echo WeatherConvertDate(date("y-m-d")); ?></span>
            </div>
            <div class="info-holder">
                <div class="image"><img src="/images/bg-weather02.png" alt="#" width="212" /></div>
                <div class="text">
                    <strong class="temperature"><?php echo $temp; ?>&deg;</strong>
                    <ul class="details">
                        <li><?php echo $wind_speed; ?> м/с</li>
                        <li><?php echo $humidity; ?>% влажн.</li>
                        <li><?php echo $water_temperature; ?>&deg; вода</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="title">
                <span href="#" class="city">Льорет-де-Мар,</span>
                <span><?php echo WeatherConvertDate(date("y-m-d")); ?></span>
            </div>
            <div class="info-holder">
                <div class="image"><img src="/images/bg-weather02.png" alt="#" width="212" height="146" /></div>
                <div class="text">
                    <strong class="temperature">24&deg;</strong>
                    <ul class="details">
                        <li>2 м/с, север</li>
                        <li>80% влажн.</li>
                        <li>15&deg; вода</li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>