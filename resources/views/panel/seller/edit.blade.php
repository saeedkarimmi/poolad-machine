@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.seller.edit') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" data-type="ajax-form" action="{{ route('panel.sellers.update' , $seller->id) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="alert alert-warning d-none"></div>
                                    <div class="form-group">
                                        <label for="name">{{ trans('validation.attributes.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $seller->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber">{{ trans('validation.attributes.phoneNumber') }}</label>
                                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $seller->phoneNumber }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">{{ trans('validation.attributes.tel') }}</label>
                                        <input type="text" class="form-control" id="tel" name="tel" value="{{ $seller->tel }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="fax">{{ trans('validation.attributes.fax') }}</label>
                                        <input type="text" class="form-control" id="fax" name="fax" value="{{ $seller->fax }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="agent">{{ trans('validation.attributes.agent') }}</label>
                                        <input type="text" class="form-control" id="agent" name="agent" value="{{ $seller->agent }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{ trans('validation.attributes.address') }}</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $seller->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ trans('validation.attributes.email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $seller->email }}">
                                    </div>
                                    <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
                                        <button type="submit" class="btn btn-primary">{{ trans('role.form.submit') }}</button>
                                        <a href="{{ route('panel.sellers.index') }}"
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

@endpush
