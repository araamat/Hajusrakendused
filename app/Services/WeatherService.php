<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiUrl = 'https://api.openweathermap.org/data/2.5/weather';

    public function getWeather()    
    {
       

        $response = Http::get($this->apiUrl, [
            'appid' => config('services.weather_api_key'),
            'lat' => '58.26857608487955',
            'lon' => '22.511680775040794',
            'units' => 'metric'
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
