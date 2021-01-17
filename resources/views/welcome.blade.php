<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>Laravel & Vue</title>
    </head>
    <body>
        <div id="main" class="container">
            <div class="row">
                <div class="col-4">
                    <h2>Vuejs - AJAX axios</h2>
                    <ul class="list-group">
                        <li class="list-group-item" v-for="usuario in usuarios" v-text="usuario.name"></li>
                    </ul>
                </div>

                <div class="col-8">
                    <h2>JSON</h2>
                    <pre class="bg-light border">
                        <code>
                            @{{ $data }}
                        </code>
                    </pre>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
