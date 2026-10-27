<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Hypervel') }}</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                height: 100vh;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                margin-bottom: 30px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    @endif
</head>

<body>
    <div class="flex-center">
        <div class="content">
            <div class="title">
                Hypervel
            </div>

            <div class="links">
                <a href="https://hypervel.org" target="_blank">Hypervel</a>
                <a href="https://github.com/hypervel/hypervel" target="_blank">GitHub</a>
            </div>
        </div>
    </div>
</body>

</html>
