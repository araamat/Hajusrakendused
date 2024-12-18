<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show()
    {
 
      
        
        $weather = $this->weatherService->getWeather();

        $cacheKey = "weather_data"; // Kindel võtme nimi ilma linnata

        $weather = Cache::remember($cacheKey, now()->addHours(1), function () {
            return $this->weatherService->getWeather(); // Eeldades, et teenus ei vaja linna parameetrit
        });


        if (!$weather) {
            return response()->json(['error' => 'Unable to fetch weather data'], 500);
        }

        return view('weather.show', ['weather' => $weather]);
    }
}

