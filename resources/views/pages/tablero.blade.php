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
    <div class="intro-y col-span-6 sm:col-span-2 md:col-span-3 2xl:col-span-2">
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
                    <?php if ( $a=="TOTALES" ): ?>
                    <img alt="Midone - HTML Admin Template" class="centro1" src="{{ asset('dist/images/presupuesto.png') }}">
                    <?php endif; ?>

                    <p class="block font-medium mt-4 text-center truncate" name="nombre">{{ $a }}</p>
        </div>  
        </a>
    </div>    
    @endforeach         
</div>

</div>
</div>
<script src="dist/js/cargando.js"></script>
@endsection
