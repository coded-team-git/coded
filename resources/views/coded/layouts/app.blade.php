<!DOCTYPE html>
<html lang="ar">

@include('coded.components._head')
@stack('styles')

<body>
    @include('coded.components._header')
    @yield('content')


    @include('coded.components._footer')
    @include('coded.components._scripts')
</body>
@yield('script')

</html>
