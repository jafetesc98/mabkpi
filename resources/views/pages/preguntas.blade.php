@extends('../layout/' . $layout)

@section('subhead')
    <title>Check list </title>
 
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

<form action="resultados"  method="POST" id="formulario" >
@csrf
<div class="intro-y grid grid-cols-12 gap-6 mt-5">
    <div class="col-span-12 lg:col-span-6">
        <!--aqui comienza el div del primer cuadro -->
        <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        VENTAS
                    </font></font></h2>
                </div>
                <div class="p-5">
                @foreach ($array as $preg)
            
                <?php if ( $preg['tipo']=="VENTAS" ): ?> 
                <div class="rounded-md px-5 py-4 mb-2 border text-gray-700"> 
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $preg['desPreg'] }}</font></font>
                
                    <div class="form-group pt-4" style="width: 170px; margin: auto; justify-content: center;" >
                            <label class="ml-8">
                                SI
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="1" required>
                            </label>
                            <label class="mx-6">
                                NO
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="0" required>
                            </label>
                    </div>
                </div>
                <?php endif; ?>   
                    @endforeach
                </div>
        </div>
        <!--aqui acava el div del primer cuadro -->

        <!--aqui comienza el div del segundo cuadro -->
        <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    ANALISIS FINANCIERO
                    </font></font></h2>
                </div>
                <div class="p-5">
                @foreach ($array as $preg)
            
                <?php if ( $preg['tipo']=="ANALISIS FINANCIERO" ): ?> 
                <div class="rounded-md px-5 py-4 mb-2 border text-gray-700"> 
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $preg['desPreg'] }}</font></font>
                
                    <div class="form-group pt-4" style="width: 170px; margin: auto; justify-content: center;" >
                            <label class="ml-8">
                                SI
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="1" required>
                            </label>
                            <label class="mx-6">
                                NO
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="0" required>
                            </label>
                    </div>
                </div>
                <?php endif; ?>   
                    @endforeach
                </div>

        </div>
        <!--aqui acava el div del primer cuadro -->

        <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        RH
                    </font></font></h2>
                </div>
                <div class="p-5">
                @foreach ($array as $preg)
            
                <?php if ( $preg['tipo']=="RH" ): ?> 
                <div class="rounded-md px-5 py-4 mb-2 border text-gray-700"> 
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $preg['desPreg'] }}</font></font>
                
                    <div class="form-group pt-4" style="width: 170px; margin: auto; justify-content: center;" >
                            <label class="ml-8">
                                SI
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="1" required>
                            </label>
                            <label class="mx-6">
                                NO
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="0" required>
                            </label>
                    </div>
                </div>
                <?php endif; ?>   
                    @endforeach
                </div>

        </div>
        <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Experiencia
                    </font></font></h2>
                </div>
                <div class="p-5">
                @foreach ($array as $preg)
            
                <?php if ( $preg['tipo']=="EXPERIENCIA" ): ?> 
                <div class="rounded-md px-5 py-4 mb-2 border text-gray-700"> 
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $preg['desPreg'] }}</font></font>
                
                    <div class="form-group pt-4" style="width: 170px; margin: auto; justify-content: center;" > 
                            <label class="ml-8">
                                SI
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="1" required>
                            </label>
                            <label class="mx-6">
                                NO
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="0" required>
                            </label>
                    </div>
                </div>
                <?php endif; ?>   
                    @endforeach
                </div>

        </div>

    </div>


    <div class="col-span-12 lg:col-span-6">
        <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Estàndares en mercaderia
                    </font></font></h2>
                </div>
                <div class="p-5">
                @foreach ($array as $preg)
            
                <?php if ( $preg['tipo']=="ESTANDARES DE MERCADERIA" ): ?> 
                <div class="rounded-md px-5 py-4 mb-2 border text-gray-700"> 
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $preg['desPreg'] }}</font></font>
                
                    <div class="form-group pt-4" style="width: 170px; margin: auto; justify-content: center;" >
                            <label class="ml-8">
                                SI
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="1" required>
                            </label>
                            <label class="mx-6">
                                NO
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="0" required>
                            </label>
                    </div>
                </div>
                <?php endif; ?>   
                    @endforeach
                </div>
        </div>
        <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Limpieza y mantenimiento de la unidad (interior y exterior)
                    </font></font></h2>
                </div>
                <div class="p-5">
                @foreach ($array as $preg)
            
                <?php if ( $preg['tipo']=="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)" ): ?> 
                <div class="rounded-md px-5 py-4 mb-2 border text-gray-700"> 
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $preg['desPreg'] }}</font></font>
                
                    <div class="form-group pt-4" style="width: 170px; margin: auto; justify-content: center;" >
                            <label class="ml-8">
                                SI
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="1" required>
                            </label>
                            <label class="mx-6">
                                NO
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="0" required>
                            </label>
                    </div>
                </div>
                <?php endif; ?>   
                    @endforeach
                </div>
        </div>
        <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Perecederos
                    </font></font></h2>
                </div>
                <div class="p-5">
                @foreach ($array as $preg)
            
                <?php if ( $preg['tipo']=="PERECEDEROS" ): ?> 
                <div class="rounded-md px-5 py-4 mb-2 border text-gray-700"> 
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $preg['desPreg'] }}</font></font>
                
                    <div class="form-group pt-4" style="width: 170px; margin: auto; justify-content: center;" >
                            <label class="ml-8">
                                SI
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="1" required>
                            </label>
                            <label class="mx-6">
                                NO
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="0" required>
                            </label>
                    </div>
                </div>
                <?php endif; ?>   
                    @endforeach
                </div>
        </div>
        <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Contabilidad
                    </font></font></h2>
                </div>
                <div class="p-5">
                @foreach ($array as $preg)
            
                <?php if ( $preg['tipo']=="CONTABILIDAD" ): ?> 
                <div class="rounded-md px-5 py-4 mb-2 border text-gray-700"> 
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $preg['desPreg'] }}</font></font>
                
                    <div class="form-group pt-4" style="width: 170px; margin: auto; justify-content: center;" >
                            <label class="ml-8">
                                SI
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="1" required>
                            </label>
                            <label class="mx-6">
                                NO
                            <input type="radio" name="pregunta{{ $preg['id'] }}" value="0" required>
                            </label>
                    </div>
                </div>
                <?php endif; ?>   
                    @endforeach
                </div>
        </div>
<!-- comentarios -->
        <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Comentarios
                    </font></font></h2>
                </div>
                <div class="p-5">
                <textarea id="comentarios" name="comentarios" class="form-control" rows="5" maxlength="999" style="text-transform: uppercase; resize:none;" ></textarea>
                </div>
        </div>
    </div>

</div> 

        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
            <input type="text" name="puesto" id="puesto"  value="{{Auth::user()->puesto }}" style="display: none;">
            <input type="text" name="usuario" id="usuario"  value="{{Auth::user()->nombre_lar }}" style="display: none;">
            <input type="text" name="suc" id="suc"  value="{{$suc}}" style="display: none;">
            <button name="terminar" id="terminar" type="submit" class="btn btn-primary py-3 px-4 w-full  xl:mr-3 align-top" form="formulario" tittle="TERMINAR">TERMINAR</button>
        </div>

</form>
@endsection


            