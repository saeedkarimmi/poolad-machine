@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.transfer-file.show') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>{{ trans('validation.attributes.shipping_name') }}</td>
                                <td>{{ $transferFile->shipping_name }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.insurance_number') }}</td>
                                <td>{{ $transferFile->insurance_number }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.freight_number') }}</td>
                                <td>{{ $transferFile->freight_number }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.freight_date') }}</td>
                                <td>{{ $transferFile->freight_date }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.arrival_notice_date') }}</td>
                                <td>{{ $transferFile->arrival_notice_date }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.release_date') }}</td>
                                <td>{{ $transferFile->release_date }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>{{ trans('validation.attributes.container_type') }}</th>
                                <th>{{ trans('validation.attributes.unit_price') }}</th>
                                <th>{{ trans('validation.attributes.count') }}</th>
                                <th>{{ trans('validation.attributes.total_price') }}</th>
                                <th>{{ trans('general.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transferFile->details as $detail)
                                <tr>
                                    <td>{{ $detail->container->name }}</td>
                                    <td>{{ $detail->unit_price }}</td>
                                    <td>{{ $detail->count }}</td>
                                    <td>{{ $detail->unit_price * $detail->count }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush

