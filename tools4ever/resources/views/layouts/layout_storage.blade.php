<html>
    <head>
        <title>@yield('title')</title>
        @vite(['resources/css/layout_storage.css','resources/js/app.js'])
    </head>
    <body>
        @section('header')
            <header class="">
                <a href="products">products</a>
                <a href="storage">storage</a>
                <a href="storage">Order</a>
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