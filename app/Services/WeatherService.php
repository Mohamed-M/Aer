<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class WeatherService {
  
  public function getWeather(float $lat, float $lon) {
    $weatherResponse = Http::get('https://api.openweathermap.org/data/2.5/weather', [
      'lat' => $lat,
      'lon' => $lon,
      'units' => 'metric',
      'appid' => config('openweather.api.key')
    ]);

    if (!$weatherResponse->successful()) {
      throw new \Exception('Unable to retrieve weather');
    }

    return [
      'weather' => $weatherResponse->json(),
    ];
  }
}