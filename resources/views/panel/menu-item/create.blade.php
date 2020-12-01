@extends('layouts.panel')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form method="post" action="{{ route('panel.menu_items.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">نام منو</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="parent_id">والد</label>
                        <select class="form-control" name="parent_id" id="parent_id">
                            <option value="">--والد--</option>
                            @foreach($menuItems as $menuItem)
                            <option value="{{ $menuItem->id }}">{{ $menuItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
