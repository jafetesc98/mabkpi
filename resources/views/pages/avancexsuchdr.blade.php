@extends('../layout/' . $layout)

@section('subhead')
    <title>Presupuesto de sucursales </title>
 
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
                <div class="my-auto mx-auto  bg-white dark:bg-darkmode-600  px-5 sm:px-8 py-8  rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center">Reporte de Avance de Ventas Por Sucursal</h2>
                    

                    <div class="intro-x mt-8">
                        <form action="avancexsuc"  method="POST" >
                        @csrf
                            <select class="intro-x login__input form-control py-3 px-4 block" name="zona" id="zona" required>
                            <option value="" selected disabled>SELECCIONE UNA ZONA</option>
                            @foreach ($array as $zona)
                                <option  value="{{ $zona['des'] }}">{{ $zona['des'] }}</option>
                            @endforeach
                            </select>

                            <br>
                            <select class="intro-x login__input form-control py-3 px-4 block" name="fecha" id="fecha" required>
                            <option value="" selected disabled>SELECCIONE UNA FECHA</option>
                            @foreach ($array1 as $fecha)
                                <option  value="{{ $fecha['fecha'] }}">{{ $fecha['fecha'] }}</option>
                            @endforeach
                            </select>
                            
                    </div>
                    
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button name="buscar" id="buscar" type="submit" class="btn btn-primary py-3 px-4 w-full  xl:mr-3 align-top"  tittle="BUSCAR">Buscar</button>
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
            
            var suc = document.getElementById("sucursal");
             suc = suc.options[suc.selectedIndex].value;
            var fecha = document.getElementById("fecha").value;
            var factor = document.getElementById("factor").value;
            //console.log(validateDecimal(factor))
            if(suc == "" && fecha=="" && factor=="" || suc == "" || fecha=="" || factor==""){
                console.log("no muestra el load")
                console.log(factor)
            }else if(validateDecimal(factor)==true){
                console.log(validateDecimal(factor))
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

            