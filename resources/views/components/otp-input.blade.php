@props([
    'label' => null,
    'name' => 'code',
    'length' => 6,
    'autofocus' => true,
    'required' => true,
])

@php
    $count = (int) $length;
@endphp

<div class="space-y-1" id="otp-container-{{ $name }}">
    @if ($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="flex space-x-2 justify-center">
        @for ($i = 0; $i < $count; $i++)
            <input type="text" inputmode="numeric" maxlength="1" pattern="[0-9]*"
                class="w-full h-12 text-center border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-400 text-xl otp-digit"
                data-index="{{ $i }}" @if ($autofocus && $i === 0) autofocus @endif
                autocomplete="one-time-code" />
        @endfor
        <!-- Hidden input that will actually be submitted -->
        <input type="hidden" name="{{ $name }}" id="otp-value-{{ $name }}">
    </div>

    @if (session('error'))
        <p class="text-sm text-red-500">{{ session('error') }}</p>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('otp-container-{{ $name }}');
        if (!container) return;

        const digits = container.querySelectorAll('.otp-digit');
        const hiddenInput = document.getElementById('otp-value-{{ $name }}');

        // Update the hidden input whenever digits change
        function updateOTPValue() {
            let otp = '';
            digits.forEach(digit => {
                otp += digit.value || '';
            });
            hiddenInput.value = otp;
        }

        digits.forEach((digit, index) => {
            // Handle input
            digit.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '');
                updateOTPValue();

                if (this.value.length === 1 && index < digits.length - 1) {
                    digits[index + 1].focus();
                }
            });

            // Handle backspace
            digit.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && !this.value && index > 0) {
                    digits[index - 1].focus();
                }
            });

            // Handle paste
            digit.addEventListener('paste', function(e) {
                e.preventDefault();
                const pasteData = e.clipboardData.getData('text').replace(/\D/g, '');

                // Fill all digits with paste data
                for (let i = 0; i < Math.min(pasteData.length, digits.length); i++) {
                    digits[i].value = pasteData[i] || '';
                }

                updateOTPValue();
                digits[Math.min(pasteData.length - 1, digits.length - 1)].focus();
            });
        });
    });
</script>
