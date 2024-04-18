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
            <?php if (count($evaluacion1)!=0): ?>
                <table style="font-size:10px; border: 0px;" >
                    <tr style="border: 0px;">
                        <td colspan="8"  align="center" id="1" >
                        <b><h2>CHECK LIST OPERACIONES SUCURSAL {{$suc}} EVALUACION 1</h2></b>
                        </td>
                        <td colspan="2" align="center" id="2">
                        <img src="{{ asset('dist/images/logo3.png') }}" alt="" height="40">
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="11" class="saltos">
                            <br>
                        </td>
                    </tr> 
                    <tr>
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">CRITERIOS DE CALIFICACIÓN</th>
                    </tr>
                    <tr>
                        <td scope="col" align="center" colspan="10" >5% No cumple con el punto a evaluar</td>
                    </tr>

                    <tr>
                        <td scope="col" align="center" colspan="10" >10% Cumple al 100% con lo que demanda el criterio a calificar</td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    
                    <?php 
                        $valorR=count($evaluacion1);
                        $ventas=0;$analisis=0;$rh=0;$experiencia=0;$estandares=0;$limpieza=0;$perecederos=0;$contabilidad=0;
                        $tventas=0;$tanalisis=0;$trh=0;$texperiencia=0;$testandares=0;$tlimpieza=0;$tperecederos=0;$tcontabilidad=0;
                        for($i=0; $i<count($evaluacion1); $i++){
                            if ( $evaluacion1[$i]['tipo']=='VENTAS'){
                                $ventas+=1;
                                $tventas+=$evaluacion1[$i]['calificacion'];
                            }if ( $evaluacion1[$i]['tipo']=='ANALISIS FINANCIERO'){
                                $analisis+=1;
                                $tanalisis+=$evaluacion1[$i]['calificacion'];
                            } if ( $evaluacion1[$i]['tipo']=='RH'){
                                $rh+=1;
                                $trh+=$evaluacion1[$i]['calificacion'];
                            }if ( $evaluacion1[$i]['tipo']=='EXPERIENCIA'){
                                $experiencia+=1;
                                $texperiencia+=$evaluacion1[$i]['calificacion'];
                            } if ( $evaluacion1[$i]['tipo']=='ESTANDARES DE MERCADERIA'){
                                $estandares+=1;
                                $testandares+=$evaluacion1[$i]['calificacion'];
                            }if ( $evaluacion1[$i]['tipo']=='LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'){
                                $limpieza+=1;
                                $tlimpieza+=$evaluacion1[$i]['calificacion'];
                            } if ( $evaluacion1[$i]['tipo']=='PERECEDEROS'){
                                $perecederos+=1;
                                $tperecederos+=$evaluacion1[$i]['calificacion'];
                            }if ( $evaluacion1[$i]['tipo']=='CONTABILIDAD'){
                                $contabilidad+=1;
                                $tcontabilidad+=$evaluacion1[$i]['calificacion'];
                            } 
                        }
                        for($i=0; $i<count($evaluacion1); $i++){
                            if ( $evaluacion1[$i]['tipo']=='VENTAS'){
                                if($i==0){
                                    
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">VENTAS (Obtenida del reporte de ventas diario)</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion1[$i]['desPreg'] .'</td>';
                                    if($evaluacion1[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    
                                    if($i==0){
                                        echo '<td align="center" rowspan="'. $ventas+1 .'" colspan="1" style="font-size:9px"> '.$total1['VENTAS'].'%</td>';
                                    }
                                    echo '</tr>';
                                    if($i==$ventas-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'.$tventas.'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
    
                            }if ( $evaluacion1[$i]['tipo']=='ANALISIS FINANCIERO'){
                                //$analisis+=1;
                                if($i==$ventas){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">ANALISIS FINANCIERO</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion1[$i]['desPreg'] .'</td>';
                                    if($evaluacion1[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas){
                                        echo '<td align="center" rowspan="'.$analisis+1 .'" colspan="1" style="font-size:9px"> '.$total1['ANALISIS FINANCIERO'].'%</td>';
                                        
                                    }
                                    echo '</tr>';
                                    if($i==($ventas+$analisis)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'.$tanalisis.'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            } if ( $evaluacion1[$i]['tipo']=='RH'){
                                //$rh+=1;
                                if($i==$ventas+$analisis){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">RH</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion1[$i]['desPreg'] .'</td>';
                                    if($evaluacion1[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis){
                                        echo '<td align="center" rowspan="'.$rh+1 .'" colspan="1" style="font-size:9px"> '.$total1['RH'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $trh .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br> ';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion1[$i]['tipo']=='EXPERIENCIA'){
                                //$experiencia+=1;
                                if($i==$ventas+$analisis+$rh){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">EXPERIENCIA</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion1[$i]['desPreg'] .'</td>';
                                    if($evaluacion1[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh){
                                        echo '<td align="center" rowspan="'.$experiencia+1 .'" colspan="1" style="font-size:9px"> '.$total1['EXPERIENCIA'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $texperiencia .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                                    
                            } if ( $evaluacion1[$i]['tipo']=='ESTANDARES DE MERCADERIA'){
                                //$estandares+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">ESTANDARES DE MERCADERIA</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion1[$i]['desPreg'] .'</td>';
                                    if($evaluacion1[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia){
                                        echo '<td align="center" rowspan="'.$estandares+1 .'" colspan="1" style="font-size:9px"> '.$total1['ESTANDARES DE MERCADERIA'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $testandares .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion1[$i]['tipo']=='LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'){
                                //$evaluacion1+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion1[$i]['desPreg'] .'</td>';
                                    if($evaluacion1[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares){
                                        echo '<td align="center" rowspan="'.$limpieza+1 .'" colspan="1" style="font-size:9px"> '.$total1['LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'].'%</td>';
                                        
                                    }
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tlimpieza .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                       
                                    }
                            } if ( $evaluacion1[$i]['tipo']=='PERECEDEROS'){
                                //$perecederos+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">PERECEDEROS</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion1[$i]['desPreg'] .'</td>';
                                    if($evaluacion1[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza){
                                        echo '<td align="center" rowspan="'.$perecederos+1 .'" colspan="1" style="font-size:9px"> '.$total1['PERECEDEROS'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tperecederos .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion1[$i]['tipo']=='CONTABILIDAD'){
                                //$contabilidad+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">CONTABILIDAD</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion1[$i]['desPreg'] .'</td>';
                                    if($evaluacion1[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos){
                                        echo '<td align="center" rowspan="'.$contabilidad+1 .'" colspan="1" style="font-size:9px"> '.$total1['CONTABILIDAD'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos+$contabilidad)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tcontabilidad .'%</th>';
                                        echo '</tr>';
                                       
                                    }
                            } 
                                        
                        }
                    ?>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <td colspan="8"  align="center" id="1" >
                        <b><h2>CALIFICACION FINAL</h2></b>
                        </td>
                        <td colspan="2" align="center" id="2">
                        <b><h2>{{$total1['cali_total']}}%</h2></b>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">INTERPRETACION DE RESULTADOS</th>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda de excelencia </b>
                        (el gerente muestra compromiso, conoce su data, da seguimiento a todas las areas dentro de su unidad, el seguimiento al personal y ambiente laboral es bueno, tiendas en optimas condiciones para recibir a los clientes)</td>
                        <td scope="col" align="center" colspan="1" >95% a 100%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda regular </b>
                        (el gerente cuenta con puntos de dolor, se tiene que accionar para poder revertir los numeros y los rubros en los que se tiene oportunidad)</td>
                        <td scope="col" align="center" colspan="1" >90% a 94%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda deficiente </b>
                        (Varios puntos de dolor que afectan los resultados totales de la tienda, falta de seguimiento a indicadores por parte del gerente de tienda)</td>
                        <td scope="col" align="center" colspan="1" >80% a 89%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda critica </b>
                        (Nulo involucramiento por parte del gerente de tienda, se tienen que tomar medidas disciplinarias y accionar inmediatamente en tienda para revertir el mal resultado)</td>
                        <td scope="col" align="center" colspan="1" >MENOR A 80% </td>
                    </tr>
                    <?php if (count($comentarios1)!=0 ): ?>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">COMENTARIOS</th>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="10" ><b>{{$comentarios1[0]['comentario']}} </b>
                    </tr>
                    <?php endif; ?>  
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                        </td>
                    </tr>

                    <tr style="border: 0;">
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                        <td colspan="4" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                    </tr>
                    <tr style="border: 0; ">
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">GERENTE</td>
                        <td colspan="4" class="saltos" align="center" style="height:5px; border: 0;">GERENTE DE OPERACIONES </td>
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">SUPERVISOR</td>
                    </tr>
                    
                </table>
            
                <?php if (count($evaluacion2)!=0): ?>
                <div class="page-break"></div>
                <?php endif; ?>     
                <?php endif; ?>      
<!-- aqui comienza la segunda tabla -->
                <?php if (count($evaluacion2)!=0): ?>
                <table class="py-5" style="font-size:10px; border: 0px;" >
                    <tr style="border: 0px;">
                        <td colspan="8"  align="center" id="1" >
                        <b><h2>CHECK LIST OPERACIONES SUCURSAL {{$suc}} EVALUACION 2</h2></b>
                        </td>
                        <td colspan="2" align="center" id="2">
                        <img src="{{ asset('dist/images/logo3.png') }}" alt="" height="40">
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="11" class="saltos">
                            <br>
                        </td>
                    </tr> 
                    <tr>
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">CRITERIOS DE CALIFICACIÓN</th>
                    </tr>
                    <tr>
                        <td scope="col" align="center" colspan="10" >5% No cumple con el punto a evaluar</td>
                    </tr>

                    <tr>
                        <td scope="col" align="center" colspan="10" >10% Cumple al 100% con lo que demanda el criterio a calificar</td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    
                    <?php 
                        $valorR=count($evaluacion2);
                        $ventas=0;$analisis=0;$rh=0;$experiencia=0;$estandares=0;$limpieza=0;$perecederos=0;$contabilidad=0;
                        $tventas=0;$tanalisis=0;$trh=0;$texperiencia=0;$testandares=0;$tlimpieza=0;$tperecederos=0;$tcontabilidad=0;
                        for($i=0; $i<count($evaluacion2); $i++){
                            if ( $evaluacion2[$i]['tipo']=='VENTAS'){
                                $ventas+=1;
                                $tventas+=$evaluacion2[$i]['calificacion'];
                            }if ( $evaluacion2[$i]['tipo']=='ANALISIS FINANCIERO'){
                                $analisis+=1;
                                $tanalisis+=$evaluacion2[$i]['calificacion'];
                            } if ( $evaluacion2[$i]['tipo']=='RH'){
                                $rh+=1;
                                $trh+=$evaluacion2[$i]['calificacion'];
                            }if ( $evaluacion2[$i]['tipo']=='EXPERIENCIA'){
                                $experiencia+=1;
                                $texperiencia+=$evaluacion2[$i]['calificacion'];
                            } if ( $evaluacion2[$i]['tipo']=='ESTANDARES DE MERCADERIA'){
                                $estandares+=1;
                                $testandares+=$evaluacion2[$i]['calificacion'];
                            }if ( $evaluacion2[$i]['tipo']=='LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'){
                                $limpieza+=1;
                                $tlimpieza+=$evaluacion2[$i]['calificacion'];
                            } if ( $evaluacion2[$i]['tipo']=='PERECEDEROS'){
                                $perecederos+=1;
                                $tperecederos+=$evaluacion2[$i]['calificacion'];
                            }if ( $evaluacion2[$i]['tipo']=='CONTABILIDAD'){
                                $contabilidad+=1;
                                $tcontabilidad+=$evaluacion2[$i]['calificacion'];
                            } 
                        }
                        for($i=0; $i<count($evaluacion2); $i++){
                            if ( $evaluacion2[$i]['tipo']=='VENTAS'){
                                if($i==0){
                                    
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">VENTAS (Obtenida del reporte de ventas diario)</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion2[$i]['desPreg'] .'</td>';
                                    if($evaluacion2[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    
                                    if($i==0){
                                        echo '<td align="center" rowspan="'. $ventas+1 .'" colspan="1" style="font-size:9px"> '.$total2['VENTAS'].'%</td>';
                                    }
                                    echo '</tr>';
                                    if($i==$ventas-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'.$tventas.'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
    
                            }if ( $evaluacion2[$i]['tipo']=='ANALISIS FINANCIERO'){
                                //$analisis+=1;
                                if($i==$ventas){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">ANALISIS FINANCIERO</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion2[$i]['desPreg'] .'</td>';
                                    if($evaluacion2[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas){
                                        echo '<td align="center" rowspan="'.$analisis+1 .'" colspan="1" style="font-size:9px"> '.$total2['ANALISIS FINANCIERO'].'%</td>';
                                        
                                    }
                                    echo '</tr>';
                                    if($i==($ventas+$analisis)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'.$tanalisis.'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            } if ( $evaluacion2[$i]['tipo']=='RH'){
                                //$rh+=1;
                                if($i==$ventas+$analisis){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">RH</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion2[$i]['desPreg'] .'</td>';
                                    if($evaluacion2[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis){
                                        echo '<td align="center" rowspan="'.$rh+1 .'" colspan="1" style="font-size:9px"> '.$total2['RH'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $trh .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br> ';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion2[$i]['tipo']=='EXPERIENCIA'){
                                //$experiencia+=1;
                                if($i==$ventas+$analisis+$rh){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">EXPERIENCIA</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion2[$i]['desPreg'] .'</td>';
                                    if($evaluacion2[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh){
                                        echo '<td align="center" rowspan="'.$experiencia+1 .'" colspan="1" style="font-size:9px"> '.$total2['EXPERIENCIA'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $texperiencia .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                                    
                            } if ( $evaluacion2[$i]['tipo']=='ESTANDARES DE MERCADERIA'){
                                //$estandares+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">ESTANDARES DE MERCADERIA</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion2[$i]['desPreg'] .'</td>';
                                    if($evaluacion2[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia){
                                        echo '<td align="center" rowspan="'.$estandares+1 .'" colspan="1" style="font-size:9px"> '.$total2['ESTANDARES DE MERCADERIA'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $testandares .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion2[$i]['tipo']=='LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'){
                                //$evaluacion1+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion2[$i]['desPreg'] .'</td>';
                                    if($evaluacion2[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares){
                                        echo '<td align="center" rowspan="'.$limpieza+1 .'" colspan="1" style="font-size:9px"> '.$total2['LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'].'%</td>';
                                        
                                    }
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tlimpieza .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                       
                                    }
                            } if ( $evaluacion2[$i]['tipo']=='PERECEDEROS'){
                                //$perecederos+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">PERECEDEROS</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion2[$i]['desPreg'] .'</td>';
                                    if($evaluacion2[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza){
                                        echo '<td align="center" rowspan="'.$perecederos+1 .'" colspan="1" style="font-size:9px"> '.$total2['PERECEDEROS'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tperecederos .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion2[$i]['tipo']=='CONTABILIDAD'){
                                //$contabilidad+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">CONTABILIDAD</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion2[$i]['desPreg'] .'</td>';
                                    if($evaluacion2[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos){
                                        echo '<td align="center" rowspan="'.$contabilidad+1 .'" colspan="1" style="font-size:9px"> '.$total2['CONTABILIDAD'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos+$contabilidad)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tcontabilidad .'%</th>';
                                        echo '</tr>';
                                       
                                    }
                            } 
                                        
                        }
                    ?>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <td colspan="8"  align="center" id="1" >
                        <b><h2>CALIFICACION FINAL</h2></b>
                        </td>
                        <td colspan="2" align="center" id="2">
                        <b><h2>{{$total2['cali_total']}}%</h2></b>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">INTERPRETACION DE RESULTADOS</th>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda de excelencia </b>
                        (el gerente muestra compromiso, conoce su data, da seguimiento a todas las areas dentro de su unidad, el seguimiento al personal y ambiente laboral es bueno, tiendas en optimas condiciones para recibir a los clientes)</td>
                        <td scope="col" align="center" colspan="1" >95% a 100%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda regular </b>
                        (el gerente cuenta con puntos de dolor, se tiene que accionar para poder revertir los numeros y los rubros en los que se tiene oportunidad)</td>
                        <td scope="col" align="center" colspan="1" >90% a 94%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda deficiente </b>
                        (Varios puntos de dolor que afectan los resultados totales de la tienda, falta de seguimiento a indicadores por parte del gerente de tienda)</td>
                        <td scope="col" align="center" colspan="1" >80% a 89%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda critica </b>
                        (Nulo involucramiento por parte del gerente de tienda, se tienen que tomar medidas disciplinarias y accionar inmediatamente en tienda para revertir el mal resultado)</td>
                        <td scope="col" align="center" colspan="1" >MENOR A 80% </td>
                    </tr>
                    <?php if (count($comentarios2)!=0 ): ?>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">COMENTARIOS</th>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="10" ><b>{{$comentarios2[0]['comentario']}} </b>
                    </tr>
                    <?php endif; ?>  
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                        </td>
                    </tr>

                    <tr style="border: 0;">
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                        <td colspan="4" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                    </tr>
                    <tr style="border: 0; ">
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">GERENTE</td>
                        <td colspan="4" class="saltos" align="center" style="height:5px; border: 0;">GERENTE DE OPERACIONES </td>
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">SUPERVISOR</td>
                    </tr>
                   
                </table>
                <?php if (count($evaluacion3)!=0): ?>
                <div class="page-break"></div>
                <?php endif; ?>      
                <?php endif; ?>      
<!-- aqui comienza la tercera tabla -->
                <?php if (count($evaluacion3)!=0): ?>
                <table class="py-5" style="font-size:10px; border: 0px;" >
                    <tr style="border: 0px;">
                        <td colspan="8"  align="center" id="1" >
                        <b><h2>CHECK LIST OPERACIONES SUCURSAL {{$suc}} EVALUACION DE OPERACIONES</h2></b>
                        </td>
                        <td colspan="2" align="center" id="2">
                        <img src="{{ asset('dist/images/logo3.png') }}" alt="" height="40">
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="11" class="saltos">
                            <br>
                        </td>
                    </tr> 
                    <tr>
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">CRITERIOS DE CALIFICACIÓN</th>
                    </tr>
                    <tr>
                        <td scope="col" align="center" colspan="10" >5% No cumple con el punto a evaluar</td>
                    </tr>

                    <tr>
                        <td scope="col" align="center" colspan="10" >10% Cumple al 100% con lo que demanda el criterio a calificar</td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    
                    <?php 
                        $valorR=count($evaluacion3);
                        $ventas=0;$analisis=0;$rh=0;$experiencia=0;$estandares=0;$limpieza=0;$perecederos=0;$contabilidad=0;
                        $tventas=0;$tanalisis=0;$trh=0;$texperiencia=0;$testandares=0;$tlimpieza=0;$tperecederos=0;$tcontabilidad=0;
                        for($i=0; $i<count($evaluacion3); $i++){
                            if ( $evaluacion3[$i]['tipo']=='VENTAS'){
                                $ventas+=1;
                                $tventas+=$evaluacion3[$i]['calificacion'];
                            }if ( $evaluacion3[$i]['tipo']=='ANALISIS FINANCIERO'){
                                $analisis+=1;
                                $tanalisis+=$evaluacion3[$i]['calificacion'];
                            } if ( $evaluacion3[$i]['tipo']=='RH'){
                                $rh+=1;
                                $trh+=$evaluacion3[$i]['calificacion'];
                            }if ( $evaluacion3[$i]['tipo']=='EXPERIENCIA'){
                                $experiencia+=1;
                                $texperiencia+=$evaluacion3[$i]['calificacion'];
                            } if ( $evaluacion3[$i]['tipo']=='ESTANDARES DE MERCADERIA'){
                                $estandares+=1;
                                $testandares+=$evaluacion3[$i]['calificacion'];
                            }if ( $evaluacion3[$i]['tipo']=='LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'){
                                $limpieza+=1;
                                $tlimpieza+=$evaluacion3[$i]['calificacion'];
                            } if ( $evaluacion3[$i]['tipo']=='PERECEDEROS'){
                                $perecederos+=1;
                                $tperecederos+=$evaluacion3[$i]['calificacion'];
                            }if ( $evaluacion3[$i]['tipo']=='CONTABILIDAD'){
                                $contabilidad+=1;
                                $tcontabilidad+=$evaluacion3[$i]['calificacion'];
                            } 
                        }
                        for($i=0; $i<count($evaluacion3); $i++){
                            if ( $evaluacion3[$i]['tipo']=='VENTAS'){
                                if($i==0){
                                    
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">VENTAS (Obtenida del reporte de ventas diario)</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion3[$i]['desPreg'] .'</td>';
                                    if($evaluacion3[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    
                                    if($i==0){
                                        echo '<td align="center" rowspan="'. $ventas+1 .'" colspan="1" style="font-size:9px"> '.$total3['VENTAS'].'%</td>';
                                    }
                                    echo '</tr>';
                                    if($i==$ventas-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'.$tventas.'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
    
                            }if ( $evaluacion3[$i]['tipo']=='ANALISIS FINANCIERO'){
                                //$analisis+=1;
                                if($i==$ventas){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">ANALISIS FINANCIERO</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion3[$i]['desPreg'] .'</td>';
                                    if($evaluacion3[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas){
                                        echo '<td align="center" rowspan="'.$analisis+1 .'" colspan="1" style="font-size:9px"> '.$total3['ANALISIS FINANCIERO'].'%</td>';
                                        
                                    }
                                    echo '</tr>';
                                    if($i==($ventas+$analisis)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'.$tanalisis.'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            } if ( $evaluacion3[$i]['tipo']=='RH'){
                                //$rh+=1;
                                if($i==$ventas+$analisis){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">RH</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion3[$i]['desPreg'] .'</td>';
                                    if($evaluacion3[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis){
                                        echo '<td align="center" rowspan="'.$rh+1 .'" colspan="1" style="font-size:9px"> '.$total3['RH'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $trh .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br> ';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion3[$i]['tipo']=='EXPERIENCIA'){
                                //$experiencia+=1;
                                if($i==$ventas+$analisis+$rh){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">EXPERIENCIA</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion3[$i]['desPreg'] .'</td>';
                                    if($evaluacion3[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh){
                                        echo '<td align="center" rowspan="'.$experiencia+1 .'" colspan="1" style="font-size:9px"> '.$total3['EXPERIENCIA'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $texperiencia .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                                    
                            } if ( $evaluacion3[$i]['tipo']=='ESTANDARES DE MERCADERIA'){
                                //$estandares+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">ESTANDARES DE MERCADERIA</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion3[$i]['desPreg'] .'</td>';
                                    if($evaluacion3[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia){
                                        echo '<td align="center" rowspan="'.$estandares+1 .'" colspan="1" style="font-size:9px"> '.$total3['ESTANDARES DE MERCADERIA'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $testandares .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion3[$i]['tipo']=='LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'){
                                //$evaluacion1+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion3[$i]['desPreg'] .'</td>';
                                    if($evaluacion3[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares){
                                        echo '<td align="center" rowspan="'.$limpieza+1 .'" colspan="1" style="font-size:9px"> '.$total3['LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)'].'%</td>';
                                        
                                    }
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tlimpieza .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                       
                                    }
                            } if ( $evaluacion3[$i]['tipo']=='PERECEDEROS'){
                                //$perecederos+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">PERECEDEROS</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion3[$i]['desPreg'] .'</td>';
                                    if($evaluacion3[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza){
                                        echo '<td align="center" rowspan="'.$perecederos+1 .'" colspan="1" style="font-size:9px"> '.$total3['PERECEDEROS'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tperecederos .'%</th>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo    '<td style="border: 0; font-size:3px" colspan="10" class="saltos">';
                                        echo       '<br>';
                                        echo    '</td>';
                                        echo '</tr>';
                                    }
                            }if ( $evaluacion3[$i]['tipo']=='CONTABILIDAD'){
                                //$contabilidad+=1;
                                if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos){
                                    echo '<tr>';
                                    echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">CONTABILIDAD</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">Calificaión</th>';
                                    echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">%</th>';
                                    echo '</tr>';
                                    }
                                    echo '<tr>';
                                    echo  '<td scope="col" align="center" colspan="8" >'.$evaluacion3[$i]['desPreg'] .'</td>';
                                    if($evaluacion3[$i]['calificacion']==10){
                                        echo  '<td scope="col" align="center" colspan="1" >SI </td>';
                                    }else{
                                        echo  '<td scope="col" align="center" colspan="1" >NO </td>';
                                    }
                                    if($i==$ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos){
                                        echo '<td align="center" rowspan="'.$contabilidad+1 .'" colspan="1" style="font-size:9px"> '.$total3['CONTABILIDAD'].'%</td>';
                                        
                                    }
                                    
                                    echo '</tr>';
                                    if($i==($ventas+$analisis+$rh+$experiencia+$estandares+$limpieza+$perecederos+$contabilidad)-1){
                                        echo '<tr>';
                                        echo '<th scope="col" align="center" colspan="8" style="background-color: #ccc">TOTAL</th>';
                                        echo '<th scope="col" align="center" colspan="1" style="background-color: #ccc">'. $tcontabilidad .'%</th>';
                                        echo '</tr>';
                                       
                                    }
                            } 
                                        
                        }
                    ?>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <td colspan="8"  align="center" id="1" >
                        <b><h2>CALIFICACION FINAL</h2></b>
                        </td>
                        <td colspan="2" align="center" id="2">
                        <b><h2>{{$total3['cali_total']}}%</h2></b>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">INTERPRETACION DE RESULTADOS</th>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda de excelencia </b>
                        (el gerente muestra compromiso, conoce su data, da seguimiento a todas las areas dentro de su unidad, el seguimiento al personal y ambiente laboral es bueno, tiendas en optimas condiciones para recibir a los clientes)</td>
                        <td scope="col" align="center" colspan="1" >95% a 100%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda regular </b>
                        (el gerente cuenta con puntos de dolor, se tiene que accionar para poder revertir los numeros y los rubros en los que se tiene oportunidad)</td>
                        <td scope="col" align="center" colspan="1" >90% a 94%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda deficiente </b>
                        (Varios puntos de dolor que afectan los resultados totales de la tienda, falta de seguimiento a indicadores por parte del gerente de tienda)</td>
                        <td scope="col" align="center" colspan="1" >80% a 89%</td>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="9" ><b>Tienda critica </b>
                        (Nulo involucramiento por parte del gerente de tienda, se tienen que tomar medidas disciplinarias y accionar inmediatamente en tienda para revertir el mal resultado)</td>
                        <td scope="col" align="center" colspan="1" >MENOR A 80% </td>
                    </tr>
                    <?php if (count($comentarios3)!=0 ): ?>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br>
                        </td>
                    </tr>
                    <tr style="border: 0px;">
                        <th scope="col" align="center" colspan="10" style="background-color: #ccc">COMENTARIOS</th>
                    </tr>
                    <tr style="border: 0px;">
                        <td scope="col" align="center" colspan="10" ><b>{{$comentarios3[0]['comentario']}} </b>
                    </tr>
                    <?php endif; ?>  
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 0; font-size:3px" colspan="10" class="saltos">
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                        </td>
                    </tr>

                    <tr style="border: 0;">
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                        <td colspan="4" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">___________________________</td>
                    </tr>
                    <tr style="border: 0; ">
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">GERENTE</td>
                        <td colspan="4" class="saltos" align="center" style="height:5px; border: 0;">GERENTE DE OPERACIONES </td>
                        <td colspan="3" class="saltos" align="center" style="height:5px; border: 0;">SUPERVISOR</td>
                    </tr>
                   
                </table>
                <?php endif; ?>
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
            margin: 35px 50px 30px 50px;
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