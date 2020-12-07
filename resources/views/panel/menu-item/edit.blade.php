@extends('layouts.panel')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form class="inline" method="post" data-type="ajax-form"  action="{{ route('panel.menu_items.update' , $menuItem->id) }}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">نام منو</label>
                        <input type="text" class="form-control" value="{{ $menuItem->name }}" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="parent_id">والد</label>
                        <select class="form-control" name="parent_id" id="parent_id">
                            <option value="">--والد--</option>
                            @foreach($menuItems as $menu)
                                <option value="{{ $menu->id }}" {{ $menu->id == $menuItem->parent_id ? 'selected' : '' }}>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('panel.menu_items.index') }}" class="btn btn-purple svg-wrapper purple">
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
