@extends('../layout/base')

@section('body')
    <body class="todo py-5 md:py-0">
        @yield('content')
        @include('../layout/components/dark-mode-switcher')
        @include('../layout/components/main-color-switcher')

        <!-- BEGIN: JS Assets-->
        
        <!-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script> -->
        <script src="dist/js/app.js"></script>
        <script src="dist/js/busqueda.js"></script>
        
        <!-- END: JS Assets-->

        @yield('script')
    </body>
@endsection
