<html>
    <head>
        <title>@yield('title')</title>
        @vite(['resources/css/layout_storage.css'])
    </head>
    <body>
        @section('header')
            <header class="">
                <a href="storage">storage</a>
                <a href="order">order</a>
                <a href="history">storage</a>
            </header>
        @show
 
        <div class="container">
            @yield('content')
        </div>
        @section('footer')
        <footer>
        <p>This is the footer</p>
        </footer>
        @show
    </body>
</html>