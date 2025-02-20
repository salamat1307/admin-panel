<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/images/favicon.png" type="image/png">
        <link rel="icon" href="/images/apple-touch-icon-57x57.png" type="image/png" sizes="57x57">
        <link rel="icon" href="/images/apple-touch-icon-72x72.png" type="image/png" sizes="72x72">
        <link rel="icon" href="/images/apple-touch-icon-76x76.png" type="image/png" sizes="76x76">
        <link rel="icon" href="/images/apple-touch-icon-114x114.png" type="image/png" sizes="114x114">
        <link rel="icon" href="/images/apple-touch-icon-120x120.png" type="image/png" sizes="120x120">
        <link rel="icon" href="/images/apple-touch-icon-144x144.png" type="image/png" sizes="144x144">
        <link rel="icon" href="/images/apple-touch-icon-152x152.png" type="image/png" sizes="152x152">
        <link rel="icon" href="/images/apple-touch-icon-180x180.png" type="image/png" sizes="180x180">
        <link rel="icon" href="/images/apple-touch-icon.png" type="image/png">
        <title inertia>{{ config('app.name', 'ESYS') }}</title>        
        <!-- Fonts -->    
        <link href="https://fonts.cdnfonts.com/css/lato" rel="stylesheet">
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const savedDarkMode = localStorage.getItem('darkTheme') === 'true'
                document.documentElement.classList.toggle('app-dark', savedDarkMode)
            });
        </script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
