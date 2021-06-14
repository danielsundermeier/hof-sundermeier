<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset ($header)
                <header class="bg-white shadow pt-16">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="@empty ($header) pt-16 @endempty">
                {{ $slot }}
            </main>

            <footer class="w-screen z-10 bg-gray-800 py-3">
                <x-container>
                    <div class="ml-10 flex items-center justify-end space-x-4">
                        <a href="{{ route('legal.impressum.index') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700">Impressum</a>
                    </div>
                </x-container>
            </footer>
            <x-notification :show="(session()->has('status') ? 'true' : 'false')" :message="(session()->has('status') ? session('status')['text'] : '')" />
        </div>
        <script type="text/javascript" defer>
            (function() {
                var route = '{{ route('legal.impressum.index') }}';
                if (!localStorage.getItem('cookieconsent')) {
                    document.body.innerHTML += '\
                    <div class="cookieconsent" style="position:fixed;padding:20px;left:0;bottom:0;background-color: rgba(37, 47, 63);color: rgba(210, 214, 220);text-align:center;width:100%;z-index:99999;">\
                        Diese Website verwendet Cookies. Wenn Du die Website weiterhin nutzt, gehen wir davon aus, dass Du deine Zustimmung gegeben hast. \
                        <a href="' + route + '" style="color: rgba(63, 131, 248);">Datenschutz</a>\
                        <button style="padding: 0.5rem 1rem;line-height: 1.25rem;font-size: 0.875rem;font-weight: 500;align-items: center;display: inline-flex;border-radius: 0.375rem;border-width: 1px;border-color: rgba(210, 214, 220);background-color: rgba(255, 255, 255);color: rgba(107, 114, 128);">Ok</button>\
                    </div>\
                    ';
                    document.querySelector('.cookieconsent button').onclick = function(e) {
                        e.preventDefault();
                        document.querySelector('.cookieconsent').style.display = 'none';
                        localStorage.setItem('cookieconsent', true);
                    };
                }
            })();
        </script>
    </body>
</html>
