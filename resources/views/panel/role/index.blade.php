@extends('layouts.panel')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
    <div class="content-wrapper">
        <a href="{{ route('panel.roles.create') }}" class="btn btn-success btn-sm float-left">ایجاد</a>
        @if($dataTable)
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive" style="overflow: visible">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
            @push('scripts')
                {!! $dataTable->scripts() !!}
            @endpush
        @endif
        <div class="clearfix"></div>
    </div>
@endsection

@push('scripts')

@endpush

