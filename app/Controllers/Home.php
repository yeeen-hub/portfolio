<?php

namespace App\Controllers;

use App\Models\LandingModel;
use App\Models\ProjectModel;
use App\Models\ResumeModel;

class Home extends BaseController
{
    public function index(): string
    {
        $landingModel = new LandingModel();
        $projectModel = new ProjectModel();
        $resumeModel  = new ResumeModel();

        $landing = $landingModel->first();
        $projects = $projectModel->findAll();
        $resume = $resumeModel->getResume();

        $expertise = json_decode($landing['expertise'] ?? '[]', true);

        $data = [
            'landing' => $landing,
            'projects' => $projects,
            'expertise' => $expertise,
            'resume' => $resume,
        ];

        return view('home', $data);
    }
}