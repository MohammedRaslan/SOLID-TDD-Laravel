<?php
namespace App\Classes;

use App\Classes\AbstractExport;
use Illuminate\Support\Facades\File;

class ExportToJson extends AbstractExport
{
    protected $data;
    public function __construct($data) {
        $this->data = $data;
    }
    public function Export()
    {
        $fileData = $this->getFileInformation('json');
        unset($this->data['extension']);
        $exported = File::put($fileData['path'].$fileData['file_name'], $this->data);
        if($exported){
            return  'Json File Exported';
        }
    }
}