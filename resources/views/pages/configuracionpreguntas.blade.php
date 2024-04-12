@extends('../layout/' . $layout)

@section('subhead')
    <title>Configuracion de preguntas </title>
 
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
<div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
               
                <!-- BEGIN: tabla por cada tipo -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center ">
                        <h2 class="text-lg font-medium truncate mr-5">CONFIGURACIÓN DE PREGUNTAS</h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="asignasup"><button class="btn box flex items-center text-slate-600 dark:text-slate-300">
                                <i data-lucide="user" class="hidden sm:block w-4 h-4 mr-2"></i> Asignar Supervisor
                            </button></a>
                            <a href="verpregunta"><button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300">
                                <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Agregar Pregunta
                            </button></a>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report ">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">ID</th>
                                    <th class="whitespace-nowrap">PREGUNTAS</th>
                                    <th class="text-center whitespace-nowrap">TIPO</th>
                                    <th class="text-center whitespace-nowrap">STATUS</th>
                                    <th class="text-center whitespace-nowrap">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($array as $preg)
                               
                                    <tr class="intro-x">
                                        <td class="w-40">{{$preg['id']}} </td>
                                        <td>
                                            <div class=" text-xs whitespace-nowrap mt-0.5">{{ $preg['desPreg'] }}</div>
                                        </td>
                                        <td class="sammy-nowrap-1 text-center">
                                            <?php if($preg['tipo'] =="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)"): ?>
                                                LIMPIEZA Y MANTENIMIENTO
                                            <?php endif; ?> 
                                            <?php if($preg['tipo'] !="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)"): ?>
                                            {{ $preg['tipo'] }}
                                            <?php endif; ?> 
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center {{ $preg['status'][0] ? 'text-success' : 'text-danger' }}">
                                                <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $preg['status'][0] ? 'Activa' : 'Desactiva' }}
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3" href="editarpreg?pregunta={{$preg['id']}}">
                                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                                <a class="flex items-center text-danger" href="eliminapreg?pregunta={{$preg['id']}}&nom={{Auth::user()->nom_cto }}" onclick="return confirma()">
                                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- END: tabla por cada tipo -->
            </div>
        </div>
        
    </div>

    <script>
         function confirma(){
        var respuesta=confirm("¿Deseas eliminar la pregunta?");
        if(respuesta==true ){
            return true;
        }else{
            return false;
        }
    }
    </script>
@endsection


            