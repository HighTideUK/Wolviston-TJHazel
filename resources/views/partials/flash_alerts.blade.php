@if (session()->has('info') || session()->has('success') || session()->has('alert'))
    @if (session('info'))
        <div class="flash-alert-wrapper">
            <div class="alert alert-info" role="alert">
                {{ session('info') }}
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="flash-alert-wrapper">
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @endif
    @if (session('success'))
        <div class="flash-alert-wrapper">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif
@endif

@if ($errors->any())
    <div class="flash-alert-wrapper">
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    </div>
@endif