<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pharmacy Portal</title>

        @livewireStyles

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

        <!-- Styles -->
        <link href="{{ asset('css/general.css') }}" rel="stylesheet">
        <link href="{{ asset('css/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/orders-page.css') }}" rel="stylesheet">
        <link href="{{ asset('css/orders-list.css') }}" rel="stylesheet">
        <link href="{{ asset('css/order-details.css') }}" rel="stylesheet">
        <link href="{{ asset('css/elapsed-time.css') }}" rel="stylesheet">
        <link href="{{ asset('css/order-details-footer.css') }}" rel="stylesheet">
        
    </head>
    <body>
        @livewireScripts
        @livewire('portal-window')
    </body>
</html>
