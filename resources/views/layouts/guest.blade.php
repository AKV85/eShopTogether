<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--    <script src="//unpkg.com/alpinejs" defer></script>--}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#adb9f3",
                    },
                },
            },
        };
    </script>
    <title>AKS Design</title>
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
{{--        <div>--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-10 h-10 fill-current text-gray-500"/>--}}
{{--            </a>--}}
{{--        </div>--}}

    <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg ">
        {{ $slot }}
    </div>
</div>

<footer
    class="fixed bottom-0 left-0 w-full flex items-center
    justify-start font-bold bg-laravel text-white h-24 mt-24
     opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; Sukurė Paulina, Anželika ir Andrej &copy; 2023</p><br>
x</footer>
</body>
</html>
