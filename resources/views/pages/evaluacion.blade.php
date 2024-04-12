@extends('../layout/' . $layout)

@section('subhead')
    <title>Iniciar evaluacion </title>
 
    <script src="dist/js/busqueda.js"></script>
@endsection

@section('menumobil')
    @include('../layout/components/mobile-menu')
@endsection

@section('menulateral')
@include('../layout/menu')
@endsection

@section('subhead')
    <title>Dashboard </title>
   
    
@endsection

@section('subcontent')

<div  class="carga" id="carga"></div>  

<div id="contenedor" class="container sm:px-10 py-6">
        <div class="block xl:grid grid-cols-3 gap-4">
        <div class="">
           
           </div>
          
        <div class="">
            <!-- BEGIN: Login Form -->
                <div class="my-auto mx-auto  bg-white dark:bg-darkmode-600  px-5 sm:px-8 py-5  rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                   
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center">Iniciar Evaluación</h2>
                    <div class="intro-x mt-8">
                        <form action="preguntas"  method="POST" >
                        @csrf
                            <select class="intro-x login__input form-control py-3 px-4 block" name="sucursal" id="sucursal" required>
                            <option value="" selected disabled>SELECCIONE UNA SUCURSAL</option>
                            @foreach ($array as $suc)
                                <option  value="{{ $suc['Suc'] }}">{{ $suc['Suc'] }} - {{$suc['NomSuc']}}</option>
                            @endforeach
                            </select>
                            
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button name="iniciar" id="iniciar" type="submit" class="btn btn-primary py-3 px-4 w-full  xl:mr-3 align-top"  tittle="INICIAR">INICIAR</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    

@endsection


            