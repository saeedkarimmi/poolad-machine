<script src="{{ asset('bundle/panel.js') }}"></script>
<script src="{{ asset('js/panel.js') }}"></script>


@stack('scripts')
<script>
    $(document).ready(function () {
        @if ($errors->any())
{{--            @dd($errors->all())--}}
            var errors = {!! json_encode($errors->all(), true) !!};
            showSwal(errors, 'error');
        @elseif (session('status'))
            window.showSwal(['{{ session('status') }}'], 'info');
        @elseif (session('info'))
            window.showSwal(['{{ session('info') }}'], 'info');
        @elseif (session('success'))
            window.showSwal(['{{ session('success') }}'], 'success');
        @elseif (session('warning'))
            window.showSwal(['{{ session('warning') }}'], 'warning');
        @endif
        if (window.sessionStorage.getItem('_message_') != null) {
            window.showSwal([window.sessionStorage.getItem('_message_')], 'success');
            window.sessionStorage.removeItem('_message_');
        }
    });
</script>
