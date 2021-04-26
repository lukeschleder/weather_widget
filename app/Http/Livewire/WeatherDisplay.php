<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class WeatherDisplay extends Component
{
    public $currentWeather;
    public $futureWeather;
    public $location;

    public $listeners = [ 'locationChanged' => 'updateLocation'];

    public function updateLocation($location) {
        $this->location = $location;
        $this->fetchWeather();
    }

    public function mount() 
    {   
        $this->location = 'Minneapolis, MN, USA';
        $this->fetchWeather();
    }

    public function fetchWeather()
    {
        $apiKey = config('services.openweather.key');

        $response = Http::get("api.openweathermap.org/data/2.5/weather?q={$this->location}&appid={$apiKey}&units=imperial");
        $responseFuture = Http::get("api.openweathermap.org/data/2.5/forecast?q={$this->location}&appid={$apiKey}&units=Imperial");

        $this->currentWeather = $response->json();
        $this->futureWeather = $responseFuture->json();
    }


    public function render()
    {
        return view('livewire.weather-display');
    }
}
