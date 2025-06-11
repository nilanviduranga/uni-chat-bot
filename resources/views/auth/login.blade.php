@extends('layouts.app')

@section('Title', 'Nexora Chat')

@section('content')
    <div class="flex items-center justify-center mx-auto h-screen w-full bg-violet-50">

        <div class="bg-white border px-8 pb-8 pt-12 rounded shadow-2xl shadow-black/5 w-full max-w-md space-y-12">
            <div class="flex flex-col items-center justify-center gap-4">
                <img src="{{ asset('asset/images/logo/NEXORA.svg') }}" class="w-24" />
                <h2 class="mt-4 text-2xl tracking-tight font-semibold text-center">Continue to login</h2>
            </div>

            <form class="space-y-6" action="{{ route('login-request') }}" method="POST">
                <div class="space-y-2">
                    @csrf
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" placeholder="you@example.com" required name="email"
                        class="w-full px-4 py-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-400">
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-violet-600 text-white py-2 rounded-lg hover:bg-violet-700 transition">Send
                    OTP</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

