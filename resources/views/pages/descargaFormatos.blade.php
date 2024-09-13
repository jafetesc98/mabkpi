
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

 <!-- BEGIN: Modal Content -->
 <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
            <form action="subearchivo"  method="POST" enctype="multipart/form-data" >
                    @csrf
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                 <h2 class="font-medium text-base mr-auto">Selecciona archivo</h2>
                
             </div> <!-- END: Modal Header -->
             <!-- BEGIN: Modal Body -->
             <div class="modal-body grid  gap-4 gap-y-3">
                 <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">Archivo:</label> <input id="file" name="file" type="file" class="form-control"> </div>
                 
                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">Nombre de carpeta:</label> 
                        <select class="intro-x login__input form-control py-3 px-4 block" name="carpeta" id="carpeta" required>
                            <option value="" selected disabled>SELECCIONE UNA CARPETA</option>
                            @foreach ($secciones as $sec)
                                <option value="{{$sec['carpeta']}}">{{$sec['nombre']}}</option> 
                            @endforeach 
                         </select>
                    </div>
                
                 <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">Nombre del archivo:</label> <input id="nombre" name="nombre" type="text" class="form-control" placeholder="documentox" required> 
                 <div id="error-dis" class="login__input-error text-success mt-2">Escribir el nombre sin espacios </div> 
                </div>
                 
             </div> <!-- END: Modal Body -->
             <!-- BEGIN: Modal Footer -->
             <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancelar</button> <button type="submit" class="btn btn-primary w-20">Subir</button> </div> <!-- END: Modal Footer -->
         </form>
         </div>
     </div>
 </div> <!-- END: Modal Content -->

<div id="contenedor" class=" py-6">
           
          <div class="grid grid-cols-12 gap-6 mt-8">
                    <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
                        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                            ADMINISTRADOR DE ARCHIVOS
                        </h2>
                        <!-- BEGIN: File Manager Menu -->
                        <div class="intro-y box p-5 mt-6">
                            <div class="mt-1">
                                @foreach ($secciones as $key=>$ubi)
                                    @if($ubi['id']==1)
                                    <button id="btn{{$ubi['id']}}" value="{{$ubi['id']}}" onclick="checkbtn('{{$ubi['id']}}')" name="btn{{$ubi['id']}}" class="selected flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium modal-content"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" class="lucide lucide-file w-4 h-4 mr-2" data-lucide="file">
                                            <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg>{{$ubi['nombre']}} </button>
                                    @endif
                                    @if($ubi['id']!=1)
                                    <button id="btn{{$ubi['id']}}" value="{{$ubi['id']}}" onclick="checkbtn('{{$ubi['id']}}')"  name="btn{{$ubi['id']}}" class="flex items-center px-3 py-2 mt-2 rounded-md modal-content"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" class="lucide lucide-file w-4 h-4 mr-2" data-lucide="file">
                                            <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg> {{$ubi['nombre']}} 
                                    </button> 
                                    @endif
                                
                                @endforeach
                            </div>
                            <?php if (  Auth::user()->puesto =="SUBOPERACI" || Auth::user()->puesto =="OPERACION" || Auth::user()->puesto =="DIRECCION" ): ?>
                                <div class="border-t border-slate-200 dark:border-darkmode-400 mt-4 pt-4">
                                <div class=" fghf w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                                    <div class="flex items-center px-3 py-2 mt-2 rounded-md">
                                         Agrega nueva sección
                                    </div>
                                    <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-tw-placement="bottom-start">
                                        <i class="dropdown-toggle w-4 h-4 cursor-pointer text-slate-500" role="button" aria-expanded="false" data-tw-toggle="dropdown" data-lucide="plus"></i>
                                        <div class=" dropdown-menu pt-2">
                                            <div class="dropdown-content ml-auto">
                                                <div class="">
                                                     <form action="guardadireccion"  method="POST" >
                                                        @csrf
                                                        <div class="">
                                                            <label for="input-filter-1" class="form-label text-xs ml-auto">Sección</label>
                                                            <input id="carpeta" name="carpeta" type="text" class="form-control flex-1 ml-auto" placeholder="Nombre de carpeta" required>
                                                        </div>
                                                        <div class="col-span-12 flex items-center mt-3">
                                                            <button type="submit" class="btn btn-primary w-32 ml-auto">Agregar</button>
                                                        </div>
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                                    <div class="flex items-center px-3 py-2 mt-2 rounded-md">
                                         Elimina sección
                                    </div>
                                    <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-tw-placement="bottom-start">
                                        <i class="dropdown-toggle w-4 h-4 cursor-pointer text-slate-500" role="button" aria-expanded="false" data-tw-toggle="dropdown" data-lucide="trash-2"></i>
                                        <div class="zdfzdf dropdown-menu pt-2" style="width: 2000%;!important">
                                            <div class="dropdown-content ml-auto">
                                                <div class="">
                                                     <form action="eliminacarpeta"  method="POST" >
                                                        @csrf
                                                        <div class="">
                                                            <label for="input-filter-1" class="form-label text-xs ml-auto">Sección</label>
                                                            <select class="intro-x login__input form-control py-3 px-4 block" name="carpeta" id="carpeta" required>
                                                                <option value="" selected disabled>SELECCIONE UNA CARPETA</option>
                                                                @foreach ($secciones as $sec)
                                                                    <option value="{{$sec['carpeta']}}">{{$sec['nombre']}}</option> 
                                                                @endforeach 
                                                            </select>
                                                        </div>
                                                        <div class="col-span-12 flex items-center mt-3">
                                                            <button type="submit" class="btn btn-primary w-32 ml-auto">Eliminar</button>
                                                           
                                                        </div>
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
                        <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                            
                            <div class="w-full sm:w-auto flex">
                               <!-- BEGIN: Modal Toggle -->
                                <?php if (Auth::user()->puesto =="DIRECCION"  || Auth::user()->puesto =="SUBOPERACI" || Auth::user()->puesto=="OPERACION"): ?>
                                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Subir archivo</a> </div> 
                                <?php endif; ?>
                                <!-- END: Modal Toggle -->
                                
                            </div>
                        </div>
                        
                        <!-- BEGIN: Directory & Files -->
                        <div id="files" class=" files intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5 ">
                            
                        </div>
                        <!-- END: Directory & Files -->
                </div>
    </div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

     var sec = {{Js::from($secciones)}};
               
        window.addEventListener("load", function(){
            //console.log(archivos);
             
            agregaarchivo();
            /* const salad = ['?', '?', '?', '?', '?', '?', '?'];
            console.log(salad.length)
            console.log(salad) */
            
        });
        var arch 

        function agregaarchivo(){
            var contenedor = document.getElementById("files");
            var puesto = document.getElementById("puesto").innerHTML;
            //console.log("cuantos archivos son "+archivos.length)
           
            
             for(i=0; i<sec.length; i++){
                item=document.getElementById("btn"+sec[i]['id']);
                var botonselected = item.classList.contains( 'selected' );
                 //console.log(item.value)
                if(botonselected==true){
                    let archivos = [];
                    let ubi = sec[i]['ubicacion'];
                    $.ajax(
                        {
                            url: 'buscadoc?ruta='+sec[i]['ubicacion'],               
                            data: "",
                            contentType: 'json; charset=utf-8',
                            type: 'GET',
                            success: function (data) {
                                //console.log("se ejecuta cada minuto" + data +"\n");
                                //arch = data.slice();
                                //return arch
                                //console.log(arch)
                                $(data).each(function (i, row) {   
                                    archivos.push(data[i]);
                                
                                });
                            
                            for(k=0; k<archivos.length; k++){
                                 
                                if(archivos[k]!=ubi+'/.'){ //servidor productivo
                                    if(archivos[k]!=ubi+'\\.'){ // servidor local
                                    if(archivos[k]!=ubi+'/..'){//servidor productivo
                                        if(archivos[k]!=ubi+'\\..'){ // servidor local
                                            var extension = archivos[k].substring(archivos[k].lastIndexOf(".")+1);
                                            var ruta =  archivos[k]
                                            var doc = archivos[k].substring(archivos[k].lastIndexOf("\\")+1);
                                            console.log(doc)
                                           var div ='<div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">'+
                                                    '<div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">'+
                                                    '<a href="'+ruta+'" target="_blank" class="w-3/5 file__icon file__icon--file mx-auto">'+
                                                    '<div class="file__icon__file-name">'+extension+'</div>'+
                                                    '</a>'+
                                                    '<a href="'+ruta+'" target="_blank" class="block font-medium mt-4 text-center truncate">'+doc+'</a>'
                                                    if(puesto=='DIRECCION' || puesto =='SUBOPERACI' || puesto=='OPERACION'){
                                                        //console.log(puesto)
                                                    div =div+'<div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">'+
                                                                '<a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">'+
                                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-vertical" data-lucide="more-vertical" class="lucide lucide-more-vertical w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>'+
                                                                '</a>'+
                                                                '<div class="dropdown-menu w-40" id="_ca37qrbz7" style="width: 160px; position: absolute; inset: auto 0px 0px auto; margin: 0px; transform: translate(-641px, 330px);" data-popper-placement="top-end" data-popper-reference-hidden="" data-popper-escaped="">'+
                                                                    '<ul class="dropdown-content">'+
                                                                        '<li>'+
                                                                            '<a href="deleteFiles?nombre='+ruta+'" class="dropdown-item">'+
                                                                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash" data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path></svg> Eiminar'+
                                                                            '</a>'+
                                                                        '</li>'+
                                                                    '</ul>'+
                                                                '</div>'+
                                                            '</div>'

                                                    }
                                                

                                                    div =div+
                                                    '</div>'+
                                                    '</div>'
                                                    /*var div_nuevo = document.createTextNode(MiDiv);
                                                    var c = document.getElementById("files").appendChild(div_nuevo);
                                                    console.log(c)*/
                                                    divParent = document.getElementById('files');
                                                    divParent.innerHTML += div
                                            
                                        }
                                        
                                    }
                                    }
                                }
                            
                            } 
                            },
                            });
                           
                }
                
            } 

            
            
        }
                


function checkbtn(dato){
    //console.log("se dio click " + dato)
    
    document.getElementById('files').innerHTML = '';
    //console.log(sec.length)
    let status=false;
    for(i=0; i<sec.length; i++){
        //console.log(sec[i]['id']+ " / " + dato)
        let btn=document.getElementById("btn"+sec[i]['id']);
            btn.classList.remove('bg-primary');
            btn.classList.remove('selected');
            btn.classList.remove('text-white');
        if(sec[i]['id']==dato){
           //console.log(sec[i]['id']+ " entra condicion " + dato)
            btn.classList.add('bg-primary');
            btn.classList.add('selected');
            btn.classList.add('text-white');
            status=true;
            
        }
        
        
    }
    if(status==true){
        agregaarchivo();
    }

    /*let modal = document.getElementById(dato);
    console.log(modal)
     let carouselItem = document.querySelector(".carousel-item.active");
    carouselItem.classList.remove('active');
    modal.style.display = "none";   */
    
}



</script>

@endsection
