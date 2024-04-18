<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    <div class="panel" style="width:814px; height:1056px; border:0px;">
        <div class="panel" style="width:814px; height:1025px; border:0px;">
            <div class="panel-body">
                <br>
            <table style="font-size:10px; border: 0px;">
                <tr style="border: 0px;">
                    <td colspan="8"  align="center" id="1" >
                    <b><h2>RESULTADOS GLOBALES </h2></b>
                    </td>
                    <td colspan="2" align="center" id="2">
                    <img src="{{ asset('dist/images/logo3.png') }}" alt="" height="40">
                    </td>
                </tr>
            </table>
            @foreach($array as $key=>$distritos)
                                <table style="font-size:10px; border: 0px;">
                                    <thead>
                                        <tr style="border: 0px;">
                                            <?php if ( $key=="dis1" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 1</font></font></th>
                                            @foreach ($dis1 as $suc)
                                                <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 2</font></font></th>
                                            @foreach ($dis2 as $suc)
                                                <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 3</font></font></th>
                                            @foreach ($dis3 as $suc)
                                                <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 4</font></font></th>
                                            @foreach ($dis4 as $suc)
                                                <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 5</font></font></th>
                                            @foreach ($dis5 as $suc)
                                                <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 6</font></font></th>
                                            @foreach ($dis6 as $suc)
                                                <th class=" whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 7</font></font></th>
                                            @foreach ($dis7 as $suc)
                                                <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 8</font></font></th>
                                            @foreach ($dis8 as $suc)
                                                <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                            <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 9</font></font></th>
                                            @foreach ($dis9 as $suc)
                                                <th class="whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                            <th class="whitespace-no-wrap"style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> DISTRITO 10</font></font></th>
                                            @foreach ($dis10 as $suc)
                                                <th class="whitespace-no-wrap"style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <?php endif; ?>   

                                            <th class="text-center whitespace-no-wrap" style="background-color: #ccc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PROMEDIO</font></font></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="intro-x">
                                            <td style="background-color: #ccc">
                                            1RA EVALUACIÓN
                                            </td>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <?php 
                                                $valorC=count($dis1);
                                                $suma = 0;
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis1); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis1[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d1e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d1e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d1p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                                <?php 
                                                $valorC=count($dis2);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis2); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis2[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d2e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d2e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d2p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                                <?php 
                                                $valorC=count($dis3);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis3); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis3[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d3e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d3e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d3p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                                <?php 
                                                $valorC=count($dis4);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis4); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis4[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d4e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d4e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d4p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                                <?php 
                                                $valorC=count($dis5);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis5); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis5[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d5e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d5e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d5p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                                <?php 
                                                $valorC=count($dis6);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis6); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis6[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d6e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d6e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d6p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                                <?php 
                                                $valorC=count($dis7);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis7); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis7[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d7e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d7e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d7p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                                <?php 
                                                $valorC=count($dis8);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis8); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis8[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d8e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d8e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d8p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                                <?php 
                                                $valorC=count($dis9);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis9); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis9[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d9e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d9e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d9p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                                <?php 
                                                $valorC=count($dis10);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis10); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis10[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion1'][$k]['total'];
                                                            echo  '<th id="d10e1s'.$i.'" class="text-center">'. $distritos['evaluacion1'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d10e1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d10p1" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>  

                                            

                                        </tr>  
                                        <tr class="intro-x">
                                            <td style="background-color: #ccc">
                                            2DA EVALUACIÓN
                                            </td>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <?php 
                                                $valorC=count($dis1);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis1); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis1[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d1e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d1e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d1p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                                <?php 
                                                $valorC=count($dis2);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis2); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis2[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d2e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d2e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d2p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                                <?php 
                                                $valorC=count($dis3);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis3); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis3[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d3e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d3e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d3p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                                <?php 
                                                $valorC=count($dis4);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis4); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis4[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d4e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d4e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d4p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                                <?php 
                                                $valorC=count($dis5);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis5); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis5[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d5e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d5e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d5p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                                <?php 
                                                $valorC=count($dis6);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis6); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis6[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d6e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d6e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d6p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                                <?php 
                                                $valorC=count($dis7);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis7); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis7[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d7e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d7e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d7p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                                <?php 
                                                $valorC=count($dis8);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis8); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis8[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d8e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d8e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d8p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                                <?php 
                                                $valorC=count($dis9);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis9); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis9[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d9e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d9e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d9p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                                <?php 
                                                $valorC=count($dis10);
                                                $sumagobal=0;
                                                for($i=0; $i<count($dis10); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis10[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                        $cont+=1;
                                                        $sumagobal+=$distritos['evaluacion2'][$k]['total'];
                                                            echo  '<th id="d10e2s'.$i.'" class="text-center">'. $distritos['evaluacion2'][$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d10e2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                echo  '<th id="d10p2" class="text-center">'.round($sumagobal/$valorC,2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            
                                           
                                        </tr>  
                                        <tr class="intro-x">
                                            <td   style="background-color: #ccc">
                                            TOTAL POR TIENDA
                                            </td>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <?php 
                                                $d1 = 0;
                                                $d1prom = $GLOBALS;
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis1); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis1[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis1[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d1prom['d1']=round($promedio/count($dis1),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis1),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                                <?php 
                                                $d2 = 0;
                                                $d2prom = $GLOBALS;
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis2); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis2[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis2[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d2prom['d2']=round($promedio/count($dis2),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis2),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                                <?php 
                                                $ev1=0;
                                                $ev2=0;
                                                $d3 = 0;
                                                $d3prom = $GLOBALS;
                                                $promedio=0;
                                                for($i=0; $i<count($dis3); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis3[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis3[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d3prom['d3']=round($promedio/count($dis3),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis3),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                                <?php 
                                                $d4 = 0;
                                                $d4prom = $GLOBALS;
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis4); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis4[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis4[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d4prom['d4']=round($promedio/count($dis4),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis4),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                                <?php 
                                                $d5 = 0;
                                                $d5prom = $GLOBALS;
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis5); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis5[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis5[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d5prom['d5']=round($promedio/count($dis5),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis5),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                                <?php 
                                                 $d6 = 0;
                                                 $d6prom = $GLOBALS;
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis6); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis6[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis6[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d6prom['d6']=round($promedio/count($dis6),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis6),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                                <?php
                                                $d7 = 0;
                                                $d7prom = $GLOBALS;
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis7); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis7[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis7[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d7prom['d7']=round($promedio/count($dis7),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis7),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                                <?php
                                                $d8 = 0;
                                                $d8prom = $GLOBALS;
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis8); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis8[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis8[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d8prom['d8']=round($promedio/count($dis8),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis8),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                                <?php
                                                 $d9 = 0;
                                                 $d9prom = $GLOBALS; 
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis9); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis9[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis9[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d9prom['d9']=round($promedio/count($dis9),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis9),2).'</th>';
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                                <?php 
                                                $d10 = 0;
                                                $d10prom = $GLOBALS; 
                                                $ev1=0;
                                                $ev2=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis10); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($distritos['evaluacion1']);$k++){
                                                        if ( $dis10[$i]['Suc']==$distritos['evaluacion1'][$k]['suc']){
                                                            $cont+=1;
                                                            $ev1= $distritos['evaluacion1'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        $ev1=0;
                                                        
                                                    }
                                                    $cont2=0;
                                                    for($k=0; $k<count($distritos['evaluacion2']);$k++){
                                                        if ( $dis10[$i]['Suc']==$distritos['evaluacion2'][$k]['suc']){
                                                            $cont2+=1;
                                                            $ev2= $distritos['evaluacion2'][$k]['total'];
                                                            ///echo  '<th id="d1suc'.$i.'" class="text-center">'.$ev1.'</th>';
                                                        } 
                                                    }
                                                    if($cont2==0){
                                                        $ev2=0;
                                                        
                                                    }
                                                    $promedio +=round(($ev1+$ev2)/2,2);
                                                    echo  '<th id="d1suc'.$i.'" class="text-center">'.round(($ev1+$ev2)/2,2).'</th>';
                                                    
                                                }
                                                $d10prom['d10']=round($promedio/count($dis10),2);
                                                echo  '<th id="d1p3" class="text-center">'.round($promedio/count($dis10),2).'</th>';
                                                ?>
                                            <?php endif; ?>   

                                            
                                        </tr>  
                                        <tr class="intro-x">
                                            <td style="background-color: #ccc">
                                            JEFE SUPERVISOR
                                            </td>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <?php 
                                                $d1j = 0;
                                                $d1jefe = $GLOBALS; 
                                                $valorC=count($dis1);
                                                $conglobal=0;
                                                $promedio=0;
                                                for($i=0; $i<count($dis1); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis1[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                        echo  '<th id="d1s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d1s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d1jefe['d1j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d1jefe['d1j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis2" ): ?> 
                                                <?php 
                                                $d2j = 0;
                                                $d2jefe = $GLOBALS; 
                                                $conglobal=0;
                                                $promedio=0;
                                                $valorC=count($dis2);
                                                for($i=0; $i<count($dis2); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis2[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d2s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d2s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d2jefe['d2j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d2jefe['d2j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis3" ): ?> 
                                                <?php 
                                                 $d3j = 0;
                                                 $d3jefe = $GLOBALS; 
                                                 $promedio=0;
                                                 $conglobal=0;
                                                $valorC=count($dis3);
                                                for($i=0; $i<count($dis3); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis3[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d3s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        
                                                        echo  '<th id="d3s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d3jefe['d3j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d3jefe['d3j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis4" ): ?> 
                                                <?php 
                                                $d4j = 0;
                                                $d4jefe = $GLOBALS; 
                                                $valorC=count($dis4);
                                                $promedio=0;
                                                $conglobal=0;
                                                for($i=0; $i<count($dis4); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis4[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d4s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d4s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d4jefe['d4j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                $d4jefe['d4j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis5" ): ?> 
                                                <?php 
                                                $d5j = 0;
                                                $d5jefe = $GLOBALS; 
                                                $promedio=0;
                                                $conglobal=0;
                                                $valorC=count($dis5);
                                                for($i=0; $i<count($dis5); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis5[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d5s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        
                                                        echo  '<th id="d5s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d5jefe['d5j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d5jefe['d5j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis6" ): ?> 
                                                <?php 
                                                $d6j = 0;
                                                $d6jefe = $GLOBALS; 
                                                $promedio=0;
                                                $conglobal=0;
                                                $valorC=count($dis6);
                                                for($i=0; $i<count($dis6); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis6[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d6s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d6s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d6jefe['d6j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d6jefe['d6j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis7" ): ?> 
                                                <?php 
                                                $d7j = 0;
                                                $d7jefe = $GLOBALS; 
                                                $promedio=0;
                                                $conglobal=0;
                                                $valorC=count($dis7);
                                                for($i=0; $i<count($dis7); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis7[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d7s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d7s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d7jefe['d7j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d7jefe['d7j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis8" ): ?> 
                                                <?php 
                                                $d8j = 0;
                                                $d8jefe = $GLOBALS; 
                                                $promedio=0;
                                                $conglobal=0;
                                                $valorC=count($dis8);
                                                for($i=0; $i<count($dis8); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis8[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d8s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d8s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d8jefe['d8j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d8jefe['d8j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis9" ): ?> 
                                                <?php 
                                                $d9j = 0;
                                                $d9jefe = $GLOBALS; 
                                                $promedio=0;
                                                $conglobal=0;
                                                $valorC=count($dis9);
                                                for($i=0; $i<count($dis9); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis9[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d9s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d9s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d9jefe['d9j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d9jefe['d9j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            <?php if ( $key=="dis10" ): ?> 
                                                <?php 
                                                $d10j = 0;
                                                $d10jefe = $GLOBALS; 
                                                $promedio=0;
                                                $conglobal=0;
                                                $valorC=count($dis10);
                                                for($i=0; $i<count($dis10); $i++){
                                                    $cont=0;
                                                    for($k=0; $k<count($jefesup);$k++){
                                                        if ( $dis10[$i]['Suc']==$jefesup[$k]['suc']){
                                                        $cont+=1;
                                                        $conglobal+=1;
                                                        $promedio+=round($jefesup[$k]['total'],2);
                                                            echo  '<th id="d10s'.$i.'" class="text-center">'. $jefesup[$k]['total'] .' </th>';
                                                        } 
                                                    }
                                                    if($cont==0){
                                                        echo  '<th id="d10s'.$i.'" class="text-center"> 0 </th>';
                                                    }
                                                }
                                                if($conglobal!=0){
                                                    $d10jefe['d10j']=round($promedio/$conglobal,2);
                                                    echo  '<th id="d4jefe" class="text-center">'.round($promedio/$conglobal,2).'</th>';
                                                }else{
                                                    $d10jefe['d10j']=0;
                                                echo  '<th id="d4jefe" class="text-center">0</th>';
                                                }
                                                ?>
                                            <?php endif; ?>   
                                            
                                        </tr>  

                                        <tr>
                                            <?php if ( $key=="dis1" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                    if($d1jefe['d1j']!=0){
                                                        echo round(($d1prom['d1']*0.7)+($d1jefe['d1j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d1prom['d1'].'%';
                                                    }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ( $key=="dis2" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                    if($d2jefe['d2j']!=0){
                                                        echo round(($d2prom['d2']*0.7)+($d2jefe['d2j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d2prom['d2'].'%';
                                                    }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ( $key=="dis3" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                   if($d3jefe['d3j']!=0){
                                                    echo round(($d3prom['d3']*0.7)+($d3jefe['d3j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d3prom['d3'].'%';
                                                    }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ( $key=="dis4" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                    if($d4jefe['d4j']!=0){
                                                        echo round(($d4prom['d4']*0.7)+($d4jefe['d4j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d4prom['d4'].'%';
                                                    }
                                                    
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ( $key=="dis5" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                    if($d5jefe['d5j']!=0){
                                                        echo round(($d5prom['d5']*0.7)+($d5jefe['d5j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d5prom['d5'].'%';
                                                    }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                                
                                            <?php endif; ?>
                                            <?php if ( $key=="dis6" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                    if($d6jefe['d6j']!=0){
                                                        echo round(($d6prom['d6']*0.7)+($d6jefe['d6j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d6prom['d6'].'%';
                                                    }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ( $key=="dis7" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                    if($d7jefe['d7j']!=0){
                                                        echo round(($d7prom['d7']*0.7)+($d7jefe['d7j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d7prom['d7'].'%';
                                                    }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ( $key=="dis8" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                    if($d8jefe['d8j']!=0){
                                                        echo round(($d8prom['d8']*0.7)+($d8jefe['d8j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d8prom['d8'].'%';
                                                    }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ( $key=="dis9" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                   if($d9jefe['d9j']!=0){
                                                    echo round(($d9prom['d2']*0.7)+($d9jefe['d9j']*0.3),2).'%' ;
                                                }else{
                                                    echo $d9prom['d9'].'%';
                                                }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ( $key=="dis10" ): ?> 
                                                <th  colspan="11" class="text-center">
                                                <h2 class="text-lg font-medium truncate mr-5 text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="t{{$key}}">
                                                    <?php 
                                                    if($d10jefe['d10j']!=0){
                                                        echo round(($d10prom['d10']*0.7)+($d10jefe['d10j']*0.3),2).'%' ;
                                                    }else{
                                                        echo $d10prom['d10'].'%';
                                                    }
                                                    ?>
                                                </font></font></h2>
                                                </th>
                                            <?php endif; ?>

                                        </tr>
                                        
                                    </tbody>
                                </table>
                                    <?php if ( $key=="dis5" ): ?> 
                                        <div class="page-break"></div>
                                        <br><br><br>
                                    <?php endif; ?>
                                @endforeach

            </div>
        </div>
    </div>
        
    <style>@page {
        
        margin: 0;
        padding:0;
       }
       table{
            table-layout: fixed;
            width:700px;
            margin: 0px 50px 15px 50px;
            border: 0.5px solid #000;
            font-family: monospace;
        }
        th, td {
            border: 0.5px solid #000;
            color: #000;
            
        }
        #1{
            border-right: 0;
        }
        
        .page-break {
            page-break-after: always;
        }
        
    </style>

</body>
</html>