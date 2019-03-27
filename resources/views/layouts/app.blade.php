<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('common.head')
</head>
<body id="app-layout">
    @include('common.nav')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    
    @if (Session::has('warning'))
        <div class="alert alert-warning">{{ Session::get('warning') }}</div>
    @endif
    
    @if (Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
    @endif
    
    @yield('content')

</body>
</html>
