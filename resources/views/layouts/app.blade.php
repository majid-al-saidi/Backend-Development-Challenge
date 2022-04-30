<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ __('panel.site_title') }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    @font-face {
        font-family: "Tajawal";
        src: url({{ asset('fonts/Tajawal-Regular.ttf') }});
    }

    body {
        font-family: "Tajawal", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

</style>


<body class="text-blueGray-700 antialiased">
    <x-app-nav/>
    <main>
        @yield('content')
    </main>
</body>

</html>