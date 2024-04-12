@extends('../layout/' . $layout)

@section('subhead')
    <title>Busqueda de resultados </title>
 
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
                <div class="my-auto mx-auto  bg-white dark:bg-darkmode-600  px-5 sm:px-8 py-5  rousnded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <?php if (  Auth::user()->puesto =="SUBOPERACI"): ?>
                        <a href="configuracion"><img src="{{ asset('dist/images/conf.png') }}" alt="" height="30" width="30"></a>
                    <?php endif; ?>     
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center">Revisión de Evaluación</h2>
                    <div class="intro-x mt-8">
                        <form action="muestraresultados"  method="POST" >
                        @csrf
                            <select class="intro-x login__input form-control py-3 px-4 block mb-4" name="supervisor" id="supervisor" required>
                            <option value="" selected disabled>SELECCIONE UN DISTRITO</option>
                            <option  value="0" >Todos</option>
                            @foreach ($array as $sup)
                                <option  value="{{ $sup['ID'] }}" > Distrito - {{ $sup['ID'] }}</option>
                            @endforeach
                            </select>
                            <label for="" >
                                MES:
                                <input id="mes" name="mes" type="month" class="intro-x login__input form-control py-3 px-4 block mb-4" placeholder="Fecha" style="text-transform: uppercase;" required>
                            </label>
                    </div>
                    
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button name="iniciar" id="iniciar" type="submit" class="btn btn-primary py-3 px-4 w-full  xl:mr-3 align-top"  tittle="INICIAR">REVISAR</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    

@endsection


            