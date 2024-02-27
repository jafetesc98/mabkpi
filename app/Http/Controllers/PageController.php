<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
   

}
