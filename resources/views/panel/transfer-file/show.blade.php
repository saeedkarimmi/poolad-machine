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
                <div class="row">
                    <div class="col-md-12">
                        <form data-type="ajax-form" action="{{ route('panel.transfer_files.step', $transferFile->id) }}" method="post">
                            @csrf
                            <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
                            <?php $buttonVal = "" ?>
                            @if($transferFile->status == constant('INITIAL'))
                                <?php $buttonVal = "تکمیل پرونده حمل" ?>
                            @elseif($transferFile->status == constant('COMPLETE_FILES'))
                                <?php $buttonVal = "ثبت" ?>
                                <input type="text" class="form-control" name="arrival_notice_date">
                            @elseif($transferFile->status == constant('ARRIVAL_NOTICE'))
                                <?php $buttonVal = "ثبت" ?>
                                <input type="text" class="form-control" name="release_date">
                            @endif
                            <button type="submit" class="btn btn-primary float-left">{{ $buttonVal }}</button>
                            <a href="{{ route('panel.transfer_files.index') }}"
                               class="btn btn-purple svg-wrapper purple float-right">
                                {{ trans('general.form.back') }}
                            </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush

