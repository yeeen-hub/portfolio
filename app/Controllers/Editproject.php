<?php

namespace App\Controllers;
use App\Models\ProjectModel;

class Editproject extends BaseController
{
    public function index()
    {
        $model = new ProjectModel();
        $data['projects'] = $model->findAll();

        return view('editproject', $data);
    }
}