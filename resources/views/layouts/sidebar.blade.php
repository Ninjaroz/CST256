<!doctype html>
<html>
<body>
<div class="container">

    <header>
        @include('includes.header')
    </header>

    <div id="main">

        <!-- sidebar content -->
        <div id="sidebar" class="col-md-4">
            @include('includes.sidebar')
        </div>

        <!-- main content -->
        <div id="content">
            @yield('content')
        </div>

    </div>

    <footer>
        @include('includes.footer')
    </footer>

</div>
</body>
</html>