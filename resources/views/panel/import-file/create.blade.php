@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.import-file.create') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" data-type="ajax-form" action="{{ route('panel.import_files.store') }}">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ request()->get('order_id') }}">
                                    <div class="alert alert-warning d-none"></div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="file_number">{{ trans('validation.attributes.file_number') }}</label>
                                                <input type="text" class="form-control" id="file_number" name="file_number" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="order_registration_code">{{ trans('validation.attributes.order_registration_code') }}</label>
                                                <input type="text" class="form-control" id="order_registration_code" name="order_registration_code" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="incoterm">{{ trans('validation.attributes.incoterm') }}</label>
                                                <input type="text" class="form-control" id="incoterm" name="incoterm" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="proforma_number">{{ trans('validation.attributes.proforma_number') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="proforma_number" id="proforma_number"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="currency_id">{{ trans('validation.attributes.currency_id') }}</label>
                                                <select name="currency_id" id="currency_id" class="form-control">
                                                    @foreach($currencies as $currency)
                                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="bank_id">{{ trans('validation.attributes.bank_id') }}</label>
                                                <select name="bank_id" id="bank_id" class="form-control">
                                                    @foreach($banks as $bank)
                                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="order_register_completion_date">{{ trans('validation.attributes.order_register_completion_date') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="order_register_completion_date" id="order_register_completion_date" data-datepicker />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="order_register_issue_date">{{ trans('validation.attributes.order_register_issue_date') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="order_register_issue_date" id="order_register_issue_date" data-datepicker />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="order_register_validity_date">{{ trans('validation.attributes.order_register_validity_date') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="order_register_validity_date" id="order_register_validity_date" data-datepicker />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="currency_allocate_application_date">{{ trans('validation.attributes.currency_allocate_application_date') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="currency_allocate_application_date" id="currency_allocate_application_date" data-datepicker />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="currency_allocate_issue_date">{{ trans('validation.attributes.currency_allocate_issue_date') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="currency_allocate_issue_date" id="currency_allocate_issue_date" data-datepicker />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="validity_currency_allotment_date">{{ trans('validation.attributes.validity_currency_allotment_date') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="validity_currency_allotment_date" id="validity_currency_allotment_date" data-datepicker />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr class="text-center">
                                                    <th>{{ trans('validation.attributes.machine_model_id') }}</th>
                                                    <th>{{ trans('validation.attributes.serial_number') }}</th>
                                                    <th>{{ trans('validation.attributes.FOB_price') }}</th>
                                                    <th>{{ trans('validation.attributes.shipping_file') }}</th>
                                                    <th>{{ trans('general.form.action') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orderDetails as $key => $orderDetail)
                                                <input type="hidden" name="order_details[{{ $key }}][order_detail_id]" value="{{ $orderDetail->id }}">
                                                <tr>
                                                    <td>{{ $orderDetail->machineModel->enName }}</td>
                                                    <td>
                                                        <input type="text" id="serial_number" name="order_details[{{ $key }}][serial_number]" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" id="FOB_price" name="order_details[{{ $key }}][FOB_price]" class="form-control" value="{{ $orderDetail->FOB_price }}">
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="text-center wow fadeIn faster">
                                        <button type="submit"
                                                class="btn btn-primary">{{ trans('general.form.submit') }}</button>
{{--                                        <a href="{{ route('panel.orders.index') }}"--}}
{{--                                           class="btn btn-purple svg-wrapper purple">--}}
{{--                                            {{ trans('general.form.back') }}--}}
{{--                                        </a>--}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
