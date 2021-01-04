@stack('prepend-scripts')
<script src="{{ asset('bundle/panel.js') }}"></script>
@stack('scripts')
<script src="{{ asset('js/panel.js') }}"></script>


<script>
    $(document).ready(function () {
                @if ($errors->any())
        var errors = {!! json_encode($errors->all(), true) !!};
        console.log(errors);
        @endif
    });
</script>
