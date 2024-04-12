<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distritos;
use App\Models\Preguntas;
use App\Models\Preghdr;
use App\Models\Pregdet;

class FormatosController extends Controller
{
    //
    public function abrirPdf(Request $request){
        $id = $request->input("id");
        $suc = $request->input("suc");

        //return $suc;
        //SE OBTIENE LOS RESULTADOS PARA MOSTRAR 
        $resultados = Pregdet::where('id_cabecera',$id)
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

        $pdf = \PDF::loadView('pages/formatoPdf', ['suc'=>$suc,'resultados'=>$resultados,'array'=>$array,'total'=>$array1]);

           return $pdf->stream('formato.pdf');

            return view('pages/formatoPdf' , ['suc'=>$suc,'resultados'=>$resultados,'array'=>$array,'total'=>$array1]);
    }

}
