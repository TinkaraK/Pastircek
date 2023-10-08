<!DOCTYPE html>
<html lang="sl">
@include('base.head')

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
@include('base.preload')
@auth
    @include('base.sidenav')
@endauth
<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    @auth
        @include("base.topnav")
    @endauth
    <div class="w-full px-6 py-6 mx-auto">
        @yield('content')
    </div>

</main>
@include('base.scripts')
@stack('scripts')
</body>

</html>
