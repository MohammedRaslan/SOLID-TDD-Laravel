<?php
namespace App\Classes;

class Exporter
{
    public function exportFactory($data)
    {
        switch($data['extension']){
            case 'PHP':
                return new ExportToPhp($data);
            case 'Json': 
                return new ExportToJson($data);
        }
    }
}