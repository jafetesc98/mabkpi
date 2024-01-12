@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard </title>
    <?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
@endsection

@section('subcontent')
<div>

<div class="py-6" >
    <div class="fila">
    <h2 class="text-lg font-medium mr-auto" style="text-align: center;">KPI'S MINI ABASTOS</h2>
    </div>
</div>

<div  class="p-10" class="carga" id="carga">
<div  class="intro-y grid grid-cols-12 gap-6 sm:gap-3 ">
    @foreach($array as $key=>$a)
    <?php if (Auth::user()->puesto =="DIRECCION"  ): ?>
        <div class="intro-y col-span-6 sm:col-span-2 md:col-span-3 2xl:col-span-2" >
            <a href="{{$key}}"   >
            <div id="{{$key}}" class="file box rounded-md relative zoom-in p-2">
                        <?php if ( $a=="MARGEN MENOR A 4%" ): ?>
                        <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/perdida.png') }}">
                        <?php endif; ?>
                        <?php if ( $a=="ULTIMAS ENTRADAS" ): ?>
                        <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/noigual.png') }}">
                        <?php endif; ?>
                        <?php if ( $a=="CAPAS" ): ?>
                        <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/capa.png') }}">
                        <?php endif; ?>
                        <?php if ( $a=="PRESUPUESTO" ): ?>
                        <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/presup.png') }}">
                        <?php endif; ?>
                        <?php if ( $a=="VENTAS X ART" ): ?>
                        <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/diagrama.png') }}">
                        <?php endif; ?>
                        <?php if ( $a=="AVANCE X SUCURSAL" ): ?>
                        <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/avance.png') }}">
                        <?php endif; ?>

                        <p class="block font-medium mt-4 text-center truncate" name="nombre">{{ $a }}</p>
            </div>  
            </a>
        </div> 
        <?php endif; ?>
        <?php if ( Auth::user()->puesto !="DIRECCION" && $a=="VENTAS X ART" ): ?>
        <div class="intro-y col-span-6 sm:col-span-2 md:col-span-3 2xl:col-span-2">
            <a href="{{$key}}"   >
                <div id="{{$key}}" class="file box rounded-md relative zoom-in p-2">  
                    <?php if ( $a=="VENTAS X ART" ): ?>
                    <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/diagrama.png') }}">
                    <?php endif; ?>
                    <p class="block font-medium mt-4 text-center truncate" name="nombre">{{ $a }}</p>
                </div>  
            </a>
        </div> 
        <?php endif; ?>   
        <?php if ( Auth::user()->puesto !="DIRECCION" && $a=="PRESUPUESTO" ): ?>
        <div class="intro-y col-span-6 sm:col-span-2 md:col-span-3 2xl:col-span-2">
            <a href="{{$key}}"   >
                <div id="{{$key}}" class="file box rounded-md relative zoom-in p-2">  
                    <?php if ( $a=="PRESUPUESTO" ): ?>
                    <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/presup.png') }}">
                    <?php endif; ?>
                    <p class="block font-medium mt-4 text-center truncate" name="nombre">{{ $a }}</p>
                </div>  
            </a>
        </div> 
        <?php endif; ?>   

    @endforeach         
</div>

</div>
</div>
<script src="dist/js/cargando.js"></script>
@endsection
