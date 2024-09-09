@extends('../layout/' . $layout)

@section('subhead')
    <title>Asigna sucursales a distritos </title>
 
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

<div class="intro-y block sm:flex items-center md:pt-10">
    <h2 class="text-lg font-medium truncate mr-5">CONFIGURACIÓN DE SUCURSALES</h2>
    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
        <a href="javascript:;"  data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="modal-body"><button class="btn btn-elevated-warning dark:text-slate-300 flex items-center text-slate-600 text-white/70">
            <i data-lucide="menu" class="hidden sm:block w-4 h-4 mr-2"></i> Agregar distrito
        </button></a>
        <a href="javascript:;"  data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview1"><button class="btn btn-elevated-danger dark:text-slate-300 flex items-center text-slate-600 text-white/70">
            <i data-lucide="trash" class="hidden sm:block w-4 h-4 mr-2"></i> Eliminar distrito
        </button></a>
                            
    </div>
 <!-- BEGIN: Modal Content -->
 <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                 <h2 class="font-medium text-base mr-auto">AGREGA DISTRITO</h2> 
             </div> <!-- END: Modal Header -->
             <!-- BEGIN: Modal Body -->
              <form action="agregadistrito"  method="POST" >
                    @csrf
             <div class="modal-body grid  gap-4 gap-y-3">
                 <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">Distrito número</label> 
                 <input id="distr" name="distr" type="number" min="1" pattern="^[0-9]+" class="form-control" placeholder="5" required>
                 <div id="error-dis" class="login__input-error text-danger mt-2"></div> 
                </div>                
             </div> <!-- END: Modal Body -->
             <!-- BEGIN: Modal Footer -->
             <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancelar</button> 
             <button type="submit" id="agregadis" class="btn btn-primary w-20">Agregar</button> 
            </div> <!-- END: Modal Footer -->
            </form>
         </div>
     </div>
 </div> <!-- END: Modal Content -->
 <!-- BEGIN: Modal Content -->
 <div id="header-footer-modal-preview1" class="modal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                 <h2 class="font-medium text-base mr-auto">ELIMINAR DISTRITO</h2> 
             </div> <!-- END: Modal Header -->
             <!-- BEGIN: Modal Body -->
            <form action="eliminadistritos"  method="POST" >
                    @csrf
             <div class="modal-body grid  gap-4 gap-y-3">
                 <div class="col-span-12 sm:col-span-6"> 
                    <label for="modal-form-1" class="form-label">Distrito número</label> 
                    <select class="intro-x login__input form-control py-3 px-4 block" name="zona" id="zona" required>
                            <option value="" selected disabled>SELECCIONE UN DISTRITO</option>
                            @foreach ($dis as $key=>$zona)
                                <option  value="{{ $zona['id'] }}">{{ $zona['id'] }}</option>
                            @endforeach
                            </select>
                </div>                
             </div> <!-- END: Modal Body -->
             <!-- BEGIN: Modal Footer -->
             <div class="modal-footer"> 
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                    <i data-lucide="trash" class="hidden sm:block w-4 h-4 mr-2 "></i>Cancelar</button> 
                <button  type="submit" class="btn btn-danger items-center">
                    <i data-lucide="trash" class="hidden sm:block w-4 h-4 mr-2 "></i> Eliminar 
                </button>
            </div> <!-- END: Modal Footer -->
            </form>
         </div>
     </div>
 </div> <!-- END: Modal Content -->
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    @foreach ($dis as $key=>$distritos)
        <div class="intro-y col-span-12 lg:col-span-6">
             
            <!-- BEGIN: Multiple Select -->
            <div class="intro-y box mt-5 card">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Distrito {{$distritos['id']}} </h2>
                </div>
                <form action="actdistritos"  method="POST" >
                    @csrf
                <div id="multiple-select" class="p-5">
                    <div class="preview">
                        
                        <select name="distrito[]" id="distrito{{$distritos['id']}}" data-placeholder="Selecciona las sucursales que pertenecen a este distrito" class="tom-select w-full" required multiple >
                            @foreach ($tdistritos as $key1=>$dist)
                            
                            @if($dist['ID']==$distritos['id'] )
                            <option value="{{$dist['suc']}}" selected>{{$dist['suc']}} - {{$dist['NomSuc']}}</option>
                            @endif
                             
                            @endforeach 
                            @foreach ($sucursales as $suc)
                            
                            <option value="{{$suc['suc']}}" >{{$suc['suc']}} - {{$suc['des']}}</option>
                           
                            @endforeach 
                        </select>
                           
                    </div>
                </div>
                <input id="dis" name="dis" type="hidden" value="{{$distritos['id']}}" />
                 <div class="centro2"> <button  class="btn btn-sm btn-primary w-24 mr-1 mb-2">Guardar</button></div>
                </form>
            </div>
            <!-- END: Multiple Select -->
             
        </div>
        @endforeach
    </div>

    

<style>
        .card{
         width: 100%;
         height: 100%;
        }
        
</style>


@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
const campoNumerico = document.getElementById('distr');

campoNumerico.addEventListener('keydown', function(evento) {
  const teclaPresionada = evento.key;
  const teclaPresionadaEsUnNumero =
    Number.isInteger(parseInt(teclaPresionada));

  const sePresionoUnaTeclaNoAdmitida = 
    teclaPresionada != 'ArrowDown' &&
    teclaPresionada != 'ArrowUp' &&
    teclaPresionada != 'ArrowLeft' &&
    teclaPresionada != 'ArrowRight' &&
    teclaPresionada != 'Backspace' &&
    teclaPresionada != 'Delete' &&
    teclaPresionada != 'Enter' &&
    !teclaPresionadaEsUnNumero;
  const comienzaPorCero = 
    campoNumerico.value.length === 0 &&
    teclaPresionada == 0;

  if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
    evento.preventDefault(); 
  }

});

distr.oninput = function() {
    const btndis = document.getElementById('agregadis');
    id =document.getElementById("distr").value;
     //console.log("antes de llegar al otro metodo "+id)
     document.getElementById("error-dis").innerHTML = "";
     btndis.disabled = false; 
    actualizaClientes(id);
   
  };
function actualizaClientes(id) {
  //console.log("esto es lo ingresado"+ id);
  const btndis = document.getElementById('agregadis');
  if(id!=""){
    $.ajax(
        {
            url: 'buscadistrito?distrito='+id,               
            data: "",
            contentType: 'json; charset=utf-8',
            type: 'GET',
            success: function (data) {
                //console.log("se ejecuta cada minuto" + data +"\n");
                $(data).each(function (i, row) {   
                    if(id=row['distrito']){
                        document.getElementById("error-dis").innerHTML = "El distrito "+id+" ya existe. Ingrese otro número";
                        btndis.disabled = true; 
                    }
                
                });
            },
        });
  }else{
     document.getElementById("error-dis").innerHTML = "";
     btndis.disabled = false; 
  }
  
}


</script>
@endsection

