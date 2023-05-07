<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body>
        @include('partials.nav')
        @yield('body')
        @yield('before-script')
        @include('partials.script')
        @yield('after-script')
    </body>
</html>