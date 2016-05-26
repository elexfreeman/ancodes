<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.04.2016
 * Time: 9:59
 */
class YahooWeather {
    // Ветер
    public $wind_chill;
    public $wind_direction;
    public $wind_speed;

    // Атмосферные показатели
    public $humidity;
    public $visibility;
    public $pressure;

    // Время восхода и заката переводим в формат unix time
    public $sunrise;
    public $sunset;

    // Текущая температура воздуха и погода
    public $temp;
    public $condition_text;
    public $condition_code;

    // Прогноз погоды на 5 дней
    public $forecast;

    public $units;

    function __construct($code, $units = 'c', $lang = 'en') {
        $this->units = ($units == 'c')?'c':'f';

        $url = 'http://xml.weather.yahoo.com/forecastrss?p='.
            $code.'&u='.$this->units;

        $xml_contents = file_get_contents($url);
        if($xml_contents === false)
            throw new Exception('Error loading '.$url);

        $xml = new SimpleXMLElement($xml_contents);

        // Ветер
        $tmp = $xml->xpath('/rss/channel/yweather:wind');
        if($tmp === false) throw new Exception("Error parsing XML.");
        $tmp = $tmp[0];

        $this->wind_chill = (int)$tmp['chill'];
        $this->wind_direction = (int)$tmp['direction'];
        $this->wind_speed = (int)$tmp['speed'];

        // Атмосферные показатели
        $tmp = $xml->xpath('/rss/channel/yweather:atmosphere');
        if($tmp === false) throw new Exception("Error parsing XML.");
        $tmp = $tmp[0];

        $this->humidity = (int)$tmp['humidity'];
        $this->visibility = (int)$tmp['visibility'];
        $this->pressure = (int)$tmp['pressure'];

        // Время восхода и заката переводим в формат unix time
        $tmp = $xml->xpath('/rss/channel/yweather:astronomy');
        if($tmp === false) throw new Exception("Error parsing XML.");
        $tmp = $tmp[0];

        $this->sunrise = strtotime($tmp['sunrise']);
        $this->sunset = strtotime($tmp['sunset']);

        // Текущая температура воздуха и погода
        $tmp = $xml->xpath('/rss/channel/item/yweather:condition');
        if($tmp === false) throw new Exception("Error parsing XML.");
        $tmp = $tmp[0];

        $this->temp = (int)$tmp['temp'];
        $this->condition_text = strtolower((string)$tmp['text']);
        $this->condition_code = (int)$tmp['code'];

        // Прогноз погоды на 5 дней
        $forecast = array();
        $tmp = $xml->xpath('/rss/channel/item/yweather:forecast');
        if($tmp === false) throw new Exception("Error parsing XML.");

        foreach($tmp as $day) {
            $this->forecast[] = array(
                'date' => strtotime((string)$day['date']),
                'low' => (int)$day['low'],
                'high' => (int)$day['high'],
                'text' => (string)$day['text'],
                'code' => (int)$day['code']
            );
        }
    }

    public function __toString() {
        $u = "°".(($this->units == 'c')?'C':'F');
        return $this->temp.' '.$u.', '.$this->condition_text;
    }
}