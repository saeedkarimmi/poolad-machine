@extends('layouts.panel')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
@foreach($roles as $role)
    <h1>{{ $role->name }}</h1>
@endforeach

@endsection

@push('scripts')

@endpush

