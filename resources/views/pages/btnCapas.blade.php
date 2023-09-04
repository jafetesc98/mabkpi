@extends('../layout/' . $layout)

@section('subhead')
    <title>Reporte de capas </title>
    
@endsection

@section('menumobil')
    @include('../layout/components/mobile-menu')
@endsection

@section('menulateral')
@include('../layout/menu')
@endsection
@section('subcontent')

<link rel="stylesheet" href="dist/css/cargando.css">

<div>

<div class="py-6" >
    <div class="fila">
    <h2 class="text-lg font-medium mr-auto" style="text-align: center;">MENÚ DE CAPAS </h2>
    </div>
</div>
<div id="contenedor_carga">
    <div id="carga"></div>
</div>

<div  class="p-10" class="" id="">
<div  class="intro-y grid grid-cols-6 gap-4">

    @foreach($array as $key=>$a1)
    
    <div class="intro-y col-start-1 col-end-7">
        <a href="capas?num={{ $a1['Capa'] }}"  onclick="muestraLoad()" >
        <div id="" class="file box rounded-md relative zoom-in p-2" >

        <?php if ( $a1['Capa']=="1" ): ?>
        <div class="grid grid-cols-3 gap-4">
        <div  class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">CAPA {{$a1['Capa']}}</p> </div>
        <div id="valor{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Valor inventario <br>$ {{ $a1['ValInv'] }} </p></div>
        <div id="tArt{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Total de articulos <br> {{ $a1['TotalArt'] }}</p> </div>
        </div>
        <?php endif; ?>

        <?php if ( $a1['Capa']=="2" ): ?>
        <div class="grid grid-cols-3 gap-4">
        <div class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">CAPA {{ $a1['Capa'] }}</p> </div>
        <div id="valor{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Valor inventario <br> $ {{ $a1['ValInv'] }}</p></div>
        <div id="tArt{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Total de articulos <br> {{ $a1['TotalArt'] }}</p> </div>
        </div>
        <?php endif; ?>

        <?php if ( $a1['Capa']=="3" ): ?>
        <div class="grid grid-cols-3 gap-4">
        <div class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">CAPA {{ $a1['Capa'] }}</p> </div>
        <div id="valor{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Valor inventario <br> $ {{ $a1['ValInv'] }}</p></div>
        <div id="tArt{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Total de articulos <br> {{ $a1['TotalArt'] }}</p> </div>
        </div>
        <?php endif; ?>
       
        <?php if ( $a1['Capa']=="4" ): ?>
        <div class="grid grid-cols-3 gap-4">
        <div class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">CAPA {{ $a1['Capa'] }}</p> </div>
        <div id="valor{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Valor inventario <br> $ {{ $a1['ValInv'] }}</p></div>
        <div id="tArt{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Total de articulos <br> {{ $a1['TotalArt'] }}</p> </div>
        </div>
        <?php endif; ?>

        <?php if ( $a1['Capa']=="5" ): ?>
        <div class="grid grid-cols-3 gap-4">
        <div class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">CAPA {{ $a1['Capa'] }}</p> </div>
        <div id="valor{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Valor inventario <br>$ {{ $a1['ValInv'] }}</p></div>
        <div id="tArt{{$a1['Capa']}}" class="..."><p class="block font-medium mt-4 text-center truncate" name="nombre">Total de articulos <br> {{ $a1['TotalArt'] }}</p> </div>
        </div>
        <?php endif; ?>
                   
        </div>  
        </a>
    </div>    
   
    @endforeach         
</div>

</div>
</div>


<script type="text/javascript">
        var array = {{Js::from($array)}};
        console.log(array)
        window.addEventListener("load", function(e){
            ocultaLoad();

        });

        function separar(){
            let valor1=document.getElementById("valor1").innerHTML;
            document.getElementById("valor1").innerHTML =separator(valor1);

            let valor2=document.getElementById("valor2").innerHTML;
            document.getElementById("valor2").innerHTML =separator(valor2);

            let valor3=document.getElementById("valor3").innerHTML;
            document.getElementById("valor3").innerHTML =separator(valor3);

            let valor4=document.getElementById("valor4").innerHTML;
            document.getElementById("valor4").innerHTML =separator(valor4);

            let valor5=document.getElementById("valor5").innerHTML;
            document.getElementById("valor5").innerHTML =separator(valor5);


            //aqui empieza el total de articulos
            let tArt1=document.getElementById("tArt1").innerHTML;
            document.getElementById("tArt1").innerHTML =separator(tArt1);

            let tArt2=document.getElementById("tArt2").innerHTML;
            document.getElementById("tArt2").innerHTML =separator(tArt2);

            let tArt3=document.getElementById("tArt3").innerHTML;
            document.getElementById("tArt3").innerHTML =separator(tArt3);

            let tArt4=document.getElementById("tArt4").innerHTML;
            document.getElementById("tArt4").innerHTML =separator(tArt4);

            let tArt5=document.getElementById("tArt5").innerHTML;
            document.getElementById("tArt5").innerHTML =separator(tArt5);


        }
        function muestraLoad()
        {
            var contenedor = document.getElementById("contenedor_carga");
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '1';
        }
        function ocultaLoad(){
            var contenedor = document.getElementById("contenedor_carga");
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            $('.load').attr("estado","0")
        }
        
function separator(numb) {
    var str = numb.toString().split(".");
    str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return str.join(".");
}

</script>
@endsection
