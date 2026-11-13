<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;
use App\Models\City;

class HomeController extends Controller
{
    public function index() {
      $cities = City::all();
      return view('home')->with('cities', $cities);
    }

    public function select(Request $request, WeatherService $weatherService) {
      $validated = $request->validate([
        'lat' => 'required|numeric',
        'lon' => 'required|numeric'
      ]);

      $weather = $weatherService->getWeather($validated['lat'], $validated['lon']);
      return view('home', $weather);
    } 

    public function store(Request $request) {
      
    }
}
