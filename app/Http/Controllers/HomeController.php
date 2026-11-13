<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
      $cities = City::all();
      return view('home')->with('cities', $cities);
    }

    public function store(Request $request) {
      $request->validate([
        'city_id' => 'required|exists:cities,id'
      ]);

      Auth::user()->update([
        'city_id' => $request->city_id
      ]);

      return redirect()->route('home');
    }
}
