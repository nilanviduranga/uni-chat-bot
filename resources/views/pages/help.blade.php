@extends('layouts.app')

@section('Title', 'Help & Support')

@section('content')
    <div class="flex min-h-dvh max-h-dvh justify-center items-center bg-gray-50 px-4 py-8">
        <div class="max-w-3xl w-full bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold text-gray-900 mb-6">Help & Support</h1>

            <p class="mb-4 text-gray-700">
                Welcome to the Help & Support center. If you're experiencing any issues or would like to report something related to the Nexora Chat system or university services, we're here to assist you.
            </p>

            <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">📩 Send a Complaint or Feedback</h2>
            <p class="text-gray-700 mb-2">
                You can email us directly with your concern or suggestion at:
            </p>

            <a href="mailto:support@nexora.example.com"
                class="inline-block text-violet-700 hover:text-violet-900 font-medium underline mb-6">
                support@nexora.example.com
            </a>

            <p class="text-gray-700 mb-6">
                Please include your name or student ID, a clear description of the issue, and any screenshots if possible. We'll do our best to respond promptly.
            </p>

            <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">💡 General Guidance</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li><strong>Login Method:</strong> Use the email-based OTP system to securely access Nexora Chat. No password is needed.</li>
                <li><strong>New Conversation:</strong> Click the <strong>+</strong> icon at the top or in the sidebar to start a new conversation with Nexora.</li>
                <li><strong>Available Help:</strong> Nexora can assist you with class schedules, bus times, cafeteria menus, events, and more.</li>
            </ul>

            <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">🛠️ Technical Support</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li><strong>Issues using chat:</strong> If messages are not sending or loading, try refreshing the page or reloading the session.</li>
                <li><strong>Still stuck?</strong> Reach out to <a href="mailto:support@nexora.example.com"
                        class="underline text-violet-700 hover:text-violet-900">support@nexora.example.com</a> for personal support.</li>
            </ul>

            <div class="mt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Nexora Chat. All rights reserved.
            </div>
        </div>
    </div>
@endsection
