<?php
namespace App\Controllers;

use App\Models\ProjectModel;

class Projects extends BaseController
{
    public function index()
    {
        $model = new ProjectModel();
        $data['projects'] = $model->findAll(); // fetch all projects from DB
        return view('projects', $data); // pass $projects to view
    }

    public function view($id)
{
    $model = new \App\Models\ProjectModel();
    $project = $model->find($id); // fetch project by ID

    if (!$project) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Project not found');
    }

    return view('project_detail', ['project' => $project]);
}
}