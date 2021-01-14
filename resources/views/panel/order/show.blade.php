@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.order.show') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <tbody>
                            <tr class="mb-10">
                                <td colspan="2" class="text-center">
                                    <strong>{{ $order->order_name }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ trans('validation.attributes.seller_id') }} :
                                    <strong>{{ $order->seller->name }}</strong>
                                </td>
                                <td>
                                    {{ trans('validation.attributes.registered_at'). ' (شمسی)' }} :
                                    <strong>{{ $order->registered_at }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ trans('validation.attributes.payment_method_id') }} :
                                    <strong>{{ $order->paymentMethod->name }}</strong>
                                </td>
                                <td>
                                    {{ trans('validation.attributes.registered_at'). ' (میلادی)' }} :
                                    <strong>{{ \Carbon::instance(Verta::parse($order->registered_at)->datetime())->format('Y/m/d') }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ trans('validation.attributes.description') }} :
                                    <strong>{{ $order->description }}</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('panel.import_files.create') }}" method="get" {{--data-type="ajax-form"--}}>
                            <div class="alert alert-warning d-none"></div>
                            <input type="hidden" name="order_id" value="{{ $order->id}}">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>{{ trans('validation.attributes.machine_model_id') }}</th>
                                    <th>{{ trans('validation.attributes.spiral_id') }}</th>
                                    <th>{{ trans('validation.attributes.system_control_id') }}</th>
                                    <th>{{ trans('validation.attributes.FOB_price') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->details as $detail)
                                    <tr>
                                        <td>
                                            <input type="checkbox" checked class="i-checks" name="details[]" value="{{$detail->id}}" {{ $detail->isDocumented() ? 'disabled':'' }}>
                                        </td>
                                        <td>
                                            {{ $detail->machineModel->enName }}
                                        </td>
                                        <td>
                                            {{ $detail->spiral->name }}
                                        </td>
                                        <td>
                                            {{ $detail->systemControl->name }}
                                        </td>
                                        <td>
                                            {{ $detail->FOB_price }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot class="bg-muted">
                                <tr>
                                    <td class="" colspan="4"><b>مبلغ کل FOB</b></td>
                                    <td class="text-center" colspan="1"><b>$360,000</b></td>
                                </tr>
                                <tr>
                                    <td class="" colspan="4"><b>مبلغ کل سفارش</b></td>
                                    <td class="text-center" colspan="1"><b>{{ number_format($order->sum) }}</b></td>
                                </tr>
                                </tfoot>
                            </table>
                            <button type="submit" class="btn btn-primary">تشکیل پرونده واردات</button>
{{--                            <a href="{{ route('panel.orders.index') }}"--}}
{{--                               class="btn btn-purple svg-wrapper purple float-right">--}}
{{--                                {{ trans('general.form.back') }}--}}
{{--                            </a>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
