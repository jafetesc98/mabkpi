@extends('../layout/' . $layout)

@section('head')
    <title>Error en evaluacion</title>
@endsection

@section('content')
    <div class="container">
        <!-- BEGIN: Error Page -->
        <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
            <div class="-intro-x lg:mr-20">
                <img alt="Midone Laravel Admin Dashboard Starter Kit" class="h-48 lg:h-auto" src="{{ asset('dist/images/error-illustration.svg') }}">
            </div>
            <div class="text-white mt-10 lg:mt-0">
                
                <div class="intro-x text-xl lg:text-3xl font-medium">Oops. Aun no es periodo de evaluaciones.</div>
                <div class="intro-x text-lg mt-3">Regresa cuando inicie el tiempo de evaluacion.</div>
                <a href="/mabkpi/"><button class="intro-x btn-primary py-3 px-4  align-top button--lg border border-white mt-10" >Regresar a inicio</button></a>
            </div>
        </div>
        <!-- END: Error Page -->
    </div>

<style>

.todo {
    background-color: rgba(22,78,99) !important;
    }
    
</style>
@endsection