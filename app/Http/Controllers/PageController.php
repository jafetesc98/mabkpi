<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Distritos;
use App\Models\Preguntas;
use App\Models\Preghdr;
use App\Models\Pregdet;
use App\Models\Supervisor;
use App\Models\Comentarios;

class PageController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function dashboardOverview1()
    {
        return view('pages/dashboard-overview-1', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
        ]);
    }
    public function tablero()
    {
        $array = array('margen'=>"MARGEN MENOR A 4%", 
        'diferencia'=>"ULTIMAS ENTRADAS", 
        'botonesCapas'=>"CAPAS", 
        'ventas'=>"VENTAS X ART",
        'presupuesto'=>"PRESUPUESTO",
        'avance' =>"AVANCE X SUCURSAL",
        'evaluacion' =>"EVALUACION A SUCURSALES",
        'resultadosevaluacion' =>"RESULTADOS DE EVALUACION",
        );

        return view('pages/tablero')->with('array', $array);
    }

    public function prov()
    {
        $proveedor = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; SELECT proveedor, nom from cprprv order by proveedor asc");

        $array = json_decode(json_encode($proveedor), true); 

        $sucursales = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; SELECT ROW_NUMBER()OVER(ORDER BY suc)[row], suc, rtrim(des)[des]
        FROM comsuc WHERE Region <> '' 
        AND suc NOT IN ('054', '062', '064', '073', '074', '076', '078', '079')");

        $array1 = json_decode(json_encode($sucursales), true); 

        //return $resultado;
        return view('pages/ventas')->with('array', $array)->with('array1',$array1);
    }

    public function buscaventasxart(Request $request)
    {
        $prov = $request->input("proveedor");
        $fecha_ini = date('Ymd',strtotime($request->input("fecha_ini")));
        $fecha_fin = date('Ymd',strtotime($request->input("fecha_fin")));
        $suc = $request->input("suc");

        if($prov=="t"){
            $prov="";
        }
        if($suc=="t"){
            $suc="";
        }
        

        $resultado = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; Exec RCA_ComparativoProv_web '".$prov."' ,'".$fecha_ini."', '".$fecha_fin."', '".$suc."'");
        $array = json_decode(json_encode($resultado), true); 

        if($prov==""){
            $prov="Todos";
        }
        if($suc==""){
            $suc="Todas";
        }
        $array1=array(
            'f_ini'=> $fecha_ini, 
            'f_fin'=> $fecha_fin,
            'prov'=> $prov,
            'suc'=> $suc, 
           );
       //return $array;
       return view('pages/ventasxart')->with('array', $array)->with('array1',$array1);
    }

    public function presupuesto()
    {
        $resultado = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; SELECT ROW_NUMBER()OVER(ORDER BY suc)[row], suc, rtrim(des)[des]
        FROM comsuc WHERE Region <> '' 
        AND suc NOT IN ('054', '062', '064', '073', '074', '076', '078', '079')");

        $array = json_decode(json_encode($resultado), true); 

        //return $resultado;
        return view('pages/presupuestohdr')->with('array', $array);
    }

    public function presupuestoxsuc(Request $request)
    {
        $suc = $request->input("sucursal");
        $fecha = $request->input("fecha");
        $factor = $request->input("factor");

        $anio=substr($fecha, 0, 4);
        $mes=substr($fecha, 5, 7);

        $resultado = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; Exec RCA_PrsupuestosOp '".$suc."', '" .$anio."','".$mes."','".$factor."'");
        $array = json_decode(json_encode($resultado), true); 
        
        return view('pages/presupuestoxsuc')->with('array', $array)->with('suc',$suc);
        //return $array;
    }

    public function avancehdr(){
        $zona = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; SELECT * FROM mabzonas");
        $fechas = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; SELECT * FROM rcafechas");

        $array = json_decode(json_encode($zona), true); 
        $array1 = json_decode(json_encode($fechas), true); 

        return view('pages/avancexsuchdr')->with('array', $array)->with('array1',$array1);
    }

    public function avancexsuc(Request $request)
    {
        $zonaR = $request->input("zona");
        $fecha = $request->input("fecha");
        
        $zona=str_pad($zonaR, 30);
        $resultado = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; Exec RCA_AvanceXSucursal2 '".$fecha."', '" .$zona."'");
        $array = json_decode(json_encode($resultado), true); 

        $datos = array(
        'periodo'=>$array[0]['Periodo'],
        'zona'=>$zona, 
        );
        $array1 = json_decode(json_encode($datos), true); 
        //return $array1;
        return view('pages/avancexsucdet')->with('array', $array)->with('array1', $array1);
        //return $array;
    }


    public function botonesCapas()
    {
        $resultado = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; Exec RCA_Capas");
        $array = json_decode(json_encode($resultado), true); 

        $sumaValor1=0;
        $tArticulos1=0;

        $sumaValor2=0;
        $tArticulos2=0;

        $sumaValor3=0;
        $tArticulos3=0;

        $sumaValor4=0;
        $tArticulos4=0;

        $sumaValor5=0;
        $tArticulos5=0;

        for($i=0; $i<count($array); $i++){
            //print_r($array[1]['Proveedor']);
            if($array[$i]['Capa']==1 ){
                $sumaValor1+=$array[$i]['ValorInv$'];
                $tArticulos1+=1;
            } 
            if($array[$i]['Capa']==2 ){
                $sumaValor2+=$array[$i]['ValorInv$'];
                $tArticulos2+=1;
            } 
            if($array[$i]['Capa']==3 ){
                $sumaValor3+=$array[$i]['ValorInv$'];
                $tArticulos3+=1;
            } 
            if($array[$i]['Capa']==4 ){
                $sumaValor4+=$array[$i]['ValorInv$'];
                $tArticulos4+=1;
            } 
            if($array[$i]['Capa']==5 ){
                $sumaValor5+=$array[$i]['ValorInv$'];
                $tArticulos5+=1;
            } 
        }

        $array1=array(
            array(
                'Capa'=>"1", 
                'ValInv'=>round($sumaValor1,2), 
                'TotalArt'=>$tArticulos1,
            ),
            array(
                'Capa'=>"2", 
                'ValInv'=>round($sumaValor2,2), 
                'TotalArt'=>$tArticulos2,
            ),
            array(
                'Capa'=>"3", 
                'ValInv'=>round($sumaValor3,2), 
                'TotalArt'=>$tArticulos3,
            ),
            array(
                'Capa'=>"4", 
                'ValInv'=>round($sumaValor4,2), 
                'TotalArt'=>$tArticulos4,
            ),
            array(
                'Capa'=>"5", 
                'ValInv'=>round($sumaValor5,2), 
                'TotalArt'=>$tArticulos5,
            ));
            //$sumatotal=$sumaValor1+$sumaValor2+$sumaValor3+$sumaValor4+$sumaValor5;

        //return $array1;  

        return view('pages/btnCapas')->with('array', $array1);
    }

    public function margen()
    {
        date_default_timezone_set('America/Mexico_City');
        $fechaActual = date('Ymd');
        $yesterday = date( 'Ymd', strtotime( 'yesterday' ) );

        $resultado = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; exec RCA_MargenMenor '".$yesterday."', '" .$yesterday."'");
        $array = json_decode(json_encode($resultado), true);
        //return "nada";
        return view('pages/margen')->with('array',$array);
    }
    public function buscar(Request $request){
        //echo $request->input("ini");
        $fecha= date('Ymd',strtotime($request->input("ini")));
        $fecha1= date('Ymd',strtotime($request->input("fin")));
        
        $busqueda = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; exec RCA_MargenMenor '".$fecha."', '" .$fecha1."'");
        
        $array = json_decode(json_encode($busqueda), true);
        //return $array;
       return view('pages/margen')->with('array',$array);
    }
    
    public function diferencia()
    {
        date_default_timezone_set('America/Mexico_City');
        $fechaActual = date('Ymd');
        $yesterday = date( 'Ymd', strtotime( 'yesterday' ) );

        $resultado1 = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; exec RCA_UltEntDifPrecios '".$yesterday."', '" .$yesterday."','001','001C'");
        $array1 = json_decode(json_encode($resultado1), true);

        return view('pages/diferencia')->with('array1', $array1);

    }
    public function buscaDif(Request $request){
        //echo $request->input("ini");
        $fecha= date('Ymd',strtotime($request->input("ini")));
        $fecha1= date('Ymd',strtotime($request->input("fin")));
        $suc = $request->input("suc");
        $alm = $request->input("alm");

        $resultado1 = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; exec RCA_UltEntDifPrecios '".$fecha."', '" .$fecha1."','".$suc."','".$alm."'");
        $array1 = json_decode(json_encode($resultado1), true);

        return view('pages/diferencia')->with('array1', $array1);
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function capas()
    {
        $num=$_GET["num"];
         
        $resultado1 = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; Exec RCA_Capas");
        $array1 = json_decode(json_encode($resultado1), true);
        $groupCapas=array();

        //$arreglo = $this->array_sort($array1, 'Proveedor', SORT_ASC); 

         foreach ($array1 as $k => $capa) {
            if($capa['Capa']==$num){
                $groupCapas[] =$capa;
            }
            
            //$groupCapas[$capa['Capa']][$capa['Proveedor']][$k] =$capa;
        } 

        //return $groupCapas;  
        return view('pages/capas')->with('array', $groupCapas);
    }


function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

public function evaluacion(Request $request)
    {

        $puesto = $request->input("puesto");
        $nombre = $request->input("nombre");
        if($puesto == 'SUBOPERACI' || $puesto == 'DIRECCION'){
            
            $fecha3 = date("Ym")."01";
            $fecha4 = date("Ym")."05"; //aqui va hasta el 5 de cada mes 

        $busqueda2 = DB::select("SET NOCOUNT ON; select Suc,NomSuc from JEM_distritos a where Supervisor='".$nombre."' and Suc not in(select Suc from ResultPreghdr 
        where id_supervisor=a.ID and f_alt>='".$fecha3. "' and f_alt<='".$fecha4."'  and evaluacion=0) order by Suc asc");

        $array2 = json_decode(json_encode($busqueda2), true); 
        //return $array2;
        if(date("Ymd")>= date("Ym")."01" && date("Ymd")<= date("Ym")."05"){
            return view('pages/evaluacion')->with('array', $array2);
        }else{
            return view('pages/error-page');
        }
            

        }else{
        $nombre = $request->input("nombre");
        //return $nombre;

        //$suc = Distritos::where('Supervisor',$nombre)->select('Suc','NomSuc')->get()->toArray();
        $fecha1 = date("Ym")."15";
        $fecha2 = date("Ym")."20";

        $fecha3 = date("Ym")."01";
        $fecha4 = date("Ym")."05"; //aqui va hasta el 5 de cada mes 

        $busqueda1 = DB::select("SET NOCOUNT ON; select Suc,NomSuc from JEM_distritos a where Supervisor='".$nombre."' and Suc not in(select Suc from ResultPreghdr 
        where id_supervisor=a.ID and f_alt>='".$fecha1. "' and f_alt<='".$fecha2."'  and evaluacion=1)");

        $array = json_decode(json_encode($busqueda1), true); 

        $busqueda2 = DB::select("SET NOCOUNT ON; select Suc,NomSuc from JEM_distritos a where Supervisor='".$nombre."' and Suc not in(select Suc from ResultPreghdr 
        where id_supervisor=a.ID and f_alt>='".$fecha3. "' and f_alt<='".$fecha4."'  and evaluacion=2)");

        $array2 = json_decode(json_encode($busqueda2), true); 

        //return $busqueda2;
        

        if(date("Ymd")>= date("Ym")."15" && date("Ymd")<= date("Ym")."20"){
            return view('pages/evaluacion')->with('array', $array);
        }
        if(date("Ymd")>= date("Ym")."01" && date("Ymd")<= date("Ym")."05"){
            return view('pages/evaluacion')->with('array', $array2);
        }else{
            return view('pages/error-page');
        }
    }

        //return $arraysuc;
       
    }

    public function preguntas(Request $request)
    {
        //return $request->input("sucursal");
        $suc=$request->input("sucursal");
        $preguntas = Preguntas::where('status',1)->select('id','desPreg','tipo')->get()->toArray();

        //return $preguntas;
        
        if(date("Ymd")>= date("Ym")."15" && date("Ymd")<= date("Ym")."20"){
            return view('pages/preguntas')->with('array',$preguntas)->with("suc",$suc);
        }
        if(date("Ymd")>= date("Ym")."01" && date("Ymd")<= date("Ym")."05"){
            return view('pages/preguntas')->with('array',$preguntas)->with("suc",$suc);
        }
        else{
            return view('pages/error-page');
        }
    }

    public function error()
    {
        return view('pages/error-page');
    }

    public function resultados(Request $request)
    {
        $puesto = $request->input("puesto");
        $nombre = $request->input("usuario");
        $suc = $request->input("suc");
        $id=0;
        $comentarios=$request->input("comentarios");
        //return $puesto;
        $preguntas = Preguntas::where('status',1)
        ->select('id','desPreg','tipo')->get()->toArray();
        $idsup = Distritos::where('Supervisor',$nombre)->select('ID')->get()->first()->toArray();
        //return (int)$idsup['ID'];

        $cont=count($preguntas);

        //$arraypreg = array();

        $validar = Preghdr::where('ResultPreghdr.suc',$suc )
        ->where('ResultPreghdr.f_alt', date("Ymd"))
        ->where ('JEM_distritos.Supervisor',$nombre)
        ->join('JEM_distritos','ResultPreghdr.id_supervisor','=','JEM_distritos.ID')
        ->select('ResultPreghdr.ID')
        ->get()->toArray();

        //return $validar;
        //return count($validar);

        //return print_r(is_null($validar));
        if(count($validar)<1){
        //insertamos cabecera de preguntas 
        DB::beginTransaction();

        $preghdr = new Preghdr;
        $preghdr->suc = $suc;
        $preghdr->id_supervisor =(int)$idsup['ID'];
        $preghdr->f_alt = date("Ymd");
        $preghdr->h_alt = date("His");

        
        if(date("Ymd")>= date("Ym")."15" && date("Ymd")<= date("Ym")."20"){
            $preghdr->evaluacion = 1;
        }
        if(date("Ymd")>= date("Ym")."01" && date("Ymd")<= date("Ym")."05"){
            $preghdr->evaluacion = 2;
        }
        if(date("Ymd")>= date("Ym")."01" && date("Ymd")<= date("Ym")."05"  && $puesto=='SUBOPERACI' || $puesto=='DIRECCION'){
            $preghdr->evaluacion = 0;
        }

        try{
            $preghdr->save();
        }catch(Throwable $e){
            DB::rollBack();
            return response()->json(array(
                'code'      =>  421,
                'message'   =>  'Ocurrió un error al guardar, intentelo nuevamente',
                'error'     =>  'Ocurrió un error al guardar, intentelo nuevamente',
            ), 421);
        }

        //insertando cabecera

        if($comentarios != ""){
            $coment = new Comentarios;
            $coment->id_cabecera = $preghdr->id;
            $coment->comentario = strtoupper($comentarios);
            
            try{
                $coment->save();
             }catch(Throwable $e){
                 DB::rollBack();
                 return response()->json(array(
                     'code'      =>  421,
                     'message'   =>  'Ocurrió un error al guardar, intentelo nuevamente',
                     'error'     =>  'Ocurrió un error al guardar, intentelo nuevamente',
                 ), 421);
             }
        }
        

       
        //insertando detalle 
        $id=$preghdr->id;
        for($i = 1; $i <= $cont; $i++){
           // $cont=$cont+1;
            $cadena="pregunta".$i;
            $valor =$request->input($cadena);
            //$arraypreg[$i] = $valor;
            //return $valor;

            $pregdet = new Pregdet;
            $pregdet->id_cabecera = $preghdr->id;
            $pregdet->id_pregunta = $i;
            $pregdet->respuesta   = $valor;

            
            
            if($valor == 1){
                $pregdet->calificacion = 10;
            }else{
                $pregdet->calificacion = 5;
            }
           
            try{
               $pregdet->save();
            }catch(Throwable $e){
                DB::rollBack();
                return response()->json(array(
                    'code'      =>  421,
                    'message'   =>  'Ocurrió un error al guardar, intentelo nuevamente',
                    'error'     =>  'Ocurrió un error al guardar, intentelo nuevamente',
                ), 421);
            }
            
        }
        DB::commit();

        //$this->muestraRes($preghdr->id);
        //SE OBTIENE LOS RESULTADOS PARA MOSTRAR 
        $resultados = Pregdet::where('id_cabecera',$preghdr->id)
        ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
        ->select('ResultPregdet.id_cabecera','ResultPregdet.id_pregunta','ResultPregdet.calificacion','preguntas.desPreg','preguntas.tipo')
        ->get()->toArray();

        //return $resultados;

        $t_ventas=0;
        $c_ventas=0;

        $t_analisis=0;
        $c_analisis=0;

        $t_rh=0;
        $c_rh=0;

        $t_experiencia=0;
        $c_experiencia=0;
        
        $t_estandares=0;
        $c_estandares=0;
        
        $t_limpieza = 0;
        $c_limpieza=0;

        $t_perecederos=0;
        $c_perecederos=0;

        $t_contabilidad=0;
        $c_contabilidad=0;

        for($i=0; $i< count($resultados); $i++){
            if($resultados[$i]['tipo']=="VENTAS"){
                $t_ventas +=$resultados[$i]['calificacion'];
                $c_ventas +=1;
            }
            if($resultados[$i]['tipo']=="ANALISIS FINANCIERO"){
                $t_analisis +=$resultados[$i]['calificacion'];
                $c_analisis +=1;
            }
            if($resultados[$i]['tipo']=="RH"){
                $t_rh +=$resultados[$i]['calificacion'];
                $c_rh +=1;
            }
            if($resultados[$i]['tipo']=="EXPERIENCIA"){
                $t_experiencia +=$resultados[$i]['calificacion'];
                $c_experiencia +=1;
            }
            if($resultados[$i]['tipo']=="ESTANDARES DE MERCADERIA"){
                $t_estandares +=$resultados[$i]['calificacion'];
                $c_estandares +=1;
            }
            if($resultados[$i]['tipo']=="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)"){
                $t_limpieza +=$resultados[$i]['calificacion'];
                $c_limpieza +=1;
            }
            if($resultados[$i]['tipo']=="PERECEDEROS"){
                $t_perecederos +=$resultados[$i]['calificacion'];
                $c_perecederos +=1;
            }
            if($resultados[$i]['tipo']=="CONTABILIDAD"){
                $t_contabilidad +=$resultados[$i]['calificacion'];
                $c_contabilidad +=1;
            }
        }
        //return ($c_analisis);
        $r_ventas=($t_ventas*35)/($c_ventas*10);
        $r_analisis=($t_analisis*5)/($c_analisis*10);
        $r_rh=($t_rh*20)/($c_rh*10);
        $r_experiencia=($t_experiencia*10)/($c_experiencia*10);
        $r_estandares=($t_estandares*5)/($c_estandares*10);
        $r_limpieza=($t_limpieza*10)/($c_limpieza*10);
        $r_perecederos=($t_perecederos*10)/($c_perecederos*10);
        $r_contabilidad=($t_contabilidad*5)/($c_contabilidad*10);

        $array = array('VENTAS'=>round($r_ventas, 2), 
        'ANALISIS FINANCIERO'=>round($r_analisis, 2), 
        'RH'=>round($r_rh, 2), 
        'EXPERIENCIA'=>round($r_experiencia, 2),
        'ESTANDARES DE MERCADERIA'=>round($r_estandares, 2),
        'LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)' => round($r_limpieza, 2),
        'PERECEDEROS' => round($r_perecederos, 2),
        'CONTABILIDAD' =>round($r_contabilidad, 2),
        'SUC' => $suc
        );

        $array1 = array('cali_total'=>round($r_ventas, 2)+round($r_analisis, 2)+ round($r_rh, 2)+round($r_experiencia, 2)+
        round($r_estandares, 2)+round($r_limpieza, 2)+round($r_perecederos, 2)+round($r_contabilidad, 2)
        );


        //return $array;
        return view('pages/resultados')->with("array",$array)->with("array1",$array1)->with("id",$id);
        //return $arraypreg;
        }else{
             
            //$this->muestraRes($validar[0]['ID'],$suc);
            //SE OBTIENE LOS RESULTADOS PARA MOSTRAR 
            
        $resultados = Pregdet::where('id_cabecera',$validar[0]['ID'])
        ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
        ->select('ResultPregdet.id_cabecera','ResultPregdet.id_pregunta','ResultPregdet.calificacion','preguntas.desPreg','preguntas.tipo')
        ->get()->toArray();

        //return $resultados;

        $t_ventas=0;
        $c_ventas=0;

        $t_analisis=0;
        $c_analisis=0;

        $t_rh=0;
        $c_rh=0;

        $t_experiencia=0;
        $c_experiencia=0;
        
        $t_estandares=0;
        $c_estandares=0;
        
        $t_limpieza = 0;
        $c_limpieza=0;

        $t_perecederos=0;
        $c_perecederos=0;

        $t_contabilidad=0;
        $c_contabilidad=0;

        $id=$validar[0]['ID'];

        for($i=0; $i< count($resultados); $i++){
            if($resultados[$i]['tipo']=="VENTAS"){
                $t_ventas +=$resultados[$i]['calificacion'];
                $c_ventas +=1;
            }
            if($resultados[$i]['tipo']=="ANALISIS FINANCIERO"){
                $t_analisis +=$resultados[$i]['calificacion'];
                $c_analisis +=1;
            }
            if($resultados[$i]['tipo']=="RH"){
                $t_rh +=$resultados[$i]['calificacion'];
                $c_rh +=1;
            }
            if($resultados[$i]['tipo']=="EXPERIENCIA"){
                $t_experiencia +=$resultados[$i]['calificacion'];
                $c_experiencia +=1;
            }
            if($resultados[$i]['tipo']=="ESTANDARES DE MERCADERIA"){
                $t_estandares +=$resultados[$i]['calificacion'];
                $c_estandares +=1;
            }
            if($resultados[$i]['tipo']=="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)"){
                $t_limpieza +=$resultados[$i]['calificacion'];
                $c_limpieza +=1;
            }
            if($resultados[$i]['tipo']=="PERECEDEROS"){
                $t_perecederos +=$resultados[$i]['calificacion'];
                $c_perecederos +=1;
            }
            if($resultados[$i]['tipo']=="CONTABILIDAD"){
                $t_contabilidad +=$resultados[$i]['calificacion'];
                $c_contabilidad +=1;
            }
        }
        //return ($c_analisis);
        $r_ventas=($t_ventas*35)/($c_ventas*10);
        $r_analisis=($t_analisis*5)/($c_analisis*10);
        $r_rh=($t_rh*20)/($c_rh*10);
        $r_experiencia=($t_experiencia*10)/($c_experiencia*10);
        $r_estandares=($t_estandares*5)/($c_estandares*10);
        $r_limpieza=($t_limpieza*10)/($c_limpieza*10);
        $r_perecederos=($t_perecederos*10)/($c_perecederos*10);
        $r_contabilidad=($t_contabilidad*5)/($c_contabilidad*10);

        $array = array('VENTAS'=>round($r_ventas, 2), 
        'ANALISIS FINANCIERO'=>round($r_analisis, 2), 
        'RH'=>round($r_rh, 2), 
        'EXPERIENCIA'=>round($r_experiencia, 2),
        'ESTANDARES DE MERCADERIA'=>round($r_estandares, 2),
        'LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)' => round($r_limpieza, 2),
        'PERECEDEROS' => round($r_perecederos, 2),
        'CONTABILIDAD' =>round($r_contabilidad, 2),
        'SUC' => $suc
        );

        $array1 = array('cali_total'=>round($r_ventas, 2)+round($r_analisis, 2)+ round($r_rh, 2)+round($r_experiencia, 2)+
        round($r_estandares, 2)+round($r_limpieza, 2)+round($r_perecederos, 2)+round($r_contabilidad, 2)
        );


        //return $array;
        return view('pages/resultados')->with("array",$array)->with("array1",$array1)->with("id",$id);
        }
    }

    public function resultadosevaluacion()
    {
        $sup = Distritos::where('ID','!=','11')
        ->where('ID','!=','12')
        ->select('Supervisor','ID')->distinct()->orderBy('ID','ASC')->get()->toArray();
        //return $sup;
        return view('pages/resultadosevaluacion')->with("array",$sup);
    }

    public function muestraresultados(Request $request)
    {
        $nombre= $request->input("supervisor");
        $super = Distritos::where('ID',$nombre)
        ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

        $mes = date('Ym',strtotime($request->input("mes")));

        $anio = date('Y',strtotime($request->input("mes")));
        $mes2=date('m',strtotime($request->input("mes")));

        if($mes2==12){
            $anio=$anio+1;
            $mes2=0;
        }

        if($mes2>=10){
            $mes3=$anio.$mes2+1;
        }else{
            $mes3=$anio.'0'.$mes2+1;
        }
        
        if($nombre==0){
            $todo = Preghdr::where('ResultPreghdr.f_alt', '>=',$mes.'15')
            ->where('ResultPreghdr.f_alt','<=',$mes3.'05')
            //->where('ResultPreghdr.evaluacion',1)
            ->join('ResultPregdet','ResultPregdet.id_cabecera','=','ResultPreghdr.ID')
            ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
            ->select('ResultPreghdr.suc','ResultPreghdr.id_supervisor','ResultPreghdr.evaluacion','ResultPregdet.id_pregunta','ResultPregdet.respuesta','ResultPregdet.calificacion','preguntas.tipo')
            ->get()->toArray();

            $dis1 = Distritos::where('ID',1)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis2 = Distritos::where('ID',2)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis3 = Distritos::where('ID',3)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis4 = Distritos::where('ID',4)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis5 = Distritos::where('ID',5)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis6 = Distritos::where('ID',6)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();
            $array6 = array();

            $dis7 = Distritos::where('ID',7)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis8 = Distritos::where('ID',8)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis9 = Distritos::where('ID',9)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis10 = Distritos::where('ID',10)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();
            
            $dis11 = Distritos::where('ID',11)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis12 = Distritos::where('ID',12)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray();

            $dis1ev1 = $this->calificaciones($dis1,$todo,1);
            $dis1ev2 = $this->calificaciones($dis1,$todo,2);

            $dis2ev1 = $this->calificaciones($dis2,$todo,1);
            $dis2ev2 = $this->calificaciones($dis2,$todo,2);

            $dis3ev1 = $this->calificaciones($dis3,$todo,1);
            $dis3ev2 = $this->calificaciones($dis3,$todo,2);

            $dis4ev1 = $this->calificaciones($dis4,$todo,1);
            $dis4ev2 = $this->calificaciones($dis4,$todo,2);

            $dis5ev1 = $this->calificaciones($dis5,$todo,1);
            $dis5ev2 = $this->calificaciones($dis5,$todo,2);

            $dis6ev1 = $this->calificaciones($dis6,$todo,1);
            $dis6ev2 = $this->calificaciones($dis6,$todo,2);

            $dis7ev1 = $this->calificaciones($dis7,$todo,1);
            $dis7ev2 = $this->calificaciones($dis7,$todo,2);

            $dis8ev1 = $this->calificaciones($dis8,$todo,1);
            $dis8ev2 = $this->calificaciones($dis8,$todo,2);

            $dis9ev1 = $this->calificaciones($dis9,$todo,1);
            $dis9ev2 = $this->calificaciones($dis9,$todo,2);

            $dis10ev1 = $this->calificaciones($dis10,$todo,1);
            $dis10ev2 = $this->calificaciones($dis10,$todo,2);

            $dis11ev0 = $this->calificaciones($dis11,$todo,0);

            $distrito1=  array('evaluacion1'=>$dis1ev1, 'evaluacion2' => $dis1ev2);
            $distrito2=  array('evaluacion1'=>$dis2ev1, 'evaluacion2' => $dis2ev2);
            $distrito3=  array('evaluacion1'=>$dis3ev1, 'evaluacion2' => $dis3ev2);
            $distrito4=  array('evaluacion1'=>$dis4ev1, 'evaluacion2' => $dis4ev2);
            $distrito5=  array('evaluacion1'=>$dis5ev1, 'evaluacion2' => $dis5ev2);
            $distrito6=  array('evaluacion1'=>$dis6ev1, 'evaluacion2' => $dis6ev2);
            $distrito7=  array('evaluacion1'=>$dis7ev1, 'evaluacion2' => $dis7ev2);
            $distrito8=  array('evaluacion1'=>$dis8ev1, 'evaluacion2' => $dis8ev2);
            $distrito9=  array('evaluacion1'=>$dis9ev1, 'evaluacion2' => $dis9ev2);
            $distrito10=  array('evaluacion1'=>$dis10ev1, 'evaluacion2' => $dis10ev2);

            $resfinal= array('dis1'=>$distrito1,'dis2'=>$distrito2,'dis3'=>$distrito3,'dis4'=>$distrito4,'dis5'=>$distrito5,'dis6'=>$distrito6,
            'dis7'=>$distrito7,'dis8'=>$distrito8,'dis9'=>$distrito9,'dis10'=>$distrito10);
            
            
            //return $dis11ev0;

            $fechas= array('f_ini'=>$mes,'f_fin'=>$mes3);

            return view('pages/resultadosglobales')->with("array",$resfinal)->with('dis1',$dis1)->with('dis2',$dis2)->with('dis3',$dis3)->with('dis4',$dis4)->with('dis5',$dis5)
            ->with('dis6',$dis6)->with('dis7',$dis7)->with('dis8',$dis8)->with('dis9',$dis9)->with('dis10',$dis10)->with('jefesup',$dis11ev0)->with('fechas',$fechas);

        }else{
        //return $request;

    //aqui empieza las operaciones del resultado 1
        $resultado1 = Preghdr::where('ResultPreghdr.id_supervisor',$nombre)
         ->where('ResultPreghdr.f_alt', '>=',$mes.'15')
         ->where('ResultPreghdr.f_alt','<=',$mes.'20')
         ->where('ResultPreghdr.evaluacion',1)
         ->join('ResultPregdet','ResultPregdet.id_cabecera','=','ResultPreghdr.ID')
         ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
         ->select('ResultPreghdr.suc','ResultPreghdr.id_supervisor','ResultPreghdr.evaluacion','ResultPregdet.id_pregunta','ResultPregdet.respuesta','ResultPregdet.calificacion','preguntas.tipo')
         ->get()->toArray();

         

         $array = array();
        
         for($i=0;$i<count($super);$i++){
            $total=0;
            $r_ventas=0;
            $r_analisis=0;
            $r_rh=0;
            $r_experiencia=0;
            $r_estandares=0;
            $r_limpieza=0;
            $r_perecederos=0;
            $r_contabilidad=0;
            $t_ventas=0;
            $c_ventas=0;
            $t_analisis=0;
            $c_analisis=0;
            $t_rh=0;
            $c_rh=0;
            $t_experiencia=0;
            $c_experiencia=0;
            $t_estandares=0;
            $c_estandares=0;
            $t_limpieza = 0;
            $c_limpieza=0;
            $t_perecederos=0;
            $c_perecederos=0;
            $t_contabilidad=0;
            $c_contabilidad=0;

            $status=0;

            for($k=0; $k<count($resultado1);$k++){
               //return $resultado1[$k]['suc'];
                if($super[$i]['Suc']==$resultado1[$k]['suc']){
                    $status=1;
                    if($resultado1[$k]['tipo']=="VENTAS"){
                        //return "entre si es ventas";
                        $t_ventas +=$resultado1[$k]['calificacion'];
                        $c_ventas +=1;
                    }
                    if($resultado1[$k]['tipo']=="ANALISIS FINANCIERO"){
                        $t_analisis +=$resultado1[$k]['calificacion'];
                        $c_analisis +=1;
                    }
                    if($resultado1[$k]['tipo']=="RH"){
                        $t_rh +=$resultado1[$k]['calificacion'];
                        $c_rh +=1;
                    }
                    if($resultado1[$k]['tipo']=="EXPERIENCIA"){
                        $t_experiencia +=$resultado1[$k]['calificacion'];
                        $c_experiencia +=1;
                    }
                    if($resultado1[$k]['tipo']=="ESTANDARES DE MERCADERIA"){
                        $t_estandares +=$resultado1[$k]['calificacion'];
                        $c_estandares +=1;
                    }
                    if($resultado1[$k]['tipo']=="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)"){
                        $t_limpieza +=$resultado1[$k]['calificacion'];
                        $c_limpieza +=1;
                    }
                    if($resultado1[$k]['tipo']=="PERECEDEROS"){
                        $t_perecederos +=$resultado1[$k]['calificacion'];
                        $c_perecederos +=1;
                    }
                    if($resultado1[$k]['tipo']=="CONTABILIDAD"){
                        $t_contabilidad +=$resultado1[$k]['calificacion'];
                        $c_contabilidad +=1;
                    }
                }else{
                    continue;
                }
                //return $c_ventas;
            }

            if($status==1){
                $r_ventas=($t_ventas*35)/($c_ventas*10);
                $r_analisis=($t_analisis*5)/($c_analisis*10);
                $r_rh=($t_rh*20)/($c_rh*10);
                $r_experiencia=($t_experiencia*10)/($c_experiencia*10);
                $r_estandares=($t_estandares*5)/($c_estandares*10);
                $r_limpieza=($t_limpieza*10)/($c_limpieza*10);
                $r_perecederos=($t_perecederos*10)/($c_perecederos*10);
                $r_contabilidad=($t_contabilidad*5)/($c_contabilidad*10);

                $total=round($r_ventas, 2)+round($r_analisis, 2)+ round($r_rh, 2)+round($r_experiencia, 2)+
                round($r_estandares, 2)+round($r_limpieza, 2)+round($r_perecederos, 2)+round($r_contabilidad, 2);

                $datos = array('suc'=>$super[$i]['Suc'],
                'total'=>$total);
                
                array_push($array, $datos);
            }           
            
         }

         //Aqui comienza las operaciones del resultado 2

         $resultado2 = Preghdr::where('ResultPreghdr.id_supervisor',$nombre)
         ->where('ResultPreghdr.f_alt', '>=',$mes3.'01')
         ->where('ResultPreghdr.f_alt','<=',$mes3.'05')
         ->where('ResultPreghdr.evaluacion',2)
         ->join('ResultPregdet','ResultPregdet.id_cabecera','=','ResultPreghdr.ID')
         ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
         ->select('ResultPreghdr.suc','ResultPreghdr.id_supervisor','ResultPreghdr.evaluacion','ResultPregdet.id_pregunta','ResultPregdet.respuesta','ResultPregdet.calificacion','preguntas.tipo')
         ->get()->toArray();

         //return $resultado2;
         
         $array2 = array();
        
         for($i=0;$i<count($super);$i++){
            $total=0;
            $r_ventas=0;
            $r_analisis=0;
            $r_rh=0;
            $r_experiencia=0;
            $r_estandares=0;
            $r_limpieza=0;
            $r_perecederos=0;
            $r_contabilidad=0;
            $t_ventas=0;
            $c_ventas=0;
            $t_analisis=0;
            $c_analisis=0;
            $t_rh=0;
            $c_rh=0;
            $t_experiencia=0;
            $c_experiencia=0;
            $t_estandares=0;
            $c_estandares=0;
            $t_limpieza = 0;
            $c_limpieza=0;
            $t_perecederos=0;
            $c_perecederos=0;
            $t_contabilidad=0;
            $c_contabilidad=0;

            $status=0;

            for($k=0; $k<count($resultado2);$k++){
               //return $resultado1[$k]['suc'];
                if($super[$i]['Suc']==$resultado2[$k]['suc']){
                    //return "entra condicion si suc son iguales";
                    $status=1;
                    if($resultado2[$k]['tipo']=="VENTAS"){
                        //return "entre si es ventas";
                        $t_ventas +=$resultado2[$k]['calificacion'];
                        $c_ventas +=1;
                    }
                    if($resultado2[$k]['tipo']=="ANALISIS FINANCIERO"){
                        $t_analisis +=$resultado2[$k]['calificacion'];
                        $c_analisis +=1;
                    }
                    if($resultado2[$k]['tipo']=="RH"){
                        $t_rh +=$resultado2[$k]['calificacion'];
                        $c_rh +=1;
                    }
                    if($resultado2[$k]['tipo']=="EXPERIENCIA"){
                        $t_experiencia +=$resultado2[$k]['calificacion'];
                        $c_experiencia +=1;
                    }
                    if($resultado2[$k]['tipo']=="ESTANDARES DE MERCADERIA"){
                        $t_estandares +=$resultado2[$k]['calificacion'];
                        $c_estandares +=1;
                    }
                    if($resultado2[$k]['tipo']=="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)"){
                        $t_limpieza +=$resultado2[$k]['calificacion'];
                        $c_limpieza +=1;
                    }
                    if($resultado2[$k]['tipo']=="PERECEDEROS"){
                        $t_perecederos +=$resultado2[$k]['calificacion'];
                        $c_perecederos +=1;
                    }
                    if($resultado2[$k]['tipo']=="CONTABILIDAD"){
                        $t_contabilidad +=$resultado2[$k]['calificacion'];
                        $c_contabilidad +=1;
                    }
                }else{
                    continue;
                }
                //return $c_ventas;
            }
            if($status==1){
                $r_ventas=($t_ventas*35)/($c_ventas*10);
                $r_analisis=($t_analisis*5)/($c_analisis*10);
                $r_rh=($t_rh*20)/($c_rh*10);
                $r_experiencia=($t_experiencia*10)/($c_experiencia*10);
                $r_estandares=($t_estandares*5)/($c_estandares*10);
                $r_limpieza=($t_limpieza*10)/($c_limpieza*10);
                $r_perecederos=($t_perecederos*10)/($c_perecederos*10);
                $r_contabilidad=($t_contabilidad*5)/($c_contabilidad*10);

                $total=round($r_ventas, 2)+round($r_analisis, 2)+ round($r_rh, 2)+round($r_experiencia, 2)+
                round($r_estandares, 2)+round($r_limpieza, 2)+round($r_perecederos, 2)+round($r_contabilidad, 2);

                $datos = array('suc'=>$super[$i]['Suc'],
                'total'=>round($total,2));
                
                array_push($array2, $datos);
            }           
         }

         //return $sucursales;

         //aqui empieza las operaciones del resultado del supervisor de supervisores
         $sucursales = Preghdr::where('f_alt', '>=',$mes3.'01')
         ->where('f_alt','<=',$mes3.'05')
         ->where('id_supervisor',$nombre)
         ->select('Suc')->get()->toArray();

         $resultado3 = Preghdr::where('ResultPreghdr.id_supervisor',11)
         ->orwhere('ResultPreghdr.id_supervisor',12)
         ->whereIn('ResultPreghdr.Suc', $sucursales)
         ->where('ResultPreghdr.f_alt', '>=',$mes3.'01')
         ->where('ResultPreghdr.f_alt','<=',$mes3.'05')
         ->where('ResultPreghdr.evaluacion',0)
         ->join('ResultPregdet','ResultPregdet.id_cabecera','=','ResultPreghdr.ID')
         ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
         ->select('ResultPreghdr.suc','ResultPreghdr.id_supervisor','ResultPreghdr.evaluacion','ResultPregdet.id_pregunta','ResultPregdet.respuesta','ResultPregdet.calificacion','preguntas.tipo')
         ->get()->toArray();

         $array3 = array();
        
         for($i=0;$i<count($super);$i++){
            $total=0;
            $r_ventas=0;
            $r_analisis=0;
            $r_rh=0;
            $r_experiencia=0;
            $r_estandares=0;
            $r_limpieza=0;
            $r_perecederos=0;
            $r_contabilidad=0;
            $t_ventas=0;
            $c_ventas=0;
            $t_analisis=0;
            $c_analisis=0;
            $t_rh=0;
            $c_rh=0;
            $t_experiencia=0;
            $c_experiencia=0;
            $t_estandares=0;
            $c_estandares=0;
            $t_limpieza = 0;
            $c_limpieza=0;
            $t_perecederos=0;
            $c_perecederos=0;
            $t_contabilidad=0;
            $c_contabilidad=0;

            $status=0;

            for($k=0; $k<count($resultado3);$k++){
               //return $resultado1[$k]['suc'];
                if($super[$i]['Suc']==$resultado3[$k]['suc']){
                    //return "entra condicion si suc son iguales";
                    $status=1;
                    if($resultado3[$k]['tipo']=="VENTAS"){
                        //return "entre si es ventas";
                        $t_ventas +=$resultado3[$k]['calificacion'];
                        $c_ventas +=1;
                    }
                    if($resultado3[$k]['tipo']=="ANALISIS FINANCIERO"){
                        $t_analisis +=$resultado3[$k]['calificacion'];
                        $c_analisis +=1;
                    }
                    if($resultado3[$k]['tipo']=="RH"){
                        $t_rh +=$resultado3[$k]['calificacion'];
                        $c_rh +=1;
                    }
                    if($resultado3[$k]['tipo']=="EXPERIENCIA"){
                        $t_experiencia +=$resultado3[$k]['calificacion'];
                        $c_experiencia +=1;
                    }
                    if($resultado3[$k]['tipo']=="ESTANDARES DE MERCADERIA"){
                        $t_estandares +=$resultado3[$k]['calificacion'];
                        $c_estandares +=1;
                    }
                    if($resultado3[$k]['tipo']=="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)"){
                        $t_limpieza +=$resultado3[$k]['calificacion'];
                        $c_limpieza +=1;
                    }
                    if($resultado3[$k]['tipo']=="PERECEDEROS"){
                        $t_perecederos +=$resultado3[$k]['calificacion'];
                        $c_perecederos +=1;
                    }
                    if($resultado3[$k]['tipo']=="CONTABILIDAD"){
                        $t_contabilidad +=$resultado3[$k]['calificacion'];
                        $c_contabilidad +=1;
                    }
                }else{
                    continue;
                }
                //return $c_ventas;
            }
            if($status==1){
                $r_ventas=($t_ventas*35)/($c_ventas*10);
                $r_analisis=($t_analisis*5)/($c_analisis*10);
                $r_rh=($t_rh*20)/($c_rh*10);
                $r_experiencia=($t_experiencia*10)/($c_experiencia*10);
                $r_estandares=($t_estandares*5)/($c_estandares*10);
                $r_limpieza=($t_limpieza*10)/($c_limpieza*10);
                $r_perecederos=($t_perecederos*10)/($c_perecederos*10);
                $r_contabilidad=($t_contabilidad*5)/($c_contabilidad*10);

                $total=round($r_ventas, 2)+round($r_analisis, 2)+ round($r_rh, 2)+round($r_experiencia, 2)+
                round($r_estandares, 2)+round($r_limpieza, 2)+round($r_perecederos, 2)+round($r_contabilidad, 2);

                $datos = array('suc'=>$super[$i]['Suc'],
                'total'=>round($total,2));
                
                array_push($array3, $datos);
            }           
         }
         $fechas= array('f_ini'=>$mes,'f_fin'=>$mes3);
        //return $array3;
        //return $fechas;
        return view('pages/muestraresultados')->with("array",$super)->with("array1",$array)->with("array2",$array2)->with("array3",$array3)->with('fechas',$fechas);
        }
    }
    public function calificaciones($distrito, $datos, $evaluacion){
        $array = array();
        for($i=0; $i<count($distrito);$i++){
            $total=0;
            $r_ventas=0;
            $r_analisis=0;
            $r_rh=0;
            $r_experiencia=0;
            $r_estandares=0;
            $r_limpieza=0;
            $r_perecederos=0;
            $r_contabilidad=0;
            $t_ventas=0;
            $c_ventas=0;
            $t_analisis=0;
            $c_analisis=0;
            $t_rh=0;
            $c_rh=0;
            $t_experiencia=0;
            $c_experiencia=0;
            $t_estandares=0;
            $c_estandares=0;
            $t_limpieza = 0;
            $c_limpieza=0;
            $t_perecederos=0;
            $c_perecederos=0;
            $t_contabilidad=0;
            $c_contabilidad=0;

            $status=0;

            for($k=0; $k<count($datos);$k++){
                //return $resultado1[$k]['suc'];
                if($distrito[$i]['Suc']==$datos[$k]['suc'] && $datos[$k]['evaluacion']==$evaluacion){
                    $status=1;
                    if($datos[$k]['tipo']=="VENTAS"){
                        //return "entre si es ventas";
                        $t_ventas +=$datos[$k]['calificacion'];
                        $c_ventas +=1;
                    }
                    if($datos[$k]['tipo']=="ANALISIS FINANCIERO"){
                        $t_analisis +=$datos[$k]['calificacion'];
                        $c_analisis +=1;
                    }
                    if($datos[$k]['tipo']=="RH"){
                        $t_rh +=$datos[$k]['calificacion'];
                        $c_rh +=1;
                    }
                    if($datos[$k]['tipo']=="EXPERIENCIA"){
                        $t_experiencia +=$datos[$k]['calificacion'];
                        $c_experiencia +=1;
                    }
                    if($datos[$k]['tipo']=="ESTANDARES DE MERCADERIA"){
                        $t_estandares +=$datos[$k]['calificacion'];
                        $c_estandares +=1;
                    }
                    if($datos[$k]['tipo']=="LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)"){
                        $t_limpieza +=$datos[$k]['calificacion'];
                        $c_limpieza +=1;
                    }
                    if($datos[$k]['tipo']=="PERECEDEROS"){
                        $t_perecederos +=$datos[$k]['calificacion'];
                        $c_perecederos +=1;
                    }
                    if($datos[$k]['tipo']=="CONTABILIDAD"){
                        $t_contabilidad +=$datos[$k]['calificacion'];
                        $c_contabilidad +=1;
                    }
                }else{
                    continue;
                }
                //return $c_ventas;
            }

            if($status==1){
                $r_ventas=($t_ventas*35)/($c_ventas*10);
                $r_analisis=($t_analisis*5)/($c_analisis*10);
                $r_rh=($t_rh*20)/($c_rh*10);
                $r_experiencia=($t_experiencia*10)/($c_experiencia*10);
                $r_estandares=($t_estandares*5)/($c_estandares*10);
                $r_limpieza=($t_limpieza*10)/($c_limpieza*10);
                $r_perecederos=($t_perecederos*10)/($c_perecederos*10);
                $r_contabilidad=($t_contabilidad*5)/($c_contabilidad*10);

                $total=round($r_ventas, 2)+round($r_analisis, 2)+ round($r_rh, 2)+round($r_experiencia, 2)+
                round($r_estandares, 2)+round($r_limpieza, 2)+round($r_perecederos, 2)+round($r_contabilidad, 2);

                $res = array('suc'=>$distrito[$i]['Suc'],
                'total'=>round($total,2),'evaluacion'=>$evaluacion);
                
                array_push($array, $res);
            }           
        }
        return $array;
    }
    public function verConfiguracion(){
        $preguntas = Preguntas::where('status',1)
        ->select('id','desPreg','tipo','status')
        ->orderBy('tipo','DESC')
        ->get()->toArray();

        //return collect([0, 1, 1])->random(1);
        //return $tipos;
    return view('pages/configuracionpreguntas')->with('array',$preguntas);
    }

    public function configuracion(){
            $preguntas = Preguntas::where('status',1)
            ->select('id','desPreg','tipo','status')
            ->orderBy('tipo','DESC')
            ->get()->toArray();

            //return collect([0, 1, 1])->random(1);
            //return $tipos;
        return view('pages/configuracionpreguntas')->with('array',$preguntas);
    }

    public function editarpreg(Request $request){
        $id= $request->input('pregunta');

        $pregunta = Preguntas::where('id',$id)
        ->select('id','desPreg','tipo','status')
        ->get()->toArray();
        
        $tipos = Preguntas::where('status',1)
            ->select('tipo')->distinct()
            ->get()->toArray();

        //return collect([0, 1, 1])->random(1);
        //return $pregunta;
    return view('pages/editapregunta')->with('array',$pregunta)->with('tipos',$tipos);
    }

    public function acturalizapreg(Request $request){

        $id = $request->input('id');
        $preg = $request->input('pregunta');
        $tipo = $request->input('tipo');
        $user = $request->input('user');

        $status = $request->input('status');

        $pregunta = Preguntas::where('id',$id)->first();
        //return $status;
        if($status ==1){
            DB::beginTransaction();

            $pregunta->desPreg = strtoupper($preg);
            $pregunta->tipo = $tipo;
            $pregunta->f_mod = date("Ymd");
            $pregunta->h_mod = date("Hms");
            $pregunta->u_mod = $user;
            $pregunta->status = $status;
    
    
             try{
                $pregunta->save();
            }catch(Throwable $e){
                DB::rollBack();
                return response()->json(array(
                    'code'      =>  421,
                    'message'   =>  'Ocurrió un error al guardar, intentelo nuevamente',
                    'error'     =>  'Ocurrió un error al guardar, intentelo nuevamente',
                ), 421);
            }
            DB::commit();
    
            $preguntas = Preguntas::select('id','desPreg','tipo','status')
                ->orderBy('tipo','DESC')
                ->get()->toArray();
    
                //return collect([0, 1, 1])->random(1);
                //return $tipos;
            return redirect('verconfiguracion');
        }else{
        //return $pregunta; 

        DB::beginTransaction();

        $pregunta->desPreg = strtoupper($preg);
        $pregunta->tipo = $tipo;
        $pregunta->f_mod = date("Ymd");
        $pregunta->h_mod = date("Hms");
        $pregunta->u_mod = $user;


         try{
            $pregunta->save();
        }catch(Throwable $e){
            DB::rollBack();
            return response()->json(array(
                'code'      =>  421,
                'message'   =>  'Ocurrió un error al guardar, intentelo nuevamente',
                'error'     =>  'Ocurrió un error al guardar, intentelo nuevamente',
            ), 421);
        }
        DB::commit();

        $preguntas = Preguntas::select('id','desPreg','tipo','status')
            ->orderBy('tipo','DESC')
            ->get()->toArray();

            //return collect([0, 1, 1])->random(1);
            //return $tipos;
        return redirect('verconfiguracion');
    }
    }
    public function eliminapreg(Request $request){
        $id = $request->input('pregunta');
        $user = $request->input('nom');

        $pregunta = Preguntas::where('id',$id)->first();

        //return $pregunta; 

        DB::beginTransaction();

        $pregunta->f_mod = date("Ymd");
        $pregunta->h_mod = date("Hms");
        $pregunta->u_mod = $user;
        $pregunta->status = 0;


         try{
            $pregunta->save();
        }catch(Throwable $e){
            DB::rollBack();
            return response()->json(array(
                'code'      =>  421,
                'message'   =>  'Ocurrió un error al guardar, intentelo nuevamente',
                'error'     =>  'Ocurrió un error al guardar, intentelo nuevamente',
            ), 421);
        }
        DB::commit();

        return redirect('verconfiguracion');
    }

    public function verpregunta(){
        $tipos = Preguntas::where('status',1)
            ->select('tipo')->distinct()
            ->get()->toArray();

        return view('pages/agregarpregunta')->with('tipos',$tipos);
    }

    public function guardapregunta(Request $request){
        $preg = $request->input('pregunta');
        $tipo = $request->input('tipo');
        $user = $request->input('user');

        //return $request;

        DB::beginTransaction();
        $pregunta = new Preguntas;
        $pregunta->desPreg = strtoupper($preg);
        $pregunta->tipo = $tipo;
        $pregunta->f_alt = date('Ymd');
        $pregunta->h_alt = date('Hms');
        $pregunta->u_alt = $user;
        $pregunta->f_mod = date('Ymd');
        $pregunta->h_mod = date('Hms');
        $pregunta->u_mod = $user;
        $pregunta->status = 1;

        try{
            $pregunta->save();
        }catch(Throwable $e){
            DB::rollBack();
            return response()->json(array(
                'code'      =>  421,
                'message'   =>  'Ocurrió un error al guardar, intentelo nuevamente',
                'error'     =>  'Ocurrió un error al guardar, intentelo nuevamente',
            ), 421);
        }
        DB::commit();

        $preguntas = Preguntas::select('id','desPreg','tipo','status')
            ->orderBy('tipo','DESC')
            ->get()->toArray();

        return redirect('verconfiguracion');
    }

    public function asignasup(){
        $sup = Supervisor::where('id','!=',11)
        ->where('id','!=',12)->select('id','nombre')->get()->toArray();
        $dis = Distritos::where('ID','!=',11)
        ->where('ID','!=',12)->select('ID','Supervisor','id_supervisor')->distinct()->get()->toArray();

        //return $dis;
        return view('pages/asignasup')->with('supervisor',$sup)->with('distritos',$dis);
    }

    public function actualizasup(Request $request){
        
        for($i=1; $i<=10;$i++){
            $sup = Supervisor::where('id',$request['d'.+$i])->select('id','nombre')->get()->toArray();
            
            $distritos = Distritos::where('id',$i)->get()->toArray();
            $idsup=$sup[0]['id'];
            $nombre = $sup[0]['nombre'];
            //$descargaP=DB::select("SET NOCOUNT ON; exec JEM_buscaPromDesAtra");
            $resultado = DB::update("SET NOCOUNT ON; update distritos set id_supervisor=".$idsup.", Supervisor='".$nombre."' where ID=".$i);
            //return $sup[0]['id'];

        }
        /* $distritos = Distritos::where('id',1)->get()->toArray();
        $dis = Distritos::where('ID','!=',11)
            ->where('ID','!=',12)->select('ID')->distinct()->get()->toArray();
 */
        //$sup = Supervisor::where('id',)->select('id','nombre')->get()->toArray();

        //$distritos = Distritos::get()->toArray();
        return redirect('asignasup');
    }

}