<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('/IconMF.png') }}">
        <title>MigleFood</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@100&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Hide scrollbar for Chrome, Safari and Opera */
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
            .no-scrollbar {
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
            }

            /* {{-- for hidden scrollbar --}} */
            ::-webkit-scrollbar {
            width: 10px;
            }
            ::-webkit-scrollbar-track {
            background-color: none;
            border-radius: 10px;
            scrollbar-width: thin;
            }
            ::-webkit-scrollbar-thumb {
            background-color: #eeeeee;
            border-radius: 10px
            }
        </style>

    </head>
    <body class="text-gray-900 pb-[70px]">
        <div class="min-h-screen sm:h-full sm:max-w-md m-auto p-4">

            {{-- Header --}}
            @include('customer.layouts.header')

            {{ $slot }}

        </div>

        {{-- Button Navigator --}}
        <div class="fixed bottom-0 w-full m-auto">
            @include('customer.layouts.btmbar')
        </div>

    </body>
    <script src="https://kit.fontawesome.com/1d72cf6431.js" crossorigin="anonymous"></script>
</html>
