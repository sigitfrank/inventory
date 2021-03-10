<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    {{-- LARAVEL TOKEN FOR AJAX --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/lib/getmdl-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/nv.d3.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/application.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- endinject -->

    {{-- data tables --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
    
    {{-- custom css --}}
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<body>
    @yield('modal')
    @yield('content')
    
<!-- inject:js -->
<script src="{{asset('js/d3.min.js')}}"></script>
<script src="{{asset('js/getmdl-select.min.js')}}"></script>
<script src="{{asset('js/material.min.js')}}"></script>
<script src="{{asset('js/nv.d3.min.js')}}"></script>
<script src="{{asset('js/layout/layout.min.js')}}"></script>
<script src="{{asset('js/scroll/scroll.min.js')}}"></script>
<script src="{{asset('js/widgets/charts/discreteBarChart.min.js')}}"></script>
<script src="{{asset('js/widgets/charts/linePlusBarChart.min.js')}}"></script>
<script src="{{asset('js/widgets/charts/stackedBarChart.min.js')}}"></script>
<script src="{{asset('js/widgets/employer-form/employer-form.min.js')}}"></script>
<script src="{{asset('js/widgets/line-chart/line-charts-nvd3.min.js')}}"></script>
<script src="{{asset('js/widgets/map/maps.min.js')}}"></script>
<script src="{{asset('js/widgets/pie-chart/pie-charts-nvd3.min.js')}}"></script>
<script src="{{asset('js/widgets/table/table.min.js')}}"></script>
<script src="{{asset('js/widgets/todo/todo.min.js')}}"></script>
<!-- endinject -->
{{-- bootstrap --}}
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- data tables --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

{{-- Sweet Alert --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.13/dist/sweetalert2.all.min.js">
</script>

@yield('scripts')

</body>

</html>
