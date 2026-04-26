<?php
namespace App\Controllers;

use App\Models\ProjectModel;

class Project extends BaseController
{
    // 1. List all projects
    public function index()
    {
        $model = new ProjectModel();
        $data['projects'] = $model->findAll();
        return view('admin/project_list', $data);
    }

    // 2. Show form to create new project
    public function create()
    {
        return view('admin/project_form');
    }

    // 3. Save new project
    public function store()
    {
        $model = new ProjectModel();

        $projectImage = $this->request->getFile('project_image');
        $imageName = null;

        if ($projectImage && $projectImage->isValid() && !$projectImage->hasMoved()) {
            $imageName = $projectImage->getRandomName();

            // ✅ SAVE TO PUBLIC FOLDER
            $projectImage->move('uploads/', $imageName);
        }

        $model->insert([
            'project_image' => $imageName,
            'project_title' => $this->request->getPost('project_title'),
            'project_cat'   => $this->request->getPost('project_cat'),
            'project_desc'  => $this->request->getPost('project_desc'),
        ]);

        return redirect()->to(base_url('editproject'))->with('success', 'Project created!');
    }

    // 4. Show form to edit existing project
    public function edit($id)
    {
        $model = new ProjectModel();
        $data['project'] = $model->find($id);

        if (!$data['project']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Project not found");
        }

        return view('admin/project_form', $data);
    }

    // 5. Update existing project
    public function update($id)
{
    $model = new ProjectModel();
    $project = $model->find($id);

    if (!$project) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Project not found");
    }

    $projectImage = $this->request->getFile('project_image');
    $imageName = $project['project_image']; // keep old image

    // ✅ ONLY replace if new image uploaded
    if ($projectImage && $projectImage->isValid() && !$projectImage->hasMoved()) {

        $imageName = $projectImage->getRandomName();

        // ✅ SAVE TO PUBLIC FOLDER
        $projectImage->move('uploads/', $imageName);
    }

    $model->update($id, [
        'project_image' => $imageName,
        'project_title' => $this->request->getPost('project_title'),
        'project_cat'   => $this->request->getPost('project_cat'),
        'project_desc'  => $this->request->getPost('project_desc'),
    ]);

    return redirect()->to(base_url('editproject'))->with('success', 'Project updated!');
}

    // 6. Delete a project
    public function delete($id)
    {
        $model = new ProjectModel();
        $project = $model->find($id);

        // ✅ delete image file too
        if ($project && !empty($project['project_image']) && file_exists('uploads/' . $project['project_image'])) {
            unlink('uploads/' . $project['project_image']);
        }

        $model->delete($id);

        return redirect()->to(base_url('editproject'))->with('success', 'Project deleted!');
    }
}