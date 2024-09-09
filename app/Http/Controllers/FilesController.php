<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    private $disk = "private";
    public function loadView(){

    }
    public function storeFile(Request $request){
        //return $request->file('file');
        if($request->isMethod('POST')){
            $file = $request->file('file');
            $name = $request->input('nombre');

            $file->storeAs('',$name.".".$file->extension(),$this->disk);
        }
       return redirect('documentos');

    }

    public function downloadFile($name){

    }
}
