@extends('../layout/' . $layout)

@section('subhead')
    <title>Resultados finales </title>

@endsection

@section('subcontent')
<div class="">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: Mensaje -->
                        <div class="col-span-12 mt-8 flex">
                           
                            <div class="intro-y flex items-center col-span-6 ">
                                <h2 class="text-lg font-medium truncate mr-5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    RESULTADOS GLOBALES
                                </font></font></h2>
                                </div>
                                <div class="intro-y flex items-center col-span-6 md:ml-auto">
                               
                                </div>
                                <div class="intro-y flex items-center col-span-6 ">
                                <a href="pdfglobal?f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank"><button class="btn btn-danger mb-2">
                                Exportar PDF
                                </button></a>
                            </div>
                        </div>
                        <!-- END: Mensaje -->

                        <!-- BEGIN: Weekly Top Seller -->
                        <div class="col-span-12 mt-2">
                            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                @foreach($array as $key=>$distritos)
                                <table class="table table-report sm:mt-2">
                                    <thead>
                                        <tr>
                                            <?php if ( $key=="dis1" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 1</font></font></th>
                                            @foreach ($dis1 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 2</font></font></th>
                                            @foreach ($dis2 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 3</font></font></th>
                                            @foreach ($dis3 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 4</font></font></th>
                                            @foreach ($dis4 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 5</font></font></th>
                                            @foreach ($dis5 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 6</font></font></th>
                                            @foreach ($dis6 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 7</font></font></th>
                                            @foreach ($dis7 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 8</font></font></th>
                                            @foreach ($dis8 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 9</font></font></th>
                                            @foreach ($dis9 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 10</font></font></th>
                                            @foreach ($dis10 as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="imprimepdf?distrito={{$suc['ID']}}&suc={{$suc['Suc']}}&f_ini={{$fechas['f_ini']}}&f_fin={{$fechas['f_fin']}}" target="_blank">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</a></font></font></th>
                                            @endforeach
                                            <?php endif; ?>   

                                            <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PROMEDIO</font></font></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="intro-x">
                                            <td >
                                            1RA EVALUACIÓN
                                            </td>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <?php 
                                                $valorC=count($dis1);
                                                for($i=0; $i<count($dis1); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis1[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d1e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d1e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d1p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                                <?php 
                                                $valorC=count($dis2);
                                                for($i=0; $i<count($dis2); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis2[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d2e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d2e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d2p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                                <?php 
                                                $valorC=count($dis3);
                                                for($i=0; $i<count($dis3); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis3[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d3e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d3e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d3p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                                <?php 
                                                $valorC=count($dis4);
                                                for($i=0; $i<count($dis4); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis4[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d4e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d4e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d4p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                                <?php 
                                                $valorC=count($dis5);
                                                for($i=0; $i<count($dis5); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis5[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d5e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d5e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d5p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                                <?php 
                                                $valorC=count($dis6);
                                                for($i=0; $i<count($dis6); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis6[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d6e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d6e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d6p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                                <?php 
                                                $valorC=count($dis7);
                                                for($i=0; $i<count($dis7); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis7[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d7e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d7e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d7p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                                <?php 
                                                $valorC=count($dis8);
                                                for($i=0; $i<count($dis8); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis8[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d8e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d8e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d8p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                                <?php 
                                                $valorC=count($dis9);
                                                for($i=0; $i<count($dis9); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis9[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d9e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d9e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d9p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                                <?php 
                                                $valorC=count($dis10);
                                                for($i=0; $i<count($dis10); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis10[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d10e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d10e1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d10p1" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>  

                                            

                                        </tr>  
                                        <tr class="intro-x">
                                            <td >
                                            2DA EVALUACIÓN
                                            </td>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <?php 
                                                $valorC=count($dis1);
                                                for($i=0; $i<count($dis1); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis1[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d1e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d1e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d1p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                                <?php 
                                                $valorC=count($dis2);
                                                for($i=0; $i<count($dis2); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis2[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d2e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d2e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d2p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                                <?php 
                                                $valorC=count($dis3);
                                                for($i=0; $i<count($dis3); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis3[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d3e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d3e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d3p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                                <?php 
                                                $valorC=count($dis4);
                                                for($i=0; $i<count($dis4); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis4[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d4e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d4e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d4p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                                <?php 
                                                $valorC=count($dis5);
                                                for($i=0; $i<count($dis5); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis5[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d5e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d5e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d5p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                                <?php 
                                                $valorC=count($dis6);
                                                for($i=0; $i<count($dis6); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis6[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d6e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d6e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d6p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                                <?php 
                                                $valorC=count($dis7);
                                                for($i=0; $i<count($dis7); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis7[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d7e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d7e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d7p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                                <?php 
                                                $valorC=count($dis8);
                                                for($i=0; $i<count($dis8); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis8[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d8e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d8e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d8p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                                <?php 
                                                $valorC=count($dis9);
                                                for($i=0; $i<count($dis9); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis9[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d9e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d9e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d9p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                                <?php 
                                                $valorC=count($dis10);
                                                for($i=0; $i<count($dis10); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis10[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d10e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d10e2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d10p2" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            
                                           
                                        </tr>  
                                        <tr class="intro-x">
                                            <td   >
                                            TOTAL POR TIENDA
                                            </td>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis1); $i++){
                                                    echo  '<td id="d1suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d1p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis2); $i++){
                                                    echo  '<td id="d2suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d2p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis3); $i++){
                                                    echo  '<td id="d3suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d3p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis4); $i++){
                                                    echo  '<td id="d4suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d4p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis5); $i++){
                                                    echo  '<td id="d5suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d5p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis6); $i++){
                                                    echo  '<td id="d6suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d6p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis7); $i++){
                                                    echo  '<td id="d7suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d7p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis8); $i++){
                                                    echo  '<td id="d8suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d8p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis9); $i++){
                                                    echo  '<td id="d9suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d9p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                                <?php 
                                                for($i=0; $i<count($dis10); $i++){
                                                    echo  '<td id="d10suc'.$i.'" class="text-center">  </td>';
                                                }
                                                echo  '<td id="d10p3" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   

                                            
                                        </tr>  
                                        <tr class="intro-x">
                                            <td class=>
                                            JEFE SUPERVISOR
                                            </td>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <?php 
                                                $valorC=count($dis1);
                                                for($i=0; $i<count($dis1); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis1[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d1s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d1s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d1jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                                <?php 
                                                $valorC=count($dis2);
                                                for($i=0; $i<count($dis2); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis2[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d2s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d2s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d2jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                                <?php 
                                                $valorC=count($dis3);
                                                for($i=0; $i<count($dis3); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis3[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d3s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d3s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d3jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                                <?php 
                                                $valorC=count($dis4);
                                                for($i=0; $i<count($dis4); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis4[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d4s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d4s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d4jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                                <?php 
                                                $valorC=count($dis5);
                                                for($i=0; $i<count($dis5); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis5[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d5s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d5s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d5jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                                <?php 
                                                $valorC=count($dis6);
                                                for($i=0; $i<count($dis6); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis6[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d6s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d6s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d6jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                                <?php 
                                                $valorC=count($dis7);
                                                for($i=0; $i<count($dis7); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis7[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d7s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d7s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d7jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                                <?php 
                                                $valorC=count($dis8);
                                                for($i=0; $i<count($dis8); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis8[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d8s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d8s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d8jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                                <?php 
                                                $valorC=count($dis9);
                                                for($i=0; $i<count($dis9); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis9[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d9s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d9s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d9jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                                <?php 
                                                $valorC=count($dis10);
                                                for($i=0; $i<count($dis10); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis10[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                            echo  '<td id="d10s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </td>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<td id="d10s'.$i.'" class="text-center"> 0 </td>';
                                                    }
                                                }
                                                echo  '<td id="d10jefe" class="text-center"> </td>';
                                                ?>
                                            <?php endif; ?>   
                                            
                                        </tr>  

                                        <tr>
                                            <td  colspan="11" class="text-center">
                                            <h2 class="text-lg font-medium truncate mr-5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                
                                            </font></font></h2>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                @endforeach
                            </div>
                        </div>
                        <!-- END: Weekly Top Seller -->
                        
                    </div>
                </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <a href="/mabkpi/"><button name="terminar" id="terminar" type="submit" class="btn btn-primary py-3 px-4 w-full  xl:mr-3 align-top" form="formulario" tittle="TERMINAR">TERMINAR REVISIÓN</button></a>
                    </div>
            </div>

            
<script type="text/javascript">
                var dis1 = {{Js::from($dis1)}};
                var dis2 = {{Js::from($dis2)}};
                var dis3 = {{Js::from($dis3)}};
                var dis4 = {{Js::from($dis4)}};
                var dis5 = {{Js::from($dis5)}};
                var dis6 = {{Js::from($dis6)}};
                var dis7 = {{Js::from($dis7)}};
                var dis8 = {{Js::from($dis8)}};
                var dis9 = {{Js::from($dis9)}};
                var dis10 = {{Js::from($dis10)}};

            window.addEventListener("load", function(){
            
            sumaTotales();
            promedio1();
            promedio2();
            promedio3();
            promedio4();
            promediofinal();

        });


            function sumaTotales(){
                for(let i=0; i<dis1.length; i++){
                    document.getElementById("d1suc"+i).innerHTML= ((Number(document.getElementById("d1e1s"+i).innerHTML) +Number(document.getElementById("d1e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis2.length; i++){
                    document.getElementById("d2suc"+i).innerHTML= ((Number(document.getElementById("d2e1s"+i).innerHTML) +Number(document.getElementById("d2e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis3.length; i++){
                    document.getElementById("d3suc"+i).innerHTML= ((Number(document.getElementById("d3e1s"+i).innerHTML) +Number(document.getElementById("d3e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis4.length; i++){
                    document.getElementById("d4suc"+i).innerHTML= ((Number(document.getElementById("d4e1s"+i).innerHTML) +Number(document.getElementById("d4e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis5.length; i++){
                    document.getElementById("d5suc"+i).innerHTML= ((Number(document.getElementById("d5e1s"+i).innerHTML) +Number(document.getElementById("d5e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis6.length; i++){
                    document.getElementById("d6suc"+i).innerHTML= ((Number(document.getElementById("d6e1s"+i).innerHTML) +Number(document.getElementById("d6e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis7.length; i++){
                    document.getElementById("d7suc"+i).innerHTML= ((Number(document.getElementById("d7e1s"+i).innerHTML) +Number(document.getElementById("d7e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis8.length; i++){
                    document.getElementById("d8suc"+i).innerHTML= ((Number(document.getElementById("d8e1s"+i).innerHTML) +Number(document.getElementById("d8e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis9.length; i++){
                    document.getElementById("d9suc"+i).innerHTML= ((Number(document.getElementById("d9e1s"+i).innerHTML) +Number(document.getElementById("d9e2s"+i).innerHTML))/2).toFixed(2);
                }
                for(let i=0; i<dis10.length; i++){
                    document.getElementById("d10suc"+i).innerHTML= ((Number(document.getElementById("d10e1s"+i).innerHTML) +Number(document.getElementById("d10e2s"+i).innerHTML))/2).toFixed(2);
                }

            }

            function promedio1(){
                let prom1=0;
                for(let i=0; i<dis1.length; i++){
                   prom1 +=Number(document.getElementById("d1e1s"+i).innerHTML);
                }
                document.getElementById("d1p1").innerHTML=(prom1/dis1.length).toFixed(2);

                let prom2=0;
                for(let i=0; i<dis2.length; i++){
                   prom2 +=Number(document.getElementById("d2e1s"+i).innerHTML);
                }
                document.getElementById("d2p1").innerHTML=(prom2/dis2.length).toFixed(2);

                let prom3=0;
                for(let i=0; i<dis3.length; i++){
                   prom3 +=Number(document.getElementById("d3e1s"+i).innerHTML);
                }
                document.getElementById("d3p1").innerHTML=(prom3/dis3.length).toFixed(2);

                let prom4=0;
                for(let i=0; i<dis4.length; i++){
                   prom4 +=Number(document.getElementById("d4e1s"+i).innerHTML);
                }
                document.getElementById("d4p1").innerHTML=(prom4/dis4.length).toFixed(2);

                let prom5=0;
                for(let i=0; i<dis5.length; i++){
                   prom5 +=Number(document.getElementById("d5e1s"+i).innerHTML);
                }
                document.getElementById("d5p1").innerHTML=(prom5/dis5.length).toFixed(2);

                let prom6=0;
                for(let i=0; i<dis6.length; i++){
                   prom6 +=Number(document.getElementById("d6e1s"+i).innerHTML);
                }
                document.getElementById("d6p1").innerHTML=(prom6/dis6.length).toFixed(2);

                let prom7=0;
                for(let i=0; i<dis7.length; i++){
                   prom7 +=Number(document.getElementById("d7e1s"+i).innerHTML);
                }
                document.getElementById("d7p1").innerHTML=(prom7/dis7.length).toFixed(2);

                let prom8=0;
                for(let i=0; i<dis8.length; i++){
                   prom8 +=Number(document.getElementById("d8e1s"+i).innerHTML);
                }
                document.getElementById("d8p1").innerHTML=(prom8/dis8.length).toFixed(2);

                let prom9=0;
                for(let i=0; i<dis9.length; i++){
                   prom9 +=Number(document.getElementById("d9e1s"+i).innerHTML);
                }
                document.getElementById("d9p1").innerHTML=(prom9/dis9.length).toFixed(2);

                let prom10=0;
                for(let i=0; i<dis10.length; i++){
                   prom10 +=Number(document.getElementById("d10e1s"+i).innerHTML);
                }
                document.getElementById("d10p1").innerHTML=(prom10/dis10.length).toFixed(2);

            }

            function promedio2(){
                let prom1=0;
                for(let i=0; i<dis1.length; i++){
                   prom1 +=Number(document.getElementById("d1e2s"+i).innerHTML);
                }
                document.getElementById("d1p2").innerHTML=(prom1/dis1.length).toFixed(2);

                let prom2=0;
                for(let i=0; i<dis2.length; i++){
                   prom2 +=Number(document.getElementById("d2e2s"+i).innerHTML);
                }
                document.getElementById("d2p2").innerHTML=(prom2/dis2.length).toFixed(2);

                let prom3=0;
                for(let i=0; i<dis3.length; i++){
                   prom3 +=Number(document.getElementById("d3e2s"+i).innerHTML);
                }
                document.getElementById("d3p2").innerHTML=(prom3/dis3.length).toFixed(2);

                let prom4=0;
                for(let i=0; i<dis4.length; i++){
                   prom4 +=Number(document.getElementById("d4e2s"+i).innerHTML);
                }
                document.getElementById("d4p2").innerHTML=(prom4/dis4.length).toFixed(2);

                let prom5=0;
                for(let i=0; i<dis5.length; i++){
                   prom5 +=Number(document.getElementById("d5e2s"+i).innerHTML);
                }
                document.getElementById("d5p2").innerHTML=(prom5/dis5.length).toFixed(2);

                let prom6=0;
                for(let i=0; i<dis6.length; i++){
                   prom6 +=Number(document.getElementById("d6e2s"+i).innerHTML);
                }
                document.getElementById("d6p2").innerHTML=(prom6/dis6.length).toFixed(2);

                let prom7=0;
                for(let i=0; i<dis7.length; i++){
                   prom7 +=Number(document.getElementById("d7e2s"+i).innerHTML);
                }
                document.getElementById("d7p2").innerHTML=(prom7/dis7.length).toFixed(2);

                let prom8=0;
                for(let i=0; i<dis8.length; i++){
                   prom8 +=Number(document.getElementById("d8e2s"+i).innerHTML);
                }
                document.getElementById("d8p2").innerHTML=(prom8/dis8.length).toFixed(2);

                let prom9=0;
                for(let i=0; i<dis9.length; i++){
                   prom9 +=Number(document.getElementById("d9e2s"+i).innerHTML);
                }
                document.getElementById("d9p2").innerHTML=(prom9/dis9.length).toFixed(2);

                let prom10=0;
                for(let i=0; i<dis10.length; i++){
                   prom10 +=Number(document.getElementById("d10e2s"+i).innerHTML);
                }
                document.getElementById("d10p2").innerHTML=(prom10/dis10.length).toFixed(2);
            }

            function promedio3(){
                let prom1=0;
                for(let i=0; i<dis1.length; i++){
                   prom1 +=Number(document.getElementById("d1suc"+i).innerHTML);
                }
                document.getElementById("d1p3").innerHTML=(prom1/dis1.length).toFixed(2);

                let prom2=0;
                for(let i=0; i<dis2.length; i++){
                   prom2 +=Number(document.getElementById("d2suc"+i).innerHTML);
                }
                document.getElementById("d2p3").innerHTML=(prom2/dis2.length).toFixed(2);

                let prom3=0;
                for(let i=0; i<dis3.length; i++){
                   prom3 +=Number(document.getElementById("d3suc"+i).innerHTML);
                }
                document.getElementById("d3p3").innerHTML=(prom3/dis3.length).toFixed(2);

                let prom4=0;
                for(let i=0; i<dis4.length; i++){
                   prom4 +=Number(document.getElementById("d4suc"+i).innerHTML);
                }
                document.getElementById("d4p3").innerHTML=(prom4/dis4.length).toFixed(2);

                let prom5=0;
                for(let i=0; i<dis5.length; i++){
                   prom5 +=Number(document.getElementById("d5suc"+i).innerHTML);
                }
                document.getElementById("d5p3").innerHTML=(prom5/dis5.length).toFixed(2);

                let prom6=0;
                for(let i=0; i<dis6.length; i++){
                   prom6 +=Number(document.getElementById("d6suc"+i).innerHTML);
                }
                document.getElementById("d6p3").innerHTML=(prom6/dis6.length).toFixed(2);

                let prom7=0;
                for(let i=0; i<dis7.length; i++){
                   prom7 +=Number(document.getElementById("d7suc"+i).innerHTML);
                }
                document.getElementById("d7p3").innerHTML=(prom7/dis7.length).toFixed(2);

                let prom8=0;
                for(let i=0; i<dis8.length; i++){
                   prom8 +=Number(document.getElementById("d8suc"+i).innerHTML);
                }
                document.getElementById("d8p3").innerHTML=(prom8/dis8.length).toFixed(2);

                let prom9=0;
                for(let i=0; i<dis9.length; i++){
                   prom9 +=Number(document.getElementById("d9suc"+i).innerHTML);
                }
                document.getElementById("d9p3").innerHTML=(prom9/dis9.length).toFixed(2);

                let prom10=0;
                for(let i=0; i<dis10.length; i++){
                   prom10 +=Number(document.getElementById("d10suc"+i).innerHTML);
                }
                document.getElementById("d10p3").innerHTML=(prom10/dis10.length).toFixed(2);
            }
            function promedio4(){
                let prom1=0;
                let cont1=0;
                for(let i=0; i<dis1.length; i++){
                    let valor=Number(document.getElementById("d1s"+i).innerHTML);
                    if(valor!=0){
                        cont1 +=1;
                        prom1 +=Number(document.getElementById("d1s"+i).innerHTML);
                    }
                }
                if(cont1 == 0){
                    document.getElementById("d1jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d1jefe").innerHTML=(prom1/cont1).toFixed(2);
                }

                let prom2=0;
                let cont2=0;
                for(let i=0; i<dis2.length; i++){
                    let valor=Number(document.getElementById("d2s"+i).innerHTML);
                    if(valor!=0){
                        cont2 +=1;
                        prom2 +=Number(document.getElementById("d2s"+i).innerHTML);
                    }
                }
                if(cont2 == 0){
                    document.getElementById("d2jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d2jefe").innerHTML=(prom2/cont2).toFixed(2);
                }

                let prom3=0;
                let cont3=0;
                for(let i=0; i<dis3.length; i++){
                    let valor=Number(document.getElementById("d3s"+i).innerHTML);
                    if(valor!=0){
                        cont3 +=1;
                        prom3 +=Number(document.getElementById("d3s"+i).innerHTML);
                    }
                }
                if(cont3 == 0){
                    document.getElementById("d3jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d3jefe").innerHTML=(prom3/cont3).toFixed(2);
                }

                let prom4=0;
                let cont4=0;
                for(let i=0; i<dis4.length; i++){
                    let valor=Number(document.getElementById("d4s"+i).innerHTML);
                    if(valor!=0){
                        cont4 +=1;
                        prom4 +=Number(document.getElementById("d4s"+i).innerHTML);
                    }
                }
                if(cont4 == 0){
                    document.getElementById("d4jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d4jefe").innerHTML=(prom4/cont4).toFixed(2);
                }

                let prom5=0;
                let cont5=0;
                for(let i=0; i<dis5.length; i++){
                    let valor=Number(document.getElementById("d5s"+i).innerHTML);
                    if(valor!=0){
                        cont5 +=1;
                        prom5 +=Number(document.getElementById("d5s"+i).innerHTML);
                    }
                }
                if(cont5 == 0){
                    document.getElementById("d5jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d5jefe").innerHTML=(prom5/cont5).toFixed(2);
                }

                let prom6=0;
                let cont6=0;
                for(let i=0; i<dis6.length; i++){
                    let valor=Number(document.getElementById("d6s"+i).innerHTML);
                    if(valor!=0){
                        cont6 +=1;
                        prom6 +=Number(document.getElementById("d6s"+i).innerHTML);
                    }
                }
                if(cont6 == 0){
                    document.getElementById("d6jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d6jefe").innerHTML=(prom6/cont6).toFixed(2);
                }

                let prom7=0;
                let cont7=0;
                for(let i=0; i<dis7.length; i++){
                    let valor=Number(document.getElementById("d7s"+i).innerHTML);
                    if(valor!=0){
                        cont7 +=1;
                        prom7 +=Number(document.getElementById("d7s"+i).innerHTML);
                    }
                }
                if(cont7 == 0){
                    document.getElementById("d7jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d7jefe").innerHTML=(prom7/cont7).toFixed(2);
                }

                let prom8=0;
                let cont8=0;
                for(let i=0; i<dis8.length; i++){
                    let valor=Number(document.getElementById("d8s"+i).innerHTML);
                    if(valor!=0){
                        cont8 +=1;
                        prom8 +=Number(document.getElementById("d8s"+i).innerHTML);
                    }
                }
                if(cont8 == 0){
                    document.getElementById("d8jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d8jefe").innerHTML=(prom8/cont8).toFixed(2);
                }

                let prom9=0;
                let cont9=0;
                for(let i=0; i<dis9.length; i++){
                    let valor=Number(document.getElementById("d9s"+i).innerHTML);
                    if(valor!=0){
                        cont9 +=1;
                        prom9 +=Number(document.getElementById("d9s"+i).innerHTML);
                    }
                }
                if(cont9 == 0){
                    document.getElementById("d9jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d9jefe").innerHTML=(prom9/cont9).toFixed(2);
                }

                let prom10=0;
                let cont10=0;
                for(let i=0; i<dis10.length; i++){
                    let valor=Number(document.getElementById("d10s"+i).innerHTML);
                    if(valor!=0){
                        cont10 +=1;
                        prom10 +=Number(document.getElementById("d10s"+i).innerHTML);
                    }
                }
                if(cont10 == 0){
                    document.getElementById("d10jefe").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("d10jefe").innerHTML=(prom10/cont10).toFixed(2);
                }

                
            }

            function promediofinal(){
                let d1p1= Number(document.getElementById("d1p3").innerHTML);
                let d1p2= Number(document.getElementById("d1jefe").innerHTML);
                if(d1p2!=0){
                    total=((d1p1*0.7)+(d1p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis1").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis1").innerHTML=d1p1.toFixed(2)+"%";
                }

                let d2p1= Number(document.getElementById("d2p3").innerHTML);
                let d2p2= Number(document.getElementById("d2jefe").innerHTML);
                if(d2p2!=0){
                    total=((d2p1*0.7)+(d2p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis2").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis2").innerHTML=d2p1.toFixed(2)+"%";
                }

                let d3p1= Number(document.getElementById("d3p3").innerHTML);
                let d3p2= Number(document.getElementById("d3jefe").innerHTML);
                if(d3p2!=0){
                    total=((d3p1*0.7)+(d3p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis3").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis3").innerHTML=d3p1.toFixed(2)+"%";
                }

                let d4p1= Number(document.getElementById("d4p3").innerHTML);
                let d4p2= Number(document.getElementById("d4jefe").innerHTML);
                if(d4p2!=0){
                    total=((d4p1*0.7)+(d4p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis4").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis4").innerHTML=d4p1.toFixed(2)+"%";
                }

                let d5p1= Number(document.getElementById("d5p3").innerHTML);
                let d5p2= Number(document.getElementById("d5jefe").innerHTML);
                if(d5p2!=0){
                    total=((d5p1*0.7)+(d5p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis5").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis5").innerHTML=d5p1.toFixed(2)+"%";
                }

                let d6p1= Number(document.getElementById("d6p3").innerHTML);
                let d6p2= Number(document.getElementById("d6jefe").innerHTML);
                if(d6p2!=0){
                    total=((d6p1*0.7)+(d6p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis6").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis6").innerHTML=d6p1.toFixed(2)+"%";
                }

                let d7p1= Number(document.getElementById("d7p3").innerHTML);
                let d7p2= Number(document.getElementById("d7jefe").innerHTML);
                if(d7p2!=0){
                    total=((d7p1*0.7)+(d7p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis7").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis7").innerHTML=d7p1.toFixed(2)+"%";
                }

                let d8p1= Number(document.getElementById("d8p3").innerHTML);
                let d8p2= Number(document.getElementById("d8jefe").innerHTML);
                if(d8p2!=0){
                    total=((d8p1*0.7)+(d8p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis8").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis8").innerHTML=d8p1.toFixed(2)+"%";
                }

                let d9p1= Number(document.getElementById("d9p3").innerHTML);
                let d9p2= Number(document.getElementById("d9jefe").innerHTML);
                if(d9p2!=0){
                    total=((d9p1*0.7)+(d9p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis9").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis9").innerHTML=d9p1.toFixed(2)+"%";
                }

                let d10p1= Number(document.getElementById("d10p3").innerHTML);
                let d10p2= Number(document.getElementById("d10jefe").innerHTML);
                if(d10p2!=0){
                    total=((d10p1*0.7)+(d10p2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("tdis10").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("tdis10").innerHTML=d10p1.toFixed(2)+"%";
                }
               
            }


</script>
@endsection
