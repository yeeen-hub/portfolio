<?php
namespace App\Controllers;

use App\Models\LandingModel;

class Landing extends BaseController
{
    public function edit()
    {
        $model = new LandingModel();
        $data['landing'] = $model->first(); // get the first (and only) record
        return view('admin/landing_edit', $data);
    }

    public function update()
{
    $model = new LandingModel();
    $id = $this->request->getPost('id');

    $expertise = $this->request->getPost('expertise');

    if (!$expertise) {
        $expertise = json_encode([]);
    }

    // Get all text inputs
    $data = [
        'heading' => $this->request->getPost('heading'),
        'subheading' => $this->request->getPost('subheading'),
        'about_text' => $this->request->getPost('about_text'),
        'address' => $this->request->getPost('address'),
        'expertise' => $expertise,
        'email' => $this->request->getPost('email'),
        'phone_number' => $this->request->getPost('phone_number'),
        'facebook' => $this->request->getPost('facebook'),
        'github_username' => $this->request->getPost('github_username'),
        'sktitle' => $this->request->getPost('sktitle'),
        'skdesc' => $this->request->getPost('skdesc'),
        'sktitletwo' => $this->request->getPost('sktitletwo'),
        'skdesctwo' => $this->request->getPost('skdesctwo'),
        'sktitlethree' => $this->request->getPost('sktitlethree'),
        'skdescthree' => $this->request->getPost('skdescthree'),
        'fb_link' => $this->request->getPost('facebook_link'),
        'github_link' => $this->request->getPost('github_link'),
        'email_link' => $this->request->getPost('email_link'),
    ];

    // Handle profile_image
    $profileImage = $this->request->getFile('profile_image');
    if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
        $newName = $profileImage->getRandomName();
        $profileImage->move(WRITEPATH . 'uploads', $newName);
        $data['profile_image'] = $newName;
    } else {
        $current = $model->find($id);
        $data['profile_image'] = $current['profile_image'];
    }

    // Handle feature images
    for ($i = 1; $i <= 3; $i++) {
        $file = $this->request->getFile("feature$i");
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $data["feature_$i"] = $newName;
        } else {
            $current = $current ?? $model->find($id);
            $data["feature_$i"] = $current["feature_$i"];
        }
    }

    // Update the record
    $model->update($id, $data);

    return redirect()->to(base_url('editcontent'))->with('success', 'Landing Page updated!');
}
}