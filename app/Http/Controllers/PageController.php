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
        'capas'=>"CAPAS", 
        'totales'=>"TOTALES",
        );

        return view('pages/tablero')->with('array', $array);
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
         $array=array(
         array(
            'Num'=>"1", 
            'Comprador'=>"REYNA GARCIA ", 
            'Clas'=>"B ",
            'Proveedor'=>"000001667 JUAN MANUEL RUIZ TRINIDAD",
            'Codigo'=>"10016", 
            'Descripcion'=>"TOSTADA MINI BOTANERA 1000 g", 
            'Presentacion'=>"1/1",
            'VtaMens'=>"28.00",
            'VtaProm'=>"16.3333", 
            'Existencia'=>"3.00", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"1612.80",
            'VtaProm$'=>"940.80", 
            'ValorInv$'=>"136.50", 
            'DiasInv'=>"4.40800",
            'Cto_Prom'=>"45.50",
            'Cto_Catalogo'=>"42.00", 
            'Capa'=>"1", 
            'Capas'=>"CAPA 1  HASTA 30 DIAS",
            'UltimaEnt'=>"20230706",
            'DiasTrans'=>"13", 
            'Alm'=>"036", 
            'Compra'=>"  036-1398",
        ),
        array(
            'Num'=>"1", 
            'Comprador'=>"REYNA GARCIA ", 
            'Clas'=>"Z ",
            'Proveedor'=>"000001667 JUAN MANUEL RUIZ TRINIDAD",
            'Codigo'=>"10016", 
            'Descripcion'=>"PRUEBAS 1000 g", 
            'Presentacion'=>"1/1",
            'VtaMens'=>"28.00",
            'VtaProm'=>"16.3333", 
            'Existencia'=>"3.00", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"1612.80",
            'VtaProm$'=>"940.80", 
            'ValorInv$'=>"136.50", 
            'DiasInv'=>"4.40800",
            'Cto_Prom'=>"45.50",
            'Cto_Catalogo'=>"42.00", 
            'Capa'=>"1", 
            'Capas'=>"CAPA 1  HASTA 30 DIAS",
            'UltimaEnt'=>"20230706",
            'DiasTrans'=>"13", 
            'Alm'=>"036", 
            'Compra'=>"  036-1398",
        ),
        array(
            'Num'=>"1", 
            'Comprador'=>"MIYOSHI SANTI", 
            'Clas'=>"W",
            'Proveedor'=>"000000159 PRODUCTOS ALIMENTICIOS LA MODERNA, S.A DE C.V.",
            'Codigo'=>"10037", 
            'Descripcion'=>"GALLETA RIKIS MODERNA ROLLO 95 G", 
            'Presentacion'=>"20/95",
            'VtaMens'=>"0.00",
            'VtaProm'=>"0.00", 
            'Existencia'=>"0.00", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"0.00",
            'VtaProm$'=>"0.00", 
            'ValorInv$'=>"0.00", 
            'DiasInv'=>"0.00",
            'Cto_Prom'=>"0.00",
            'Cto_Catalogo'=>"137.03", 
            'Capa'=>"1", 
            'Capas'=>"CAPA 1  HASTA 30 DIAS",
            'UltimaEnt'=>"20200324",
            'DiasTrans'=>"1212", 
            'Alm'=>"001", 
            'Compra'=>"OFC-85549",
        ),
        array(
            'Num'=>"1", 
            'Comprador'=>"MIYOSHI SANTI", 
            'Clas'=>"C",
            'Proveedor'=>"000000159 PRODUCTOS ALIMENTICIOS LA MODERNA, S.A DE C.V.",
            'Codigo'=>"10037", 
            'Descripcion'=>"PRUEBA DEL SEGUNDO BLOQUE 95 G", 
            'Presentacion'=>"20/95",
            'VtaMens'=>"0.00",
            'VtaProm'=>"0.00", 
            'Existencia'=>"0.00", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"0.00",
            'VtaProm$'=>"0.00", 
            'ValorInv$'=>"0.00", 
            'DiasInv'=>"0.00",
            'Cto_Prom'=>"0.00",
            'Cto_Catalogo'=>"137.03", 
            'Capa'=>"1", 
            'Capas'=>"CAPA 1  HASTA 30 DIAS",
            'UltimaEnt'=>"20200324",
            'DiasTrans'=>"1212", 
            'Alm'=>"001", 
            'Compra'=>"OFC-85549",
        ),
         array(
            'Num'=>"1", 
            'Comprador'=>"MARIA ARGELIA", 
            'Clas'=>"A ",
            'Proveedor'=>"000001711 MALTA TEXO DE MEXICO, S.A. DE C.V.",
            'Codigo'=>"10112", 
            'Descripcion'=>"ALIM MININO ORIGINAL 15 KG", 
            'Presentacion'=>"1/15",
            'VtaMens'=>"0.00",
            'VtaProm'=>"0.00", 
            'Existencia'=>"0.00", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"0.00",
            'VtaProm$'=>"0.00", 
            'ValorInv$'=>"0.00", 
            'DiasInv'=>"0.00",
            'Cto_Prom'=>"0.00",
            'Cto_Catalogo'=>"137.03", 
            'Capa'=>"2", 
            'Capas'=>"CAPA 2 MAYOR A 30 Y HASTA 60 DIAS",
            'UltimaEnt'=>"20200324",
            'DiasTrans'=>"1", 
            'Alm'=>"024", 
            'Compra'=>"OFC-173549",
        ),
        array(
            'Num'=>"1", 
            'Comprador'=>"MARIA ARGELIA", 
            'Clas'=>"A ",
            'Proveedor'=>"000001711 MALTA TEXO DE MEXICO, S.A. DE C.V.",
            'Codigo'=>"10112", 
            'Descripcion'=>"ALIM MININO ORIGINAL 15 KG", 
            'Presentacion'=>"1/15",
            'VtaMens'=>"0.00",
            'VtaProm'=>"0.00", 
            'Existencia'=>"0.00", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"0.00",
            'VtaProm$'=>"0.00", 
            'ValorInv$'=>"0.00", 
            'DiasInv'=>"0.00",
            'Cto_Prom'=>"0.00",
            'Cto_Catalogo'=>"137.03", 
            'Capa'=>"2", 
            'Capas'=>"CAPA 2 MAYOR A 30 Y HASTA 60 DIAS",
            'UltimaEnt'=>"20200324",
            'DiasTrans'=>"1", 
            'Alm'=>"024", 
            'Compra'=>"OFC-173549",
        ),
        array(
            'Num'=>"1", 
            'Comprador'=>"MIYOSHI SANTI", 
            'Clas'=>"A",
            'Proveedor'=>"000001701 PRODUCTORA MEXICANA DE ARROZ SAPI DE CV",
            'Codigo'=>"10088", 
            'Descripcion'=>"ARROZ 500 GRS SAN DIEGO", 
            'Presentacion'=>"20/500",
            'VtaMens'=>"191.30",
            'VtaProm'=>"164.3474", 
            'Existencia'=>"392.65", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"37209.44",
            'VtaProm$'=>"32273.4522", 
            'ValorInv$'=>"69128.3751", 
            'DiasInv'=>"65.11376",
            'Cto_Prom'=>"176.0559",
            'Cto_Catalogo'=>"176.50", 
            'Capa'=>"3", 
            'Capas'=>"CAPA 3 MAYOR A 60 Y HASTA 90 DIAS",
            'UltimaEnt'=>"20230704",
            'DiasTrans'=>"15", 
            'Alm'=>"013", 
            'Compra'=>"OFC-172859",
        ),
        array(
            'Num'=>"1", 
            'Comprador'=>"CARMEN MENDEZ", 
            'Clas'=>"C",
            'Proveedor'=>"000000105 GRUPO CLARASOL SA DE CV.",
            'Codigo'=>"10243", 
            'Descripcion'=>"BL CLARASOL MASCOTAS 1 LT", 
            'Presentacion'=>"1/12",
            'VtaMens'=>"191.30",
            'VtaProm'=>"164.3474", 
            'Existencia'=>"392.65", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"37209.44",
            'VtaProm$'=>"32273.4522", 
            'ValorInv$'=>"69128.3751", 
            'DiasInv'=>"65.11376",
            'Cto_Prom'=>"176.0559",
            'Cto_Catalogo'=>"176.50", 
            'Capa'=>"3", 
            'Capas'=>"CAPA 3 MAYOR A 60 Y HASTA 90 DIAS",
            'UltimaEnt'=>"20230704",
            'DiasTrans'=>"67", 
            'Alm'=>"001", 
            'Compra'=>"OFC-167480",
        ),
        
        array(
            'Num'=>"1", 
            'Comprador'=>"MARIA ARGELIA", 
            'Clas'=>"C ",
            'Proveedor'=>"000000044 COLGATE PALMOLIVE S.A. DE C.V.",
            'Codigo'=>"10080", 
            'Descripcion'=>"SH CAPRICE 750 ML ESP RIZOS DEFINIDOS", 
            'Presentacion'=>"20/500",
            'VtaMens'=>"191.30",
            'VtaProm'=>"164.3474", 
            'Existencia'=>"392.65", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"37209.44",
            'VtaProm$'=>"32273.4522", 
            'ValorInv$'=>"69128.3751", 
            'DiasInv'=>"65.11376",
            'Cto_Prom'=>"176.0559",
            'Cto_Catalogo'=>"176.50", 
            'Capa'=>"4", 
            'Capas'=>"CAPA 4 MAYOR A 90 Y HASTA 120 DIAS",
            'UltimaEnt'=>"20230711",
            'DiasTrans'=>"8", 
            'Alm'=>"001", 
            'Compra'=>"OFC-172800",
        ),
        array(
            'Num'=>"1", 
            'Comprador'=>"CARMEN MENDEZ", 
            'Clas'=>"B",
            'Proveedor'=>"000000661 DISTRIBUIDORA DE PRODUCTOS ARAMO, S.A. DE C.V.",
            'Codigo'=>"10165", 
            'Descripcion'=>"VD ARAMO ILUMINATA # 7 SURTIDA", 
            'Presentacion'=>"1/12",
            'VtaMens'=>"191.30",
            'VtaProm'=>"164.3474", 
            'Existencia'=>"392.65", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"37209.44",
            'VtaProm$'=>"32273.4522", 
            'ValorInv$'=>"69128.3751", 
            'DiasInv'=>"65.11376",
            'Cto_Prom'=>"176.0559",
            'Cto_Catalogo'=>"176.50", 
            'Capa'=>"4", 
            'Capas'=>"CAPA 4 MAYOR A 90 Y HASTA 120 DIAS",
            'UltimaEnt'=>"20221116",
            'DiasTrans'=>"245", 
            'Alm'=>"001", 
            'Compra'=>"OFC-147756",
        ),
        array(
            'Num'=>"1", 
            'Comprador'=>"CARMEN MENDEZ", 
            'Clas'=>"C",
            'Proveedor'=>"000000205 ESCOBAS Y FIBRAS OLIMPIA S.A D C.V",
            'Codigo'=>"10197", 
            'Descripcion'=>"ESCOBA ECONOMICA OLIMPIA", 
            'Presentacion'=>"1/24",
            'VtaMens'=>"0.1249",
            'VtaProm'=>"0.319", 
            'Existencia'=>"2.0414", 
            'BackOrder'=>"0.00",
            'VtaNeta$'=>"100.6035",
            'VtaProm$'=>"249.54", 
            'ValorInv$'=>"1135.0742", 
            'DiasInv'=>"138.27744",
            'Cto_Prom'=>"138.27744",
            'Cto_Catalogo'=>"579.3103", 
            'Capa'=>"5", 
            'Capas'=>"CAPA 5 MAYOR A 120 DIAS",
            'UltimaEnt'=>"20221116",
            'DiasTrans'=>"245", 
            'Alm'=>"001", 
            'Compra'=>"OFC-147756",
            
        ),
        
    ); 
        $resultado1 = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; Exec RCA_Capas");
        $array1 = json_decode(json_encode($resultado1), true); 
        //$groupCapas=array();

        //$arreglo = $this->array_sort($array1, 'Proveedor', SORT_ASC); 

        /* foreach ($arreglo as $k => $capa) {
            //$groupCapas[$capa['Capa']][$capa['Proveedor']][$k] =$capa;
            $groupCapas[$capa['Capa']][$capa['Proveedor']][$k] =$capa;
        } */


        //return print_r($resultado1[0]->Proveedor);  
        return view('pages/capas')->with('array', $array1);
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
