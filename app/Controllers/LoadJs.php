<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LoadJs extends Controller
{
    public function index($namaJs)
    {
        if(($image = file_get_contents('../ThirdParty/JS/'.$namaJs)) === FALSE) show_404();
        
        // choose the right mime type
        $mimeType = 'text/javascript';

        $this->response
        ->setStatusCode(200)
        ->setContentType($mimeType)
        ->setBody($image)
        ->send();
    }

}