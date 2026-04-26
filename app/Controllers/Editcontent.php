<?php
namespace App\Controllers;
use App\Models\LandingModel;

class Editcontent extends BaseController
{
    public function index()
    {
        $model = new LandingModel();
        $landing = $model->first(); // get the first row

        return view('editcontent', ['landing' => $landing]);
    }
}