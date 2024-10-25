
@if(empty($noHeader))
@include('layouts._header')
@endif

@if(empty($noNav))
@include('layouts._nav')
@endif

@yield('content')

@if(empty($noFooter))
@include('layouts._footer')
@endif