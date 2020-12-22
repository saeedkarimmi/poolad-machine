@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" data-type="ajax-form" action="{{ route('panel.users.store') }}">
                                    @csrf
                                    <div class="alert alert-warning d-none"></div>
                                    <div class="form-group">
                                        <label for="name">{{ trans('validation.attributes.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value=""
                                               data-persian
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">{{ trans('validation.attributes.last_name') }}</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               value=""
                                               data-persian
                                               {{--required--}}>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ trans('validation.attributes.email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               data-english
                                               data-filter="[^a-zA-Z0-9@\._-]"
                                               value="" {{--required--}}>
                                    </div>
                                    <div class="form-group">
                                        <label for="roles">{{ trans('validation.attributes.roles') }}</label>
                                        <select class="form-control select2" id="roles" name="roles[]" multiple="multiple">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id}}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ trans('validation.attributes.password') }}</label>
                                        <input type="password" class="form-control" id="password" name="password" {{--required--}}>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">{{ trans('validation.attributes.password_confirmation') }}</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                               name="password_confirmation" {{--required--}}>
                                    </div>
                                    <div class="form-group">
                                        <label for="active">{{ trans('validation.attributes.status') }}</label>
                                        <div class="i-checks "><label> <input type="radio" checked="" value="1" name="status"> <i></i> {{ trans('validation.attributes.active') }} </label></div>
                                        <div class="i-checks "><label> <input type="radio" value="0" name="status"> <i></i> {{ trans('validation.attributes.inactive') }} </label></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" name="submit" type="submit">{{ trans('role.form.submit') }}</button>
                                            <a class="btn btn-white" href="{{ route('panel.users.index') }}">{{ trans('role.form.back') }}</a>
                                        </div>
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
