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
                                        <input type="checkbox" class="i-checks details" name="details[]" value="{{$detail->id}}" {{ $detail->isDocumented() ? 'disabled':'checked' }}>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="transfer-file-modal" data-target="#myModal1">
                            تشکیل پرونده حمل
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
                            درخواست تامین ارز
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3">
                            ثبت پرداخت
                        </button>
                    </div>
                    <div class="modal inmodal fade" id="myModal1" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <form method="post" data-type="ajax-form" action="{{ route('panel.transfer_files.store' , $importFile->id) }}">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">56-A-1</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ trans('validation.attributes.shipping_name') }}</td>
                                                        <td><input type="text" name="shipping_name" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('validation.attributes.insurance_number') }}</td>
                                                        <td><input type="text" name="insurance_number" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('validation.attributes.freight_number') }}</td>
                                                        <td><input type="text" name="freight_number" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('validation.attributes.freight_date') }}</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="freight_date" id="freight_date" data-datepicker />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('validation.attributes.arrival_notice_date') }}</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="arrival_notice_date" id="arrival_notice_date" data-datepicker />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ trans('validation.attributes.release_date') }}</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="release_date" id="release_date" data-datepicker />
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-8 repeater">
                                                <input data-repeater-create class="float-right btn btn-success mb-2" type="button" value="افزودن"/>
                                                <br>
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
                                                    <tbody data-repeater-list="transport_details">
                                                        <tr data-repeater-item>
                                                            <td>
                                                                <select name="container_id" id="container_id" class="form-control">
                                                                    @foreach($containers as $container)
                                                                        <option value="{{ $container->id }}">{{ $container->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td class="input-group">
                                                                <input type="text" class="form-control" name="unit_price">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-addon currency">$</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="count" value="1" data-inputmask="'alias': 'date'">
                                                            </td>
                                                            <td class="input-group">
                                                                <input type="text" class="form-control" disabled>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-addon currency">$</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="btn btn-danger btn-xs" data-repeater-delete="" type="submit">حذف</span>
                                                            </td>
                                                        </tr>
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
                                    <div class="modal-footer float-left">
                                    <button type="submit" class="btn btn-primary">{{ trans('general.form.submit') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ trans('general.form.completion_transfer_file') }}</button>
                                        <button type="button" class="btn btn-white" data-dismiss="modal">{{ trans('general.form.close') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal fade" id="myModal2" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Title</h4>
                                </div>
                                <div class="modal-body">

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal fade" id="myModal3" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Title</h4>
                                </div>
                                <div class="modal-body">

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
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

            $('#transfer-file-modal').click(function(){
                let checked = document.querySelectorAll(".details[type=checkbox]:checked");
                let details = [];

                $('.detail_ids').each(function (index, element) {
                    element.remove();
                })

                $.each(checked, function (index, element) {
                    $('form').append( '<input type="hidden" class="detail_ids" name="detail_ids[]" value="'+ element.value +'">');
                });
            });
        });
    </script>
@endpush

