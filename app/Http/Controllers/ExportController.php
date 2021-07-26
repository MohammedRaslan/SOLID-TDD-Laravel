<?php

namespace App\Http\Controllers;

use App\Classes\Exporter;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function Export(Request $request)
    {
       $exporter = new Exporter();
       $export   = $exporter->exportFactory($request->all());
       return response()->json([
           'message' => $export->Export(),
       ]);
    }
}

