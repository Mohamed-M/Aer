<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class WeatherService {
  
  public function getWeatherCoordinates(string $city) {
    $geoCodeResponse = Http::get('https://api.openweathermap.org/geo/1.0/direct', [ 'q' => $city ]);

    if (!$geoCodeResponse->successful()) {
      throw new \Exception('Unable to locate: ' . $city);
    }

    $geocode = $geoCodeResponse->json()[0] ?? null;

    if (!$geocode) {
      throw new \Exception('Unable to find geolocation for ' . $city);
    }

    $lat = $geocode['lat'];
    $lon = $geocode['lon'];

    $weatherResponse = Http::get('https://api.openweathermap.org/data/2.5/weather', [
      'lat' => $lat,
      'lon' => $lon,
      'units' => 'metric',
      'appid' => config('services.openweather.key')
    ]);

    if (!$weatherResponse->successful()) {
      throw new \Exception('Unable to retrieve weather');
    }

    return [
      'weather' => $weatherResponse->json()
    ];
  }
}