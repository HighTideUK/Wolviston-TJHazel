@if (session()->has('info') || session()->has('success') || session()->has('alert'))
    @if (session('info'))
        <script type="text/javascript">
            toastr.info('{{ strip_tags(session('info')) }}');
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            toastr.error('{{ strip_tags(session('error')) }}');
        </script>
    @endif
    @if (session('success'))
        <script type="text/javascript">
            toastr.success('{{ strip_tags(session('success')) }}');
        </script>
    @endif
@endif

@if ($errors->any())
    <script type="text/javascript">
        toastr.error('{{ strip_tags($errors->first()) }}');
    </script>
@endif