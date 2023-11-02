<html>
    <head>
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gradient-to-r from-rose-100 to-teal-100">
        @section('header')
            <header></header>
        @show
 
        <div id="main" class="md:p-24">
            @yield('content')
        </div>

        @section('footer')
            <footer></footer>
        @show

        @vite('resources/css/app.js')
    </body>
</html>
