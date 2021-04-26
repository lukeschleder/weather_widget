<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class OneCallWeather extends Component
{
    public $weather;
    public $latitude;
    public $longitude;
    public $locationName;

    public $listeners = [ 'oneLocationChanged' => 'updateLocation'];

    public function updateLocation($latitude, $longitude, $locationName) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->locationName = $locationName;

        // dump($this->latitude, $this->longitude);
        $this->fetchWeather();
    }

    public function mount() 
    {   
        $this->latitude = 44.977753;
        $this->longitude = -93.2650108;
        $this->locationName = 'Minneapolis, MN, USA';
        $this->fetchWeather();
    }

    public function fetchWeather()
    {
        $apiKey = config('services.openweather.key');

        $response = Http::get("api.openweathermap.org/data/2.5/onecall?lat={$this->latitude}&lon={$this->longitude}&appid={$apiKey}&units=imperial");
        $this->weather = $response->json();
    }
    public function render()
    {
        return view('livewire.one-call-weather');
    }
}
