@extends('../layout/' . $layout)

@section('subhead')
    <title>Resultados finales </title>

@endsection

@section('subcontent')
<div class="">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: Mensaje -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    RESULTADOS DEL DISTRITO {{$array[0]['ID']}}
                                </font></font></h2>
                            </div>
                        </div>
                        <!-- END: Mensaje -->

                        <!-- BEGIN: Weekly Top Seller -->
                        <div class="col-span-12 mt-6">
                            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <table class="table table-report sm:mt-2">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></th>
                                            @foreach ($array as $suc)
                                                <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$suc['Suc']}} <br> {{$suc['NomSuc']}}</font></font></th>
                                            @endforeach
                                            <th class="text-center whitespace-no-wrap"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PROMEDIO</font></font></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="intro-x">
                                            <td >
                                            1RA EVALUACIÓN
                                            </td>
                                            <?php 
                                            $valorC=count($array1);
                                            for($i=0; $i<count($array); $i++){
                                                $cont=0;
                                                for($k=0; $k<count($array1);$k++){
                                                   
                                                    if ( $array[$i]['Suc']==$array1[$k]['suc']){
                                                       $cont+=1;
                                                        echo  '<td id="te1'.$i.'" class="text-center">'. $array1[$k]['total'] .' </td>';
                                                    } 
                                                }
                                                if($cont==0){
                                                    echo  '<td id="te1'.$i.'" class="text-center"> 0 </td>';
                                                }
                                            }
                                            ?>
                                             <td id="prom1" class="text-center"></td>
                                           
                                        </tr>  
                                        <tr class="intro-x">
                                            <td >
                                            2DA EVALUACIÓN
                                            </td>
                                            <?php 
                                            $valorC=count($array2);
                                            for($i=0; $i<count($array); $i++){
                                                $cont=0;
                                                for($k=0; $k<count($array2);$k++){
                                                   
                                                    if ( $array[$i]['Suc']==$array2[$k]['suc']){
                                                       $cont+=1;
                                                        echo  '<td id="te2'.$i.'" class="text-center">'. $array2[$k]['total'] .' </td>';
                                                    } 
                                                }
                                              
                                                if($cont==0){
                                                    echo  '<td id="te2'.$i.'" class="text-center"> 0 </td>';
                                                }
                                            }
                                            ?>
                                           <td id="prom2" class="text-center"></td>
                                        </tr>  
                                        <tr class="intro-x">
                                            <td   >
                                            TOTAL POR TIENDA
                                            </td>
                                            <?php 
                                            for($i=0; $i<count($array); $i++){
                                                echo  '<td id="suc'.$i.'" class="text-center">  </td>';
                                            }
                                            ?>
                                            <td id="prom3" class="text-center"></td>
                                        </tr>  
                                        <tr class="intro-x">
                                            <td class=>
                                            JEFE SUPERVISOR
                                            </td>
                                            <?php 
                                            $valorC=count($array3);
                                            for($i=0; $i<count($array); $i++){
                                                $cont=0;
                                                for($k=0; $k<count($array3);$k++){
                                                   
                                                    if ( $array[$i]['Suc']==$array3[$k]['suc']){
                                                       $cont+=1;
                                                        echo  '<td id="te3'.$i.'" class="text-center">'. $array3[$k]['total'] .' </td>';
                                                    } 
                                                }
                                              
                                                if($cont==0){
                                                    echo  '<td id="te3'.$i.'" class="text-center"> 0 </td>';
                                                }
                                            }
                                            ?>
                                           <td id="prom4" class="text-center"></td>
                                        </tr>  

                                        <tr>
                                            <td  colspan="10" class="text-center">
                                            <h2 class="text-lg font-medium truncate mr-5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="total">
                                                
                                            </font></font></h2>
                                            </td>
                                        </tr>
                                        
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

            
<script type="text/javascript">
                var array = {{Js::from($array)}};

            window.addEventListener("load", function(){
            
            sumaTotales();
            promedio1();
            promedio2();
            promedio3();
            promedio4();
            promediofinal();

        });


            function sumaTotales(){
                for(let i=0; i<array.length; i++){
                    document.getElementById("suc"+i).innerHTML= ((Number(document.getElementById("te1"+i).innerHTML) +Number(document.getElementById("te2"+i).innerHTML))/2).toFixed(2);
                    
                }

            }

            function promedio1(){
                let prom=0;
                for(let i=0; i<array.length; i++){
                   prom +=Number(document.getElementById("te1"+i).innerHTML);
                }
                document.getElementById("prom1").innerHTML=(prom/array.length).toFixed(2);
            }

            function promedio2(){
                let prom=0;
                for(let i=0; i<array.length; i++){
                   prom +=Number(document.getElementById("te2"+i).innerHTML);
                }
                document.getElementById("prom2").innerHTML=(prom/array.length).toFixed(2);
            }

            function promedio3(){
                let prom=0;
                for(let i=0; i<array.length; i++){
                   prom +=Number(document.getElementById("suc"+i).innerHTML);
                }
                document.getElementById("prom3").innerHTML=(prom/array.length).toFixed(2);
            }
            function promedio4(){
                let prom=0;
                let cont=0;
                for(let i=0; i<array.length; i++){
                    let valor=Number(document.getElementById("te3"+i).innerHTML);
                    if(valor!=0){
                        cont +=1;
                        prom +=Number(document.getElementById("te3"+i).innerHTML);
                    }
                }
                if(cont == 0){
                    document.getElementById("prom4").innerHTML=0;
                }else{
                    //console.log("promedio ->" + (prom/cont).toFixed(2))
                    document.getElementById("prom4").innerHTML=(prom/cont).toFixed(2);
                }
               
            }

            function promediofinal(){
                let prom1= Number(document.getElementById("prom3").innerHTML);
                let prom2= Number(document.getElementById("prom4").innerHTML);

                let total=0;
                if(prom2!=0){
                    total=((prom1*0.7)+(prom2*0.3));
                    //console.log("primer if "+ total)
                    document.getElementById("total").innerHTML=total.toFixed(2)+"%";
                }else{
                    //console.log("else del if "+ total)
                    document.getElementById("total").innerHTML=prom1.toFixed(2)+"%";
                }
               
            }


</script>
@endsection
