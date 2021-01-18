@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.import-file.show') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>{{ trans('validation.attributes.file_number') }}</td>
                                <td>{{ $importFile->file_number }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.order_registration_code') }}</td>
                                <td>{{ $importFile->order_registration_code }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.proforma_number') }}</td>
                                <td>{{ $importFile->proforma_number }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.incoterm') }}</td>
                                <td>{{ $importFile->incoterm }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.currency_id') }}</td>
                                <td>{{ $importFile->currency->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.bank_id') }}</td>
                                <td>{{ $importFile->bank->name. ' ' . $importFile->bank->code }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.order_register_completion_date') }}</td>
                                <td>{{ $importFile->order_register_completion_date }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.order_register_issue_date') }}</td>
                                <td>{{ $importFile->order_register_issue_date }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.order_register_validity_date') }}</td>
                                <td>{{ $importFile->order_register_validity_date }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.currency_allocate_application_date') }}</td>
                                <td>{{ $importFile->currency_allocate_application_date }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.currency_allocate_issue_date') }}</td>
                                <td>{{ $importFile->currency_allocate_issue_date }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('validation.attributes.validity_currency_allotment_date') }}</td>
                                <td>{{ $importFile->validity_currency_allotment_date }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>{{ trans('validation.attributes.machine_model_id') }}</th>
                                <th>{{ trans('validation.attributes.serial_number') }}</th>
                                <th>{{ trans('validation.attributes.FOB_price') }}</th>
                                <th>{{ trans('validation.attributes.shipping_file') }}</th>
                                <th>{{ trans('general.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($importFile->details as $detail)
                                <tr>
                                    <td>
                                        <input type="checkbox" checked class="i-checks" name="details[]" value="{{$detail->id}}" {{--{{ $detail->isDocumented() ? 'disabled':'' }}--}}>
                                    </td>
                                    <td>
                                        {{ $detail->orderDetail->machineModel->enName }}
                                    </td>
                                    <td>
                                        {{ $detail->serial_number }}
                                    </td>
                                    <td>
                                        {{ $detail->FOB_price }}
                                    </td>
                                    <td>
{{--                                        {{ $detail->FOB_price }}--}}
                                    </td>
                                    <td>
{{--                                        {{ $detail->FOB_price }}--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="bg-muted">
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-center" colspan="1"><b>$360,000</b></td>
                                <td colspan="2"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
