<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distritos;
use App\Models\Preguntas;
use App\Models\Preghdr;
use App\Models\Pregdet;
use App\Models\Comentarios;
use Illuminate\Support\Facades\Storage;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

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

        $comentarios = Comentarios::where('id_cabecera',$id)
        ->select('id_cabecera','comentario')->get()->toArray();


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

        //return $comentarios;

        $pdf = \PDF::loadView('pages/formatopdf', ['suc'=>$suc,'resultados'=>$resultados,'array'=>$array,'total'=>$array1,'comentarios'=>$comentarios]);

           return $pdf->stream('formato.pdf');

            return view('pages/formatopdf' , ['suc'=>$suc,'resultados'=>$resultados,'array'=>$array,'total'=>$array1,'comentarios'=>$comentarios]);
    }

    public function imprimepdf(Request $request){
        $dis = $request->input('distrito');
        $suc = $request->input('suc');
        $f_ini = $request->input('f_ini');
        $f_fin = $request->input('f_fin');

        $resultado1 = Preghdr::where('ResultPreghdr.id_supervisor',$dis)
         ->where('ResultPreghdr.f_alt', '>=',$f_ini.'15')
         ->where('ResultPreghdr.f_alt','<=',$f_ini.'20')
         ->where('ResultPreghdr.suc','=',$suc)
         ->where('ResultPreghdr.evaluacion',1)
         ->join('ResultPregdet','ResultPregdet.id_cabecera','=','ResultPreghdr.ID')
         ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
         ->select('ResultPreghdr.ID','ResultPreghdr.suc','ResultPreghdr.id_supervisor','ResultPreghdr.evaluacion','ResultPregdet.id_pregunta','preguntas.desPreg','ResultPregdet.respuesta','ResultPregdet.calificacion','preguntas.tipo')
         ->get()->toArray();

         $resultado2 = Preghdr::where('ResultPreghdr.id_supervisor',$dis)
         ->where('ResultPreghdr.f_alt', '>=',$f_fin.'01')
         ->where('ResultPreghdr.f_alt','<=',$f_fin.'05')
         ->where('ResultPreghdr.suc','=',$suc)
         ->where('ResultPreghdr.evaluacion',2)
         ->join('ResultPregdet','ResultPregdet.id_cabecera','=','ResultPreghdr.ID')
         ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
         ->select('ResultPreghdr.ID','ResultPreghdr.suc','ResultPreghdr.id_supervisor','ResultPreghdr.evaluacion','ResultPregdet.id_pregunta','preguntas.desPreg','ResultPregdet.respuesta','ResultPregdet.calificacion','preguntas.tipo')
         ->get()->toArray();

         $resultado3 = Preghdr::where('ResultPreghdr.suc', $suc)
         ->where('ResultPreghdr.f_alt', '>=',$f_fin.'01')
         ->where('ResultPreghdr.f_alt','<=',$f_fin.'05')
         ->where('ResultPreghdr.evaluacion',0)
         ->join('ResultPregdet','ResultPregdet.id_cabecera','=','ResultPreghdr.ID')
         ->join('preguntas','ResultPregdet.id_pregunta','=','preguntas.id')
         ->select('ResultPreghdr.ID','ResultPreghdr.suc','ResultPreghdr.id_supervisor','ResultPreghdr.evaluacion','ResultPregdet.id_pregunta','preguntas.desPreg','ResultPregdet.respuesta','ResultPregdet.calificacion','preguntas.tipo')
         ->get()->toArray();

         $comentarios1=null;
         $comentarios2=null;
         $comentarios3=null;

         if(count($resultado1) != 0){
            $idcom1 = $resultado1[0]['ID'];
            $comentarios1 = Comentarios::where('id_cabecera',$idcom1)
            ->select('id_cabecera','comentario')->get()->toArray();
         }
         if(count($resultado2) != 0){
            $idcom2 = $resultado2[0]['ID'];
            $comentarios2 = Comentarios::where('id_cabecera',$idcom2)
            ->select('id_cabecera','comentario')->get()->toArray();
         }
         if(count($resultado3) != 0){
            $idcom3 = $resultado3[0]['ID'];
            $comentarios3 = Comentarios::where('id_cabecera',$idcom3)
            ->select('id_cabecera','comentario')->get()->toArray();
         }
         
         //return $resultado1;
         $total1=null;
         $total2=null;
         $total3=null;
         if(count($resultado1) != 0){
            $total1 = $this->calificaciones($resultado1,$suc);
         }
         if(count($resultado2) != 0){
            $total2 = $this->calificaciones($resultado2,$suc);
            
         }
         if(count($resultado3) != 0){
            $total3 = $this->calificaciones($resultado3,$suc);
         }

         //return $total2;

        
        $pdf = \PDF::loadView('pages/imprimeformatopdf', ['suc'=>$suc,'evaluacion1'=>$resultado1,'evaluacion2'=>$resultado2,'evaluacion3'=>$resultado3,'total1'=>$total1,'total2'=>$total2,'total3'=>$total3,'comentarios1'=>$comentarios1,'comentarios2'=>$comentarios2,'comentarios3'=>$comentarios3]);

           return $pdf->stream('formato.pdf');

            return view('pages/imprimeformatopdf' , ['suc'=>$suc,'evaluacion1'=>$resultado1,'evaluacion2'=>$resultado2,'evaluacion3'=>$resultado3,'total1'=>$total1,'total2'=>$total2,'total3'=>$total3,'comentarios1'=>$comentarios1,'comentarios2'=>$comentarios2,'comentarios3'=>$comentarios3]);

    }

    public function calificaciones($resultados,$suc){
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

        $cali_total= round($r_ventas, 2)+round($r_analisis, 2)+ round($r_rh, 2)+round($r_experiencia, 2)+
        round($r_estandares, 2)+round($r_limpieza, 2)+round($r_perecederos, 2)+round($r_contabilidad, 2);

        $array = array('VENTAS'=>round($r_ventas, 2), 
        'ANALISIS FINANCIERO'=>round($r_analisis, 2), 
        'RH'=>round($r_rh, 2), 
        'EXPERIENCIA'=>round($r_experiencia, 2),
        'ESTANDARES DE MERCADERIA'=>round($r_estandares, 2),
        'LIMPIEZA Y MANTENIMIENTO DE LA UNIDAD (INTERIOR Y EXTERIOR)' => round($r_limpieza, 2),
        'PERECEDEROS' => round($r_perecederos, 2),
        'CONTABILIDAD' =>round($r_contabilidad, 2),
        'SUC' => $suc,
        'cali_total'=>round($cali_total, 2)
        );

        return $array;
    }

    public function calificacionesglobales($distrito, $datos, $evaluacion){
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

    public function pdfglobal(Request $request){

        $mes = $request->input('f_ini');
        $mes3 = $request->input('f_fin');

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

            /* $dis7 = Distritos::where('ID',7)
            ->select('Suc','NomSuc','Supervisor','ID')->distinct()->get()->toArray(); */

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

            $dis1ev1 = $this->calificacionesglobales($dis1,$todo,1);
            $dis1ev2 = $this->calificacionesglobales($dis1,$todo,2);

            $dis2ev1 = $this->calificacionesglobales($dis2,$todo,1);
            $dis2ev2 = $this->calificacionesglobales($dis2,$todo,2);

            $dis3ev1 = $this->calificacionesglobales($dis3,$todo,1);
            $dis3ev2 = $this->calificacionesglobales($dis3,$todo,2);

            $dis4ev1 = $this->calificacionesglobales($dis4,$todo,1);
            $dis4ev2 = $this->calificacionesglobales($dis4,$todo,2);

            $dis5ev1 = $this->calificacionesglobales($dis5,$todo,1);
            $dis5ev2 = $this->calificacionesglobales($dis5,$todo,2);

            $dis6ev1 = $this->calificacionesglobales($dis6,$todo,1);
            $dis6ev2 = $this->calificacionesglobales($dis6,$todo,2);

            /* $dis7ev1 = $this->calificacionesglobales($dis7,$todo,1);
            $dis7ev2 = $this->calificacionesglobales($dis7,$todo,2); */

            $dis8ev1 = $this->calificacionesglobales($dis8,$todo,1);
            $dis8ev2 = $this->calificacionesglobales($dis8,$todo,2);

            $dis9ev1 = $this->calificacionesglobales($dis9,$todo,1);
            $dis9ev2 = $this->calificacionesglobales($dis9,$todo,2);

            $dis10ev1 = $this->calificacionesglobales($dis10,$todo,1);
            $dis10ev2 = $this->calificacionesglobales($dis10,$todo,2);

            $dis11ev0 = $this->calificacionesglobales($dis11,$todo,0);

            $distrito1=  array('evaluacion1'=>$dis1ev1, 'evaluacion2' => $dis1ev2);
            $distrito2=  array('evaluacion1'=>$dis2ev1, 'evaluacion2' => $dis2ev2);
            $distrito3=  array('evaluacion1'=>$dis3ev1, 'evaluacion2' => $dis3ev2);
            $distrito4=  array('evaluacion1'=>$dis4ev1, 'evaluacion2' => $dis4ev2);
            $distrito5=  array('evaluacion1'=>$dis5ev1, 'evaluacion2' => $dis5ev2);
            $distrito6=  array('evaluacion1'=>$dis6ev1, 'evaluacion2' => $dis6ev2);
           /*  $distrito7=  array('evaluacion1'=>$dis7ev1, 'evaluacion2' => $dis7ev2); */
            $distrito8=  array('evaluacion1'=>$dis8ev1, 'evaluacion2' => $dis8ev2);
            $distrito9=  array('evaluacion1'=>$dis9ev1, 'evaluacion2' => $dis9ev2);
            $distrito10=  array('evaluacion1'=>$dis10ev1, 'evaluacion2' => $dis10ev2);

            $resfinal= array('dis1'=>$distrito1,'dis2'=>$distrito2,'dis3'=>$distrito3,'dis4'=>$distrito4,'dis5'=>$distrito5,'dis6'=>$distrito6,
            /* 'dis7'=>$distrito7, */'dis8'=>$distrito8,'dis9'=>$distrito9,'dis10'=>$distrito10);
            
            $d1e1=0;
            for($i=0; $i<count($distrito4['evaluacion1']); $i++){
                $d1e1+=$distrito4['evaluacion1'][$i]['total'];
            }
            $d1e2=0;
            for($i=0; $i<count($distrito4['evaluacion2']); $i++){
                $d1e2+=$distrito4['evaluacion2'][$i]['total'];
            }
            $d1prom=(($d1e1/count($dis4))+($d1e2/count($dis4)))/2;
            
            //return $d1prom;

            $fechas= array('f_ini'=>$mes,'f_fin'=>$mes3);

            $pdf = \PDF::loadView('pages/pdfglobal', ['array'=>$resfinal,'dis1'=>$dis1,'dis2'=>$dis2,'dis3'=>$dis3,'dis4'=>$dis4,'dis5'=>$dis5,'dis6'=>$dis6,/* 'dis7'=>$dis7, */'dis8'=>$dis8,'dis9'=>$dis9,'dis10'=>$dis10,'jefesup'=>$dis11ev0,'fechas',$fechas]);

            return $pdf->stream('formato.pdf');
 
             return view('pages/pdfglobal' , ['array'=>$resfinal,'dis1'=>$dis1,'dis2'=>$dis2,'dis3'=>$dis3,'dis4'=>$dis4,'dis5'=>$dis5,'dis6'=>$dis6,/* 'dis7'=>$dis7, */'dis8'=>$dis8,'dis9'=>$dis9,'dis10'=>$dis10,'jefesup'=>$dis11ev0,'fechas',$fechas]);

            return view('pages/resultadosglobales')->with("array",$resfinal)->with('dis1',$dis1)->with('dis2',$dis2)->with('dis3',$dis3)->with('dis4',$dis4)->with('dis5',$dis5)
            ->with('dis6',$dis6)/* ->with('dis7',$dis7) */->with('dis8',$dis8)->with('dis9',$dis9)->with('dis10',$dis10)->with('jefesup',$dis11ev0)->with('fechas',$fechas);
    }

 public function rsearch($folder, $regPattern) {
    $dir = new RecursiveDirectoryIterator($folder);
    $ite = new RecursiveIteratorIterator($dir);
    $files = new RegexIterator($ite, $regPattern, RegexIterator::GET_MATCH);
    $fileList = array();
    foreach($files as $file) {
        $fileList = array_merge($fileList, $file);
    }
    return $fileList;
}
    public function documentos(){
         $files=[];
         /*
        foreach(Storage::disk($this->disk)->files() as $file){
            $name = str_replace("$this->disk/","",$file);
            $picture = "";
            $type = Storage::disk($this->disk)->mimeType($name);
            
            if(strpos($type, "image")!== false){
                $picture = asset(Storage::disk($this->disk)->
                url($name));
            }
            $downloadLink = route("download",$name);
            $files[] = [
                "picture" =>$picture,
                "name"    => $name,
                "link"    => $downloadLink,
                "size"    => Storage::disk($this->disk)->size($name)

            ];
        } */
         //return view('pages/descargaFormatos',["files"=>$files]);
         
         //$result = rsearch('uploads/live', '/.*.pdf/');
         $result = $this->rsearch('public/dist/doc', '/.*./');
         return view('pages/descargaFormatos',["files"=>$result]);
        //print_r($result);
    }

   



}
