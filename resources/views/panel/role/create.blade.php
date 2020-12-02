@extends('layouts.panel')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form class="inline" method="post" data-type="ajax-form" action="{{ route('panel.roles.store') }}">
                    @csrf
                    <div class="alert alert-warning hidden"></div>
                    <div class="form-group inline wow fadeInUp faster" data-wow-delay="0s">
                        <label for="exampleInputEmail1">{{ trans('role.form.name') }}</label>
                        <input type="text" class="form-control" name="name" value="" >
                    </div>
                    <div class="form-group inline wow fadeIn faster" data-wow-delay="0.05s">
                        <div class="form-group inline checkbox-group-list">
                            <div class="checkbox-list">
                                @foreach($permissions as $id => $permission)
                                    <div class="custom-checkbox nice">
                                        <label for="permissions{{ $id }}">{{ trans('permission.' . $permission) }}</label>
                                        <input type="checkbox" name="permissions[]" id="permissions{{ $id }}" value="{{ $id }}" />
                                        <label for="permissions{{ $id }}"></label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
                        <button type="submit" class="btn btn-green svg-wrapper">
                            {{ trans('role.form.submit') }}
                        </button>
                        <a href="{{ route('panel.roles.index') }}" class="btn btn-purple svg-wrapper purple">
                            {{ trans('role.form.back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
