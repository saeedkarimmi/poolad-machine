@extends('layouts.panel')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
@foreach($menuItems as $menuItem)
    <h1>{{ $menuItem->name }}</h1>
@endforeach

@endsection

@push('scripts')

@endpush

