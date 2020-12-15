@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                @if($dataTable)
                    <div class="ibox-title">
                        <h5>Basic Data Tables example with responsive plugin</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                        @push('scripts')
                            {!! $dataTable->scripts() !!}
                        @endpush
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--    <div class="content-wrapper">--}}
    {{--        <a href="{{ route('panel.roles.create') }}" class="btn btn-success btn-sm float-left">ایجاد</a>--}}
    {{--        @if($dataTable)--}}
    {{--            <div class="ibox float-e-margins">--}}
    {{--                <div class="ibox-content">--}}
    {{--                    <div class="table-responsive" style="overflow: visible">--}}
    {{--                        {!! $dataTable->table() !!}--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            @push('scripts')--}}
    {{--                {!! $dataTable->scripts() !!}--}}
    {{--            @endpush--}}
    {{--        @endif--}}
    {{--        <div class="clearfix"></div>--}}
    {{--    </div>--}}
@endsection

@push('scripts')

@endpush

