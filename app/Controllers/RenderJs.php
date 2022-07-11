<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class RenderJs extends Controller
{
    public function index($jsName)
    {
        //if(($js = file_get_contents(__DIR__.'/../ThirdParty/JS/'.$jsName)) === FALSE) show_404();
        if(($js = file_get_contents(__DIR__.'/../Views/JS/'.$jsName)) === FALSE) show_404();
        // choose the right mime type
        $mimeType = 'text/javascript';

        $this->response
        ->setStatusCode(200)
        ->setContentType($mimeType)
        ->setBody($js)
        ->send();
    }

}