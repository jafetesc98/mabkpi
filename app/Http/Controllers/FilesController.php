<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\UbicacionArc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FilesController extends Controller
{
    private $disk = "private";
    public function loadView(){

    }
    function eliminar_acentos($cadena){
		
		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);

		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );

		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );

		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );

		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );

		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);
		
		return $cadena;
	}
    public function storeFile(Request $request){
        
        if($request->isMethod('POST')){
            $file = $request->file('file');
            $name = $request->input('nombre');
            $carpeta = $request->input('carpeta');

            $nombre = strtr($name, " ", "_");
            $nombre = $this->eliminar_acentos($nombre);
            //return $nombre;

            $file->storeAs('',$carpeta."/".trim($nombre).".".$file->extension(),$this->disk);
        }
       return redirect('documentos');

    }

    public function deleteFiles(Request $request){
            $nombre = substr($request->input('nombre'), strrpos($request->input('nombre'), '/')+1);
            $dir = substr($request->input('nombre'), 16,strrpos($request->input('nombre'),  '/'));
            
            //return $dir;
             Storage::disk('private')->delete($dir);
            
        return redirect('documentos');

    }

    public function guardadireccion(Request $request){
       $user = Auth::user();
       $usuario = $user->nom_cto;

        $nom_arch = $request->input("carpeta");
        $nombre =strtolower($nom_arch);
        $nombre = strtr($nombre, " ", "_");
        
        $resultado =Storage::disk('private')->makeDirectory($nombre);

         DB::beginTransaction();
            $ubi = new UbicacionArc;
            $ubi->nombre=$nom_arch;
            $ubi->ubicacion="public/dist/docs/".$nombre;
            $ubi->carpeta=$nombre;
            $ubi->status=1;
            $ubi->user_alt=$usuario;

            try{
                $ubi->save();
            }catch(Throwable $e){
                DB::rollBack();
                return response()->json(array(
                    'code'      =>  421,
                    'message'   =>  'Error al guardar el distrito',
                    'error'     =>  'Error al guardar el distrito',
                ), 421);
            }
        DB::commit();
            
        return redirect('documentos');

    }

    public function eliminacarpeta(Request $request){
        
            $carp = $request->input('carpeta');
            //return $carp;
            $carpeta = UbicacionArc::where('carpeta',$carp)->select('nombre','ubicacion','carpeta')->get()->toArray();
            $dir = $carpeta[0]['ubicacion'];

            $files = glob($dir.'/*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }

            //return $dir;
            rmdir($dir);
            
                DB::beginTransaction();

                try{
                    UbicacionArc::where('carpeta', $carp)->delete();
                }catch(Throwable $e){
                    DB::rollBack();
                    return response()->json(array(
                        'code'      =>  421,
                        'message'   =>  'Error al eliminar el distrito',
                        'error'     =>  'Error al eliminar el distrito',
                    ), 421);
                }
                DB::commit();
            
        return redirect('documentos');

    }

    
}
