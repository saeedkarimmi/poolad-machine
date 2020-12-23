@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.users.index') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    @if($dataTable)
                    <div class="ibox-content text-center p-md">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                    @push('scripts')
                        {!! $dataTable->scripts() !!}
                    @endpush
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

