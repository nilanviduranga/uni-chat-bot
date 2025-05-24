@extends('layouts.auth-app')

@section('auth-content')
<div class="flex items-center justify-center min-h-screen bg-indigo-50">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <div class="flex flex-col items-center mb-6">
            <div class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-12 w-12">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H8m0 0v8m0-8V4m0 8h8" />
                </svg>
            </div>
            <h2 class="mt-4 text-2xl font-bold text-indigo-700">Welcome Back</h2>
            <p class="text-sm text-gray-500">Enter your email to continue</p>
        </div>
        <form>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" placeholder="you@example.com"
                class="w-full px-4 py-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Send OTP</button>
        </form>
    </div>
</div>

@endsection

