@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form class="inline" method="post" data-type="ajax-form" action="{{ route('panel.users.store') }}">
                    @csrf
                    <div class="alert alert-warning hidden"></div>
                    <div class="form-group">
                        <label for="name">{{ trans('validation.attributes.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value=""
                               data-persian
                               required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('validation.attributes.email') }}</label>
                        <input type="text" class="form-control" id="email" name="email"
                               data-english
                               data-filter="[^a-zA-Z0-9@\._-]"
                               value="" required>
                    </div>
                    <div class="form-group">
                        <label for="roles">{{ trans('validation.attributes.role') }}</label>
                        <select class="form-control select2" id="roles" name="roles[]" multiple>
                            @foreach($roles as $role)
                                <option value="{{ $role->id}}" >{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ trans('validation.attributes.password') }}</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{ trans('validation.attributes.password_confirmation') }}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
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
