<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.0.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Fonts -->

</head>
<style>




    
.coursestar-rating {
  font-family: 'FontAwesome';
}
.coursestar-rating > fieldset {
  border: none;
  display: inline-block;
}
.coursestar-rating > fieldset:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0, 0, 0, 0);
}
.coursestar-rating > fieldset:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 0.05em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 200%;
  color: #181818;
}
.coursestar-rating > fieldset:not(:checked) > label:before {
  content: '\f006  ';
}
.coursestar-rating > fieldset:not(:checked) > label:hover,
.coursestar-rating > fieldset:not(:checked) > label:hover ~ label {
  color: #181818;
}
.coursestar-rating > fieldset:not(:checked) > label:hover:before,
.coursestar-rating > fieldset:not(:checked) > label:hover ~ label:before {
  content: '\f005  ';
}
.coursestar-rating > fieldset > input:checked ~ label:before {
  content: '\f005  ';
}
.coursestar-rating > fieldset > label:active {
  position: relative;
  top: 2px;
}
.pteachingstar-rating {
  font-family: 'FontAwesome';
}
.pteachingstar-rating > fieldset {
  border: none;
  display: inline-block;
}
.pteachingstar-rating > fieldset:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0, 0, 0, 0);
}
.pteachingstar-rating > fieldset:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 0.05em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 200%;
  color: #181818;
}
.pteachingstar-rating > fieldset:not(:checked) > label:before {
  content: '\f006  ';
}
.pteachingstar-rating > fieldset:not(:checked) > label:hover,
.pteachingstar-rating > fieldset:not(:checked) > label:hover ~ label {
  color: #181818;
}
.pteachingstar-rating > fieldset:not(:checked) > label:hover:before,
.pteachingstar-rating > fieldset:not(:checked) > label:hover ~ label:before {
  content: '\f005  ';
}
.pteachingstar-rating > fieldset > input:checked ~ label:before {
  content: '\f005  ';
}
.pteachingstar-rating > fieldset > label:active {
  position: relative;
  top: 2px;
}
.pmasterystar-rating {
  font-family: 'FontAwesome';
}
.pmasterystar-rating > fieldset {
  border: none;
  display: inline-block;
}
.pmasterystar-rating > fieldset:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0, 0, 0, 0);
}
.pmasterystar-rating > fieldset:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 0.05em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 200%;
  color: #181818;
}
.pmasterystar-rating > fieldset:not(:checked) > label:before {
  content: '\f006  ';
}
.pmasterystar-rating > fieldset:not(:checked) > label:hover,
.pmasterystar-rating > fieldset:not(:checked) > label:hover ~ label {
  color: #181818;
}
.pmasterystar-rating > fieldset:not(:checked) > label:hover:before,
.pmasterystar-rating > fieldset:not(:checked) > label:hover ~ label:before {
  content: '\f005  ';
}
.pmasterystar-rating > fieldset > input:checked ~ label:before {
  content: '\f005  ';
}
.pmasterystar-rating > fieldset > label:active {
  position: relative;
  top: 2px;
}
.pcharacterstar-rating {
  font-family: 'FontAwesome';
}
.pcharacterstar-rating > fieldset {
  border: none;
  display: inline-block;
}
.pcharacterstar-rating > fieldset:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0, 0, 0, 0);
}
.pcharacterstar-rating > fieldset:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 0.05em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 200%;
  color: #181818;
}
.pcharacterstar-rating > fieldset:not(:checked) > label:before {
  content: '\f006  ';
}
.pcharacterstar-rating > fieldset:not(:checked) > label:hover,
.pcharacterstar-rating > fieldset:not(:checked) > label:hover ~ label {
  color: #181818;
}
.pcharacterstar-rating > fieldset:not(:checked) > label:hover:before,
.pcharacterstar-rating > fieldset:not(:checked) > label:hover ~ label:before {
  content: '\f005  ';
}
.pcharacterstar-rating > fieldset > input:checked ~ label:before {
  content: '\f005  ';
}
.pcharacterstar-rating > fieldset > label:active {
  position: relative;
  top: 2px;
}





    .pic {
  display: inline-block;
  width: 120px;
  height: 150px;
  border-radius: 30%;

  object-fit: cover;
}
</style>
<body style="background-color:white;">
    <div id="app">

        <div class="container">     
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

</body>
<br>
    @include('inc.footer')
</html>



