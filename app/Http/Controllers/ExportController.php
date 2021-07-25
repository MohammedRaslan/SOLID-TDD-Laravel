<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function ExportToPhp(Request $request)
    {
        $jsonFile = time() . '_file.php';
        $destinationPath = public_path()."/upload/";
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        $exported = File::put($destinationPath.$jsonFile, $request->all());
        if($exported){
            return response()->json([
                'message' => 'PHP File Exported',
            ]);
        }
    }

    public function exportToJson(Request $request)
    {
        $jsonFile = time() . '_file.json';
        $destinationPath = public_path()."/upload/";
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        $exported = File::put($destinationPath.$jsonFile, $request->all());
        if($exported){
            return response()->json([
                'message' => 'Json File Exported',
            ]);
        }
    }
}

