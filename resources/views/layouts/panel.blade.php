<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('partials.panel.head')
</head>
<body dir="rtl">
<div class="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">پولاد ماشین</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @foreach ($menuItems as $menuItem)
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $menuItem->name }}
                        </a>
                        @if (isset($menuItem->children) and count($menuItem->children))
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($menuItem->children as $item)
                                <a class="dropdown-item" href="#">{{ $item->name }}</a>
                            @endforeach
                        </div>
                        @endif
                    </li>
                </ul>
            @endforeach

        </div>
    </nav>
    <main>
        <div class="container main-content">
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>

<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <h5>footer</h5>
            <small class="d-block mb-3 text-muted">© 2017-2018</small>
        </div>
    </div>
</footer>

@include('partials.panel.scripts')
<script>
    $(document).ready(function () {
            @if ($errors->any())
        var errors = {!! json_encode($errors->all(), true) !!};
        console.log(errors);
        @endif
    });
</script>
</body>
</html>


