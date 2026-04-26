<?php
namespace App\Controllers;

use App\Models\LandingModel;

class About extends BaseController
{
    public function index()
    {
        $landingModel = new LandingModel();

        $landing = $landingModel->first();

        // decode expertise JSON safely
        $expertise = json_decode($landing['expertise'] ?? '[]', true);

        $data = [
            'landing' => $landing,
            'expertise' => $expertise
        ];

        return view('about', $data);
    }
}