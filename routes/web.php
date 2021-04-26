<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $location = request()->location ? request()->location : 'Minneapolis, MN, USA';
    // $apiKey = config('services.openweather.key');

    // $response = Http::get("api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=imperial");
    // $responseFuture = Http::get("api.openweathermap.org/data/2.5/forecast?q={$location}&appid={$apiKey}&units=Imperial");

    // return view('welcome', [
    //     'currentWeather' => $response->json(),
    //     'futureWeather' => $responseFuture->json(),
    //     'location' => $location,
    // ]);

    // $apiKey = config('services.openweather.key');

    //     $oneresponse = Http::get("api.openweathermap.org/data/2.5/onecall?lat={$latitude}&lon={$longitude}&appid={$apiKey}&units=imperial");
    //     dd($oneresponse->json());
    return view('welcome');
});
