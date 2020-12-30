@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.container.edit') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" data-type="ajax-form" action="{{ route('panel.containers.update' , $container->id) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="alert alert-warning d-none"></div>
                                    <div class="form-group">
                                        <label for="name">{{ trans('validation.attributes.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $container->name }}">
                                    </div>
                                    <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
                                        <button type="submit" class="btn btn-primary">{{ trans('role.form.submit') }}</button>
                                        <a href="{{ route('panel.roles.index') }}"
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
