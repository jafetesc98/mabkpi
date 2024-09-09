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
                 <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">Nombre del archivo:</label> <input id="nombre" name="nombre" type="text" class="form-control" placeholder="documentox"> 
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
                                <a href="" class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" class="lucide lucide-file w-4 h-4 mr-2" data-lucide="file"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>Documentos </a>
                                <!-- <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" class="lucide lucide-file w-4 h-4 mr-2" data-lucide="file"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg> Comunicados </a> -->
                            </div>
                        </div>
                        <!-- END: File Manager Menu -->
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
                        <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                            
                            <?php 
                            for($i=0; $i<count($files); $i++){
                                 if($files[$i]!="public/dist/doc\."){
                                    if($files[$i]!="public/dist/doc\.."){
                                echo '<div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">';
                                echo '<div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">';
                                   
                                    echo '<a href="'.$files[$i].'" target="_blank" class="w-3/5 file__icon file__icon--file mx-auto">';
                                        echo '<div class="file__icon__file-name">'. strtoupper(substr($files[$i], -3)).'</div>';
                                    echo '</a>';
                                    
                                    echo '<a href="'.$files[$i].'" class="block font-medium mt-4 text-center truncate">'.trim($files[$i], "public/dist/doc\\").'</a>';
                                    
                                    
                                echo '</div>';
                                echo '</div>';
                                    }
                                }
                            }
                                               
                            ?>
                            </div>
                            
                        <!-- END: Directory & Files -->
                        
                    </div>
                </div>
    </div>
 
@endsection
<script type="text/javascript">
     var array = {{Js::from($files)}};

               
        window.addEventListener("load", function(){
            //console.log(array);
        });
    </script>
