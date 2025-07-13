@extends('layouts.app')

@section('Title', 'Nexora Chat')

@section('content')
    <x-auth-card title="Enter the 6-digit code" subtitle="Enter the 6-digit code sent to your email to verify your identity.">
        <form action="{{ route('verify-otp') }}" method="POST" class="space-y-6">
            @csrf

            <input type="hidden" name="email" value="{{ $email }}">

            <x-otp-input name="code" length="6" />
            @if ($errors->has('error'))
                <p class="text-sm text-red-500">{{ $errors->first('error') }}</p>
            @endif

            <x-button type="submit" variant="primary">
                Verify
            </x-button>
        </form>
    </x-auth-card>
@endsection

@push('scripts')
    {{-- <script>
        history.replaceState(null, '', location.href);
        window.addEventListener('popstate', function() {
            window.location.href = "{{ route('login') }}";
        });
    </script> --}}
@endpush
