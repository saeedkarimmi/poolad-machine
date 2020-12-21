<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title> {{ trans('site.title')}} | @yield('page-title') </title>

<meta name="description" content="@yield('meta-description', trans('site.description'))">


<link href="{{ asset('bundle/panel.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

{{--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--<link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">--}}

<!-- Toastr style -->
{{--<link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">--}}

<!-- DataTable style -->
{{--<link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">--}}

<!-- Gritter -->
{{--<link href="{{ asset('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">--}}

{{--<link href="{{ asset('css/animate.css') }}" rel="stylesheet">--}}
{{--<link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">


{{--{!! htmlScriptTagJsApi() !!}--}}

@stack('styles')
