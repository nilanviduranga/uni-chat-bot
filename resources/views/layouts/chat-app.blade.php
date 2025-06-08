<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://unpkg.com/tailwindcss@1.9.6/dist/tailwind.min.css" rel="stylesheet">
    @stack('header_scripts')

</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="flex h-screen antialiased text-gray-800">
        <div class="flex flex-row h-full w-full overflow-x-hidden">

            {{-- side-bar components --}}
            <div class="flex flex-col py-8 pl-5 pr-5 w-64 bg-white flex-shrink-0">

                @include('components.quick-chat')
                @include('components.user-info')
                @include('components.conversations')

            </div>
            {{-- end side-bar components --}}



            {{-- chat-box components --}}
            <div class="flex flex-col flex-auto h-full p-6">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                    <div class="flex flex-col h-full overflow-x-auto mb-4">
                        <div class="flex flex-col h-full">

                            {{-- chat-content --}}
                            @yield('chat-content')
                            {{-- end content --}}

                        </div>
                    </div>
                    @include('components.chat-footer-action')
                </div>
            </div>
            {{-- end chat-box components --}}

        </div>
    </div>

    @stack('scripts')

</body>

</html>
