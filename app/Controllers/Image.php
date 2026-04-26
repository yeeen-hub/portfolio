<?php

namespace App\Controllers;

class Image extends BaseController
{
    public function show($filename)
    {
        $path = WRITEPATH . 'uploads/' . $filename;

        if (!file_exists($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->response->setHeader('Content-Type', mime_content_type($path))
                              ->setBody(file_get_contents($path));
    }
}