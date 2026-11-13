<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class HomeController extends Controller
{
    public function index() {
      $cities = City::all();
      return view('home')->with('cities', $cities);
    }

    public function store(Request $request) {
      
    }
}
