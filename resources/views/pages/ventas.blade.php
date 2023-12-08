@extends('../layout/' . $layout)

@section('subhead')
    <title>REPORTE DE VENTAS POR ARTICULO  </title>

    <script src="dist/js/busqueda.js"></script>
@endsection

@section('menumobil')
    @include('../layout/components/mobile-menu')
@endsection

@section('menulateral')
@include('../layout/menu')
@endsection

@section('subhead')
    <title>REPORTE DE VENTAS POR ARTICULO  </title>
   
    
@endsection

@section('subcontent')

<div  class="carga" id="carga"></div>  

<div id="contenedor" class="container sm:px-10 py-6">
        <div class="block xl:grid grid-cols-3 gap-4">
        <div class="">
           
           </div>
          
        <div class="">
            <!-- BEGIN: Login Form -->
                <div class="my-auto mx-auto  bg-white dark:bg-darkmode-600  px-5 sm:px-8 py-8  rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center">Reporte de Ventas Por Articulo y Proveedor Comparativo</h2>
                    

                    <div class="intro-x mt-8">
                         <form action="ventasxart"  method="POST" >
                        @csrf
                            <select class="intro-x login__input form-control py-3 px-4 block" name="proveedor" id="proveedor" required>
                            <option value="" selected disabled>SELECCIONE UN PROVEEDOR</option>
                            <option value="t" >TODOS</option>
                            @foreach ($array as $proveedor)
                                <option  value="{{ $proveedor['proveedor'] }}">{{ $proveedor['proveedor'] }} - {{ $proveedor['nom'] }}</option>
                            @endforeach
                            </select>
                            <p class="mt-4">FECHA INICIO: </p>
                            <input id="fecha_ini" name="fecha_ini" type="date" class="intro-x login__input form-control py-3 px-4 block " placeholder="Fecha" style="text-transform: uppercase;" required>

                            <p class="mt-4">FECHA FIN: </p>
                            <input id="fecha_fin" name="fecha_fin" type="date" class="intro-x login__input form-control py-3 px-4 block " placeholder="Fecha" style="text-transform: uppercase;" required>

                            <select class="intro-x login__input form-control py-3 px-4 block mt-4" name="suc" id="suc" required>
                            <option value="" selected disabled>SELECCIONE UNA SUCURSAL</option>
                            @foreach ($array1 as $sucursal)
                                <option  value="{{ $sucursal['suc'] }}">{{ $sucursal['suc'] }} - {{ $sucursal['des'] }}</option>
                            @endforeach
                            </select>
                    </div>
                    
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button name="buscar" id="buscar"  class="btn btn-primary py-3 px-4 w-full  xl:mr-3 align-top"  tittle="BUSCAR">Buscar</button>
                    </div>
                   </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    
<script type="text/javascript">
                var array = {{Js::from($array)}};


                const boton = document.querySelector("#buscar");

                boton.addEventListener("click", function(evento){
                    var proveedor = document.getElementById("proveedor");
                    proveedor = proveedor.options[proveedor.selectedIndex].value;
                    
                    var suc = document.getElementById("suc");
                    suc = suc.options[suc.selectedIndex].value;
                    var fecha_ini = document.getElementById("fecha_ini").value;
                    var fecha_fin = document.getElementById("fecha_fin").value;
                    //console.log(validateDecimal(factor))
                    if(suc == "" && fecha_ini=="" && fecha_fin=="" &&  proveedor=="" || suc == "" || fecha_ini=="" || fecha_fin=="" || proveedor=="" ){
                        console.log("no muestra el load")
                        //console.log(factor)
                    }else {
                        //console.log(validateDecimal(factor))
                        cargando()  
                    }

                    //cargando()
                }); 

        async function cargando() {
            var contenedor = document.getElementById("contenedor");
            contenedor.style.visibility = 'hidden';

            // Loading state
            $('#carga').html('<i id="loader" data-loading-icon="oval" data-color="purple"  class="my-10 w-40 h-40 mx-auto my-8 "></i>');
            //document.getElementById('carga').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
            tailwind.svgLoader()
            await helper.delay(1500)

        }

    function validateDecimal(valor) {
        var RE = /^\d*(\.\d{1})?\d{0,1}$/;
        if (RE.test(valor)) {
            return true;
        } else {
            return false;
        }
    }

    

        
</script>
@endsection

<style>
        .tableFixHead1{
        height: 40%;
        width: 100% / 2;
        left: 100% / 2;
        word-wrap: break-word;
        overflow: auto;
        }
        
</style>

            