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
        <p id="resendBtn" class="text-sm text-gray-400 cursor-not-allowed">
            Resend code in <span id="countdown">60</span>s
        </p>
    </form>
</x-auth-card>
@endsection

@push('scripts')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const resendBtn = document.getElementById('resendBtn');
    let countdownSpan = document.getElementById('countdown');
    let seconds = 60;
    let timer = startCountdown(); // start timer on load

    function startCountdown() {
        return setInterval(() => {
            seconds--;
            if (seconds > 0) {
                if (countdownSpan) countdownSpan.textContent = seconds;
            } else {
                clearInterval(timer);
                resendBtn.innerHTML = 'Resend code';
                resendBtn.className = 'text-sm text-violet-600 hover:text-violet-800 cursor-pointer transition-colors duration-200';
            }
        }, 1000);
    }

    resendBtn.addEventListener('click', () => {
        if (seconds <= 0) {
            fetch('/resend-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        email: '{{ $email }}'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        seconds = 60;

                        resendBtn.className = 'text-sm text-gray-400 cursor-not-allowed';
                        resendBtn.innerHTML = 'Resend code in <span id="countdown">60</span>s';

                        // Re-query countdown span (since innerHTML replaced it)
                        countdownSpan = document.getElementById('countdown');

                        clearInterval(timer); // stop any old timer
                        timer = startCountdown(); // start new one
                    } else {
                        alert('Failed to resend code. Please try again later.');
                    }
                })
                .catch(error => {
                    console.error('Error resending OTP:', error);
                });
        }
    });
</script>



@endpush