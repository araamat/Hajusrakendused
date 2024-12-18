<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ilmateade</title>
</head>
<body>
    <h1>Weather Information</h1>
    <p>Location: Tallinn</p>
    <p>Temperature: {{ $weather['base'] }}</p>
    <p>Temperature: {{ $weather['main']['temp'] }}</p>
    <p>Temperature: {{ $weather['weather'][0]['main'] }}</p>
    <img src="{{ "https://openweathermap.org/img/wn/" . $weather['weather'][0]['icon'] . "@2x.png" }}" alt="">
</body>
</html>