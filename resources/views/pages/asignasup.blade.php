@extends('../layout/' . $layout)

@section('subhead')
    <title>Asignar supervisor </title>
 
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
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center">Asignación de Supervisor</h2>
                    <div class="intro-x mt-8">
                        <form action="actualizasup"  method="POST" >
                        @csrf
                        @foreach ($distritos as $dis)
                        <div class="preview" style="display: block;">
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">DISTRITO {{$dis['ID']}}</label>
                                        <select class="intro-x login__input form-control py-3 px-4 block" name="d{{$dis['ID']}}" id="d{{$dis['ID']}}" required>
                                        <option value="" selected disabled>SELECCIONE UN SUPERVISOR</option>
                                        @foreach ($supervisor as $t)
                                            <?php if($dis['id_supervisor']==$t['id'] ): ?>
                                            <option  value="{{ $t['id'] }}" selected>DISTRITO {{ $t['id'] }}</option>
                                            <?php endif; ?> 
                                            <?php if($dis['id_supervisor']!=$t['id'] ): ?>
                                            <option  value="{{ $t['id'] }}">DISTRITO {{ $t['id'] }}</option>
                                            <?php endif; ?> 
                                        @endforeach
                                        </select>
                                    </div>
                                
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <input type="text" name="user" id="user"  value="{{Auth::user()->nom_cto }}" style="display: none;">
                        <button onclick="return confirma()" name="iniciar" id="iniciar" type="submit" class="btn btn-primary py-3 px-4 w-full  xl:mr-3 align-top"  tittle="INICIAR">ACTUALIZAR</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <script>
         function confirma(){
        var respuesta=confirm("¿Deseas actualizar los distritos?");
        if(respuesta==true ){
            return true;
        }else{
            return false;
        }
    }
    </script>

@endsection


            