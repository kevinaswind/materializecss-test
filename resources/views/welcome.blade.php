<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container p-40 mt-40 z-depth-2">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel {{ __('auth.failed') }}
                </div>

                <h1>
                    {{ \App\Homepage::find(1)->title }}
                </h1>

                <div>
                    {!! \App\Homepage::find(1)->content !!}
                </div>

                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                   <h2>{{ strtoupper(app()->getLocale()) }}</h2>
                </a>

                <!-- Dropdown Trigger -->
                <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    @foreach(config('app.languages') as $langLocale => $langName)
                        <li><a href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let elems = document.querySelectorAll('.dropdown-trigger');
                let instances = M.Dropdown.init(elems, {});
            });
        </script>
    </body>
</html>
