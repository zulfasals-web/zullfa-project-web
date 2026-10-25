<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Chewy Bakery') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body style="background-color: #FFF8F0; color: #4A2E1D;" class="font-sans antialiased">
        <div style="background-color: #FFF8F0; min-height: 100vh; padding: 40px 20px;" class="flex flex-col sm:justify-center items-center">
            
            <!-- Logo Bakery -->
            <div style="margin-bottom: 25px; text-align: center;">
                <a href="/" style="text-decoration: none; display: inline-flex; align-items: center; gap: 12px;">
                    <div style="background-color: #4A2E1D; color: #FFF8F0; width: 50px; height: 50px; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; box-shadow: 0 8px 16px rgba(74, 46, 29, 0.15);">
                        🥐
                    </div>
                    <div style="text-align: left;">
                        <span style="color: #4A2E1D; font-family: serif; font-size: 22px; font-weight: bold; display: block; line-height: 1.1;">Chewy Bakery</span>
                        <span style="color: #E67E22; font-size: 10px; font-weight: bold; letter-spacing: 1.5px; text-transform: uppercase;">ARTISANAL & FRESH</span>
                    </div>
                </a>
            </div>

            <!-- Card Kotak Lebar dan Longgar -->
            <div style="background-color: #FFFFFF; border: 1.5px solid #E8D8C8; border-radius: 36px; box-shadow: 0 20px 40px rgba(74, 46, 29, 0.07); width: 100%; max-width: 500px; padding: 40px 36px;" class="overflow-hidden">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>