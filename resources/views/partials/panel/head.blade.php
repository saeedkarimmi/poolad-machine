{{--<meta charset="utf-8">--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
<meta name="description" content="@yield('meta-description', trans('site.description'))">

<title> {{ trans('site.title')}} | @yield('page-title') </title>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="{{ asset('bundle/panel.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/panel.css') }}" />

{{--{!! htmlScriptTagJsApi() !!}--}}

@stack('styles')
