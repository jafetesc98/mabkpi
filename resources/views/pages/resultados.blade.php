@extends('../layout/' . $layout)

@section('subhead')
    <title>Resultados de evaluacion </title>

@endsection

@section('subcontent')
<div class="">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: Mensaje -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Resultados 
                                </font></font></h2>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-center">
                               
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                    <div class="report-box ">
                                        <div class="box p-5">
                                        <div class="flex">
                                                <div class="">
                                                    <a href="abrirPdf?id={{$id}}&suc= {{$array['SUC']}}  " target="_blank" ><img src="{{ asset('dist/images/pdf.png') }}" width="40" height="40" alt=""></a>
                                                </div>
                                                <div class="ml-auto">
                                                    <div class=" sm:text-2xl text-xl"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Calificación final {{$array1['cali_total']}}%</font></font> </div>
                                                </div>
                                            </div>
                                        <?php if ($array1['cali_total']>=95 ): ?>
                                            <div class="text-3xl font-bold leading-8 mt-6"><img width="350" height="350"  style="margin: auto;"  src="{{ asset('dist/images/like.gif') }}" ></div>
                                            <div class="text-base text-gray-600 mt-1 text-3xl text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TIENDA EN EXELENCIA!!! </font></font></div>
                                            <?php endif; ?>

                                            <?php if ( $array1['cali_total']>=90 && $array1['cali_total']<=94.99 ): ?>
                                            <div class="text-3xl font-bold leading-8 mt-6"><img width="350" height="350"  style="margin: auto;"  src="{{ asset('dist/images/maso.gif') }}" ></div>
                                            <div class="text-base text-gray-600 mt-1 text-3xl text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TIENDA REGULAR!!! </font></font></div>
                                            <?php endif; ?>

                                            <?php if ( $array1['cali_total']>=80 && $array1['cali_total']<=89.99 ): ?>
                                            <div class="text-3xl font-bold leading-8 mt-6"><img width="350" height="350"  style="margin: auto;"  src="{{ asset('dist/images/deslike.gif') }}" ></div>
                                            <div class="text-base text-gray-600 mt-1 text-3xl text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TIENDA DEFICIENTE!!! </font></font></div>
                                            <?php endif; ?>
                                            
                                            <?php if ( $array1['cali_total']<=79.99): ?>
                                            <div class="text-3xl font-bold leading-8 mt-6"><img width="350" height="350"  style="margin: auto;"  src="{{ asset('dist/images/muymal.gif') }}" ></div>
                                            <div class="text-base text-gray-600 mt-1 text-3xl text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TIENDA CRITICA!!! </font></font></div>
                                            <?php endif; ?>
                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END: Mensaje -->

                        <!-- BEGIN: Weekly Top Seller -->
                        <div class="col-span-12 mt-6">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    RESULTADOS DEL CHECK LIST 
                                </font></font></h2>
                                
                            </div>
                            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <table class="table table-report sm:mt-2">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sucursal</font></font></th>
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Seccion</font></font></th>
                                            <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Porcentaje obtenido</font></font></th>
                                            <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Porcentaje por sección</font></font></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($array as $key=>$a)
                                        <?php if ( $key!="SUC" ): ?>
                                        <tr class="intro-x">
                                            <td class="w-40">
                                                <div class="flex">
                                                        {{$array['SUC']}}  
                                                </div>
                                            </td>
                                            <td>
                                                <?php if ( $key!="SUC" ): ?>
                                                    {{$key}}
                                                <?php endif; ?>    
                                            </td>
                                            <td class="text-center">
                                               {{$a}}%
                                            </td>
                                            <td class="text-center">
                                                <?php if ( $key=="VENTAS" ): ?>
                                                    35%
                                                <?php endif; ?> 
                                                <?php if ( $key=="ANALISIS FINANCIERO" ): ?>
                                                    5%
                                                <?php endif; ?>
                                                <?php if ( $key=="RH" ): ?>
                                                    20%
                                                <?php endif; ?>
                                                <?php if ( $key=="EXPERIENCIA" ): ?>
                                                    10%
                                                <?php endif; ?>
                                                <?php if ( $key=="ESTANDARES DE MERCADERIA" ): ?>
                                                    5%
                                                <?php endif; ?>
                                                <?php if ( $key=="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)" ): ?>
                                                    10%
                                                <?php endif; ?>
                                                <?php if ( $key=="PERECEDEROS" ): ?>
                                                    10%
                                                <?php endif; ?>
                                                <?php if ( $key=="CONTABILIDAD" ): ?>
                                                    5%
                                                <?php endif; ?>
                                            </td>
                                        </tr>  
                                        <?php endif; ?>    
                                        @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END: Weekly Top Seller -->
                        
                    </div>
                </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <a href="/mabkpi/"><button name="terminar" id="terminar" type="submit" class="btn btn-primary py-3 px-4 w-full  xl:mr-3 align-top" form="formulario" tittle="TERMINAR">TERMINAR REVISIÓN</button></a>
                    </div>
            </div>

@endsection
