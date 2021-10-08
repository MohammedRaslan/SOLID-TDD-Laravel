<?php

namespace App\Http\Controllers;

use App\Classes\Exporter;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function Export(Request $request, Exporter $exporter)
    {
       $export = $exporter->exportFactory($request->all());
       return response()->json($export->Export());
    }
}

