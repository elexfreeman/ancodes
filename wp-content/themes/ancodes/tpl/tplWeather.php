<?php
//Cgbcjr ujhjljd
//https://pogoda.yandex.ru/static/cities.xml
/*
$city_id=8181; // id города
$data_file="http://export.yandex.ru/weather-ng/forecasts/$city_id.xml"; // адрес xml файла
$data_file="https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22samara%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys"; // адрес xml файла

$xml = simplexml_load_file($data_file); // раскладываем xml на массив
print_r($xml);*/

// выбираем требуемые параметры (город, температура, пиктограмма и тип погоды текстом (облачно, ясно)
/*
$city=$xml->fact->station;
$temp=$xml->fact->temperature;
$pic=$xml->fact->image;
$type=$xml->fact->weather_type;
$wind_speed=$xml->fact->wind_speed;
$humidity=$xml->fact->humidity;
$water_temperature=$xml->fact->water_temperature;

*/
//https://developer.yahoo.com/weather/
$city='barcelona';
$json='https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22'.$city.'%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
$weather=$ships=json_decode(file_get_contents($json), true);
//print_r($weather);
$wind_speed = $weather['query']['results']['channel']['wind']['speed'] ;
$humidity = $weather['query']['results']['channel']['atmosphere']['humidity'] ;
$temp = round(($weather['query']['results']['channel']['item']['condition']['temp']-32)*(5/9)) ;
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
        <?php
        $city='Lloret%20de%20Mar';
        $json='https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22'.$city.'%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
        $weather=$ships=json_decode(file_get_contents($json), true);
        //print_r($weather);
        $temp = round(($weather['query']['results']['channel']['item']['condition']['temp']-32)*(5/9)) ;
        $wind_speed = $weather['query']['results']['channel']['wind']['speed'] ;
        $humidity = $weather['query']['results']['channel']['atmosphere']['humidity'] ;
        // Если значение температуры положительно, для наглядности добавляем "+"
        if ($temp>0) {$temp='+'.$temp;}
        ?>
        <li>
            <div class="title">
                <span href="#" class="city">Льорет-де-Мар,</span>
                <span><?php echo WeatherConvertDate(date("y-m-d")); ?></span>
            </div>
            <div class="info-holder">
                <div class="image"><img src="/images/bg-weather02.png" alt="#" width="212" height="146" /></div>
                <div class="text">
                    <strong class="temperature"><?php echo $temp; ?>&deg;</strong>
                    <ul class="details">
                        <li><?php echo $wind_speed; ?> м/с, север</li>
                        <li><?php echo $humidity; ?>% влажн.</li>
                        <li><?php echo $temp; ?>&deg; вода</li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>