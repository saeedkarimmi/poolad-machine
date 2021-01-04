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
                                                <label
                                                    for="order_name">{{ trans('validation.attributes.order_name') }}</label>
                                                <input type="text" class="form-control" id="order_name"
                                                       name="order_name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label for="seller_id">{{ trans('validation.attributes.seller_id') }}</label>
                                                <select name="seller_id" id="seller_id" class="form-control">
                                                    <option value="">-- فروشنده را انتخاب نمایید --</option>
                                                    @foreach($sellers as $seller)
                                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label
                                                    for="payment_method_id">{{ trans('validation.attributes.payment_method_id') }}</label>
                                                <select name="payment_method_id" id="seller_id" class="form-control">
                                                    <option value="">-- روش پرداخت را انتخاب نمایید --</option>
                                                    @foreach($paymentMethods as $paymentMethod)
                                                        <option
                                                            value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <label
                                                    for="register_date">{{ trans('validation.attributes.register_date') }}</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="register_date"
                                                           id="register_date"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label
                                                    for="description">{{ trans('validation.attributes.description') }}</label>
                                                <input type="text" class="form-control" id="description"
                                                       name="description" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="repeater">
                                                <div data-repeater-list="machine_models">
                                                    <div data-repeater-item>

                                                        <div class="form-inline">
                                                            <div class="form-group pr-3 ">
                                                                <label for="machine_model_id"  class="pl-3">{{ trans('validation.attributes.machine_model_id') }}</label>
                                                                <select name="machine_model_id" id="machine_model_id" class="form-control">
                                                                    @foreach($machineModels as $machineModel)
                                                                        <option value="{{ $machineModel->id }}">{{ $machineModel->faName }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group pr-3 ">
                                                                <label for="spiral_id"  class="pl-3">{{ trans('validation.attributes.spiral_id') }}</label>
                                                                <select name="spiral_id" id="spiral_id" class="form-control">
                                                                    @foreach($spirals as $spiral)
                                                                        <option value="{{ $spiral->id }}">{{ $spiral->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group pr-3 ">
                                                                <label for="system_control_id"  class="pl-3">{{ trans('validation.attributes.system_control_id') }}</label>
                                                                <select name="system_control_id" id="system_control_id" class="form-control">
                                                                    @foreach($systemControls as $systemControl)
                                                                        <option value="{{ $systemControl->id }}">{{ $systemControl->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="input-group pr-3 ">
                                                                <label for="FOB_price"  class="pl-3">{{ trans('validation.attributes.FOB_price') }}</label>
                                                                <input type="text" id="machine_model_id" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-addon">$</span>
                                                                </div>
                                                            </div>
                                                            <span class="btn btn-danger" data-repeater-delete="" type="submit">حذف</span>
                                                        </div>
                                                        <br>

                                                    </div>
                                                </div>
                                                <input data-repeater-create type="button" value="افزودن"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
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
                defaultValues: {
                    'textarea-input': 'foo',
                    'text-input': 'bar',
                    'select-input': 'B',
                    'checkbox-input': ['A', 'B'],
                    'radio-input': 'B'
                },
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
