@extends('layouts.app')

@section('Title', 'Nexora Chat')

@section('content')
    <x-auth-card title="Enter the 6-digit code" subtitle="Enter the 6-digit code sent to your email to verify your identity.">
        <form action="{{ route('verify-otp') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <x-otp-input name="code" length="6" />

            <x-button type="submit" variant="primary">
                Verify
            </x-button>
        </form>
    </x-auth-card>
@endsection

@push('scripts')
@endpush
