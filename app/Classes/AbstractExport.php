<?php
namespace App\Classes;
use Illuminate\Support\Facades\File;

abstract class AbstractExport{

    public abstract function Export();

    public function getFileInformation($extension)
    {
        $file_name = time() . '_file.'.$extension;
        $path      = public_path()."/upload/";
        if (!is_dir($path)) {  mkdir($path,0777,true);  }
        return [
            'file_name' => $file_name,
            'path' => $path,
        ];
    }

}