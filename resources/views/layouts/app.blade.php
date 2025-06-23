<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Responsive meta tag for mobile devices -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, height:device-height, viewport-fit=cover, interactive-widget=resizes-content">
    <!-- CSRF Token for security -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('Title', 'Nexora')</title>

    <!-- Google Fonts: Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Markdown Parser -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <!-- SweetAlert2 for alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DOMPurify for XSS protection -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.3/purify.min.js"></script>

    {{-- Alpine Js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Tailwind CSS custom configuration
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'nexora': '#7c3aed',
                        'nexora-light': '#8b5cf6',
                    },
                    fontFamily: {
                        'sans': ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Additional header scripts -->
    @stack('header_scripts')

    <!-- Custom Styles -->
    <style>
        /* Global font */
        * {
            font-family: "Manrope", sans-serif;
        }

        /* Custom minimal scrollbar style */
        ::-webkit-scrollbar {
            width: 6px;
            height: 8px;
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d9e2ed;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a2acb8;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Base Chat Markdown Styles */
        .markdown-content {
            line-height: 1.6;
            word-wrap: break-word;
            font-size: 15px;
        }

        /* Headers (simplified for chat) */
        .markdown-content h1,
        .markdown-content h2,
        .markdown-content h3 {
            margin-top: 1.2em;
            margin-bottom: 0.6em;
            font-weight: 600;
            line-height: 1.3;
        }

        .markdown-content h1 {
            font-size: 1.5em;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 0.3em;
        }

        .markdown-content h2 {
            font-size: 1.3em;
        }

        .markdown-content h3 {
            font-size: 1.1em;
        }

        /* Paragraphs with better spacing */
        .markdown-content p {
            margin-bottom: 0.5em;
        }

        /* No margin if only one paragraph */
        .markdown-content p:only-child {
            margin-bottom: 0;
        }

        /* No margin for last paragraph */
        .markdown-content p:last-child {
            margin-bottom: 0;
        }

        /* Links that work well in chat */
        .markdown-content a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .markdown-content a:hover {
            text-decoration: underline;
        }

        /* Lists optimized for chat */
        .markdown-content ul,
        .markdown-content ol {
            padding-left: 1.8em;
            margin: 0.8em 0;
        }

        .markdown-content li {
            list-style-type: disc;
            margin: 0.3em 0;
            padding-left: 0.3em;
        }

        /* Code blocks with great readability */
        .markdown-content code {
            font-family: ui-monospace, SFMono-Regular, SF Mono, Menlo, Consolas, monospace;
            background-color: rgba(156, 163, 175, 0.1);
            border-radius: 4px;
            font-size: 85%;
            padding: 0.2em 0.4em;
        }

        .markdown-content pre {
            background-color: #f3f4f6;
            border-radius: 8px;
            padding: 12px;
            overflow-x: auto;
            margin: 1em 0;
            font-size: 14px;
            line-height: 1.45;
        }

        .markdown-content pre code {
            background-color: transparent;
            padding: 0;
        }

        /* Blockquotes styled for chat */
        .markdown-content blockquote {
            border-left: 3px solid #e5e7eb;
            color: #4b5563;
            padding: 0 1em;
            margin: 1em 0;
            background-color: #f9fafb;
            border-radius: 0 6px 6px 0;
        }

        /* Tables that don't overflow */
        .markdown-content table {
            border-collapse: collapse;
            background-color: #ffffff;
            width: 100%;
            margin: 1em 0;
            font-size: 0.9em;
            box-shadow: 0 0 0 1px #e5e7eb;
            border-radius: 6px;
            overflow: hidden;
        }

        .markdown-content th,
        .markdown-content td {
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
        }

        .markdown-content th {
            background-color: #f3f4f6;
            font-weight: 600;
            text-align: left;
        }

        .markdown-content tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* Horizontal rules that fit chat */
        .markdown-content hr {
            height: 1px;
            background-color: #e5e7eb;
            border: none;
            margin: 1.5em 0;
        }

        /* Task lists */
        .markdown-content .contains-task-list {
            padding-left: 0;
            list-style: none;
        }

        .markdown-content .task-list-item {
            display: flex;
            align-items: center;
        }

        .markdown-content .task-list-item-checkbox {
            margin-right: 8px;
        }

        /* Special chat-optimized elements */
        .markdown-content .math {
            overflow-x: auto;
        }

        .markdown-content kbd {
            display: inline-block;
            padding: 2px 5px;
            font: 11px ui-monospace, SFMono-Regular, SF Mono, Menlo, Consolas, monospace;
            color: #4b5563;
            background-color: #f3f4f6;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .markdown-content {
                font-size: 14px;
            }

            .markdown-content pre {
                padding: 10px;
                font-size: 13px;
            }
        }

        /* Syntax highlighting overrides */
        .markdown-content .hljs {
            background: transparent !important;
        }

        /* Special formatting for AI responses */
        .markdown-content .ai-note {
            background-color: #f0f9ff;
            border-left: 3px solid #38bdf8;
            padding: 12px;
            border-radius: 0 6px 6px 0;
            margin: 1em 0;
        }

        .markdown-content .ai-warning {
            background-color: #fefce8;
            border-left: 3px solid #facc15;
            padding: 12px;
            border-radius: 0 6px 6px 0;
            margin: 1em 0;
        }

        /* For long content that might appear in chat */
        .markdown-content .scrollable-content {
            max-height: 300px;
            overflow-y: auto;
            padding-right: 8px;
        }

        /* Scrollbar styling for code blocks */
        .markdown-content pre::-webkit-scrollbar {
            height: 6px;
        }

        .markdown-content pre::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .markdown-content pre::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .markdown-content pre::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>

<body class="bg-white text-gray-800 font-sans antialiased">
    <main>
        <!-- Main content section -->
        @yield('content')
    </main>

    <!-- Additional scripts -->
    @stack('scripts')
</body>

</html>
