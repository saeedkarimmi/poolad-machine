<!DOCTYPE html>
<html>
<head>
    @include('cms::theme-inspinia.partials.head')
</head>

<body>
<div id="wrapper">
    @include('cms::theme-inspinia.partials.sidebar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('cms::theme-inspinia.partials.topbar')
        @include('cms::theme-inspinia.partials.header')

        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        @include('cms::theme-inspinia.partials.footer')
    </div>
    @include('cms::theme-inspinia.partials.right-sidebar')
</div>

@include('cms::theme-inspinia.partials.scripts')
</body>
</html>
