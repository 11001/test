<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('partials.style')
    @include('partials.script')
</head>

<body>
<div class="container">
    @include('partials.header')

    <div class="black-back row-offcanvas row-offcanvas-left">

        <section class="content-header">
            @yield('content-header')
        </section>

        <section class="content">
            @yield('content')
        </section>
    </div>
</div>


@yield('script')
</body>
</html>