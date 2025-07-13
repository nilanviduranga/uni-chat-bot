@extends('layouts.app')

@section('Title', 'Nexora Chat')

@section('content')
    <x-auth-card title="Continue to login"
        subtitle="Enter your email address to receive a one time password (OTP) for verification.">
        <form action="{{ route('login-request') }}" method="POST" class="space-y-6">
            @csrf

            <x-input label="Email Address" name="email" type="email" placeholder="you@example.com" required />

            <x-button type="submit" variant="primary" onclick="buttonStatus()" id="submitButton">
                Send OTP
            </x-button>
        </form>
    </x-auth-card>
@endsection

@push('scripts')
    <script>
        function buttonStatus() {
            submitButton.innerText = 'OTP Sending...';
            // submitButton.disabled = true;
        }
    </script>
@endpush
