<?php
namespace App\Classes;

use App\Interfaces\ExportInterface;
use Illuminate\Support\Facades\File;

class ExportToPhp implements ExportInterface{

    protected $data;
    public function __construct($data) {
        $this->data = $data;
    }

    public function Export()
    {
         $jsonFile = time() . '_file.php';
        $destinationPath = public_path()."/upload/";
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        unset($this->data['extension']);
        $exported = File::put($destinationPath.$jsonFile, $this->data);
        if($exported){
            return response()->json([
                'message' => 'PHP File Exported',
            ]);
        }
    }
}