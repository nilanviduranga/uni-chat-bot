@props(['title', 'subtitle'])

<div class="flex items-center justify-center mx-auto min-h-dvh w-full bg-violet-50 p-4">
    <div
        class="bg-white border px-6 sm:px-8 pb-8 sm:pb-8 pt-10 sm:pt-12 rounded shadow-2xl shadow-black/5 w-full max-w-md space-y-12">
        <div class="flex flex-col items-center justify-center gap-4">
            <img src="{{ asset('asset/images/logo/NEXORA.svg') }}" class="w-24" />
            <div class="space-y-2">
                <h2 class="mt-4 text-2xl tracking-tight font-semibold text-center">
                    {{ $title }}
                </h2>
                <p class="text-sm text-gray-500 text-center">
                    {{ $subtitle }}
                </p>
            </div>
        </div>

        {{ $slot }}
    </div>
</div>

@push('scripts')
@endpush
