<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/css/ol.css" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>
        <style>
          .map {
            height: 400px;
            width: 50%;
            margin-left:auto;
            margin-right:auto;
          }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-sm" style="background-color: #994f17;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="newRando/create">Tracer un circuit</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Les randonnées</a>
    </li>
  </ul>
</nav>
@yield('contenu')
    </body>
</html>
