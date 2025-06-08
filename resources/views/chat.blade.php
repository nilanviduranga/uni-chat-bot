@extends('layouts.chat-app')


@push('header_scripts')
    <script>
        window.Laravel = {
            userId: {{ $userId }}
        };
    </script>
@endpush


@section('chat-content')

    <div class="grid grid-cols-12 gap-y-2" id="chat-box">



    </div>
@endsection

@push('scripts')
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script type="text/javascript" src="{{ asset('asset/js/pusher.js') }}"></script>
@endpush
