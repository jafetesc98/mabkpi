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
    public function storeFile(Request $request){
        
        if($request->isMethod('POST')){
            $file = $request->file('file');
            $name = $request->input('nombre');
            $carpeta = $request->input('carpeta');

            $nombre = strtr($name, " ", "_");

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
