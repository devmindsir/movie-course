@if(empty($noHeader))
    @include('pages.layouts._header')
@endif


@yield('content')

@if(empty($noNav))
    @include('pages.layouts._nav')
@endif
@if(empty($noFooter))
    @include('pages.layouts._footer')
@endif