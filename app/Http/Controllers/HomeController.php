<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class HomeController extends Controller
{
    public function index() {
      return view('home');
    }

    public function select(Request $request, WeatherService $weatherService) {
      $validated = $request->validate([
        'lat' => 'required|numeric',
        'lon' => 'required|numeric'
      ]);

      $weather = $weatherService->getWeather($validated['lat'], $validated['lon']);
      return view('home', $weather);
    } 
}
