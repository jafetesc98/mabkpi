@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
        <!--menu para moviles-->
        @yield('menumobil')
        <!--menu lateral-->
   
    @include('../layout/components/top-bar')
    
    <div class="flex overflow-hidden">
        <!--menu lateral -->
        @yield('menulateral')
        <!--menu lateral-->
        
        <!-- BEGIN: Content -->
        <div class="content">
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection
