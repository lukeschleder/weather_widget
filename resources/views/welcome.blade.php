<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <livewire:styles />
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-blue-200 bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen mb-6">
        <div class="mt-8">
            <div class="mx-auto w-128">
                <input id="autocomplete" placeholder="Enter a city..." type="text" class="w-128">
                <p>Selected: <strong id="autocomplete-value">none</strong></p>
            </div>


            {{-- <x-weather-widget :currentWeather="$currentWeather" :futureWeather="$futureWeather" :location="$location" /> --}}
            <livewire:one-call-weather/>
            {{-- <livewire:weather-display/> --}}
        </div>
        <script>
            let autocomplete;

            // const urlParams = new URLSearchParams(window.location.search)
            // const myLocation = urlParams.get('location') ? urlParams.get('location') : 'Minneapolis, MN'

            function initAutocomplete() {
                autocomplete = new google.maps.places.Autocomplete(
                    document.getElementById('autocomplete'),
                    {
                        types: ['(cities)'],
                        // componentRestrictions: { country: "us" },
                        fields: ['geometry', 'name', 'formatted_address'],
                });
                autocomplete.addListener('place_changed', onPlaceChanged);
            }
            function onPlaceChanged() {

                var place = autocomplete.getPlace();

                // window.location.href = `/?location=${place.formatted_address}`

                if(!place.geometry) {
                    // user did not select a place reset input
                    document.getElementById('autocomplete').value = "";
                    // urlParams = "";
                } else {
                    var latitude = place.geometry.location.lat();
                    var longitude = place.geometry.location.lng();
                    var locationName = place.formatted_address;
                    document.getElementById('autocomplete-value').innerHTML = place.formatted_address
                    window.livewire.emit('oneLocationChanged', latitude, longitude, locationName);
                    document.getElementById('autocomplete').value = "";
                }
            }
        </script>
        <script async
            src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.key') }}&libraries=places&callback=initAutocomplete">
        </script>
        <livewire:scripts />
    </body>
</html>
