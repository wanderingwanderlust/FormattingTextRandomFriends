<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cover My Meds Step 2</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <div class="container">
        <div id="app">
            <h5 class="hello-background">Hello <span class="world-color">World</span></h5>

            <cover-my-meds></cover-my-meds>
            <p>
                {!! $read_file !!}
            </p>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>