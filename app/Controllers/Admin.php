<?php

// ============================================================
//  Add these methods inside your existing Admin controller
//  (or create a dedicated ResumeController)
// ============================================================

namespace App\Controllers;

use App\Models\ResumeModel;

class Admin extends BaseController
{
    // ── Dashboard — loads resume for display ──────────────────
    public function index()
    {
        $model  = new ResumeModel();
        $resume = $model->getResume();          // array or null

        return view('admin', [
            'resume'   => $resume,
            'projects' => (new \App\Models\ProjectModel())->findAll(),
        ]);
    }

    // ── Upload resume ─────────────────────────────────────────
    public function uploadResume()
    {
        $file = $this->request->getFile('resume_file');

        if (! $file || ! $file->isValid() || $file->hasMoved()) {
            return redirect()->to(base_url('admin'))
                             ->with('error', 'No valid file received.');
        }

        // Validate: PDF or image, max 5 MB
        $rules = [
            'resume_file' => [
                'rules' => 'uploaded[resume_file]'
                         . '|max_size[resume_file,5120]'
                         . '|ext_in[resume_file,pdf,jpg,jpeg,png,webp]',
                'errors' => [
                    'max_size' => 'File must be under 5 MB.',
                    'ext_in'   => 'Only PDF, JPG, PNG, or WebP allowed.',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(base_url('admin'))
                             ->with('error', $this->validator->getError('resume_file'));
        }

        // Delete old physical file if one exists
        $model  = new ResumeModel();
        $old    = $model->getResume();

        if ($old) {
            $oldPath = FCPATH . 'uploads/' . $old['filename'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Move new file
        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads', $newName);

        // Persist to DB
        $model->saveResume([
            'filename'  => $newName,
            'original'  => $file->getClientName(),
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSizeByUnit('b'),   // bytes — already moved, pass raw
        ]);

        return redirect()->to(base_url('admin'))
                         ->with('success', 'Resume uploaded successfully!');
    }

    // ── Delete resume ─────────────────────────────────────────
    public function deleteResume()
    {
        $model  = new ResumeModel();
        $resume = $model->getResume();

        if ($resume) {
            $path = FCPATH . 'uploads/' . $resume['filename'];
            if (file_exists($path)) {
                unlink($path);
            }
            $model->deleteResume();
        }

        return redirect()->to(base_url('admin'))
                         ->with('success', 'Resume removed.');
    }
}