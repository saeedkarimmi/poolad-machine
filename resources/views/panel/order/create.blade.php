@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.order.create') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" data-type="ajax-form" action="{{ route('panel.orders.store') }}">
                                    @csrf
                                    <div class="alert alert-warning d-none"></div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label for="order_name">{{ trans('validation.attributes.order_name') }}</label>
                                                <input type="text" class="form-control" id="order_name" name="order_name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label for="seller_id">{{ trans('validation.attributes.seller_id') }}</label>
                                                <select name="seller_id" id="seller_id" class="form-control">
                                                    @foreach($sellers as $seller)
                                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label for="payment_method_id">{{ trans('validation.attributes.payment_method_id') }}</label>
                                                <select name="payment_method_id" id="payment_method_id" class="form-control">
                                                    @foreach($paymentMethods as $paymentMethod)
                                                        <option
                                                            value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label for="registered_at">{{ trans('validation.attributes.registered_at') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="registered_at" id="registered_at"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label for="currency_id">{{ trans('validation.attributes.currency_id') }}</label>
                                                <select name="currency_id" id="currency_id" class="form-control">
                                                    @foreach($currencies as $currency)
                                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-6">
                                            <div class="form-group">
                                                <label
                                                    for="description">{{ trans('validation.attributes.description') }}</label>
                                                <input type="text" class="form-control" id="description" name="description" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                        <div class="col-md-12 repeater">
                                            <input data-repeater-create class="float-right btn btn-success mb-2" type="button" value="افزودن"/>
                                            <br>
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr class="text-center">
                                                    <th>{{ trans('validation.attributes.machine_model_id') }}</th>
                                                    <th>{{ trans('validation.attributes.spiral_id') }}</th>
                                                    <th>{{ trans('validation.attributes.system_control_id') }}</th>
                                                    <th>{{ trans('validation.attributes.FOB_price') }}</th>
                                                    <th>{{ trans('general.form.action') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody data-repeater-list="machine_models">
                                                    <tr data-repeater-item>
                                                        <td>
                                                            <select name="machine_model_id" id="machine_model_id" class="form-control">
                                                                @foreach($machineModels as $machineModel)
                                                                    <option value="{{ $machineModel->id }}">{{ $machineModel->enName }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="spiral_id" id="spiral_id" class="form-control">
                                                                @foreach($spirals as $spiral)
                                                                    <option value="{{ $spiral->id }}">{{ $spiral->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="system_control_id" id="system_control_id" class="form-control">
                                                                @foreach($systemControls as $systemControl)
                                                                    <option value="{{ $systemControl->id }}">{{ $systemControl->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="input-group">
                                                            <input type="text" name="FOB_price" class="form-control text-left">
                                                            <div class="input-group-append">
                                                                <span class="input-group-addon currency">$</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-danger" data-repeater-delete="" type="submit">حذف</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="bg-muted">
                                                    <tr>
                                                        <td class="" colspan="3"><b>مبلغ کل FOB</b></td>
                                                        <td class="text-center" colspan="2"><b>$360,000</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="" colspan="3"><b>مبلغ کل سفارش</b></td>
                                                        <td class="text-center" colspan="2">
                                                            <input type="text" id="sum" name="sum" class="form-control text-left">
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="text-center wow fadeIn faster">
                                        <button type="submit"
                                                class="btn btn-primary">{{ trans('role.form.submit') }}</button>
                                        <a href="{{ route('panel.orders.index') }}"
                                           class="btn btn-purple svg-wrapper purple">
                                            {{ trans('general.form.back') }}
                                        </a>
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
    <script src="{{ asset('js/jquery.repeater.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            'use strict';
            $('.repeater').repeater({
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    // if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    // }
                },
                ready: function (setIndexes) {

                }
            });
        });
    </script>
@endpush
