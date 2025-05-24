@extends('layouts.auth-app')

@section('auth-content')
    <div class="flex items-center justify-center min-h-screen bg-indigo-50">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
            <div class="flex flex-col items-center mb-6">
                <div class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-12 w-12">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m0-6h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="mt-4 text-2xl font-bold text-indigo-700">Enter OTP</h2>
                <p class="text-sm text-gray-500">Check your email for the OTP</p>
            </div>
            <form action="{{ route('verify-otp') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="email" value="{{ old('email', $email) }}" />

                <label class="block text-sm font-medium text-gray-700 mb-1">OTP Code</label>
                <input type="text" placeholder="123456" required name="code"
                    class="w-full px-4 py-2 mb-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">

                <!-- Error Message -->
                @error('code')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Verify</button>
            </form>
        </div>
    </div>
@endsection
