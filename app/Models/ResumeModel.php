<?php

namespace App\Models;

use CodeIgniter\Model;

class ResumeModel extends Model
{
    protected $table            = 'resumes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'filename',
        'original',
        'file_type',
        'file_size',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'uploaded_at';
    protected $updatedField  = 'updated_at';

    // ──────────────────────────────────────────
    //  Get the single active resume (always row 1)
    // ──────────────────────────────────────────
    public function getResume(): ?array
    {
        return $this->orderBy('id', 'DESC')->first();
    }

    // ──────────────────────────────────────────
    //  Save or replace resume
    //  Only one resume is kept at a time.
    //  Returns the new row id on success.
    // ──────────────────────────────────────────
    public function saveResume(array $data): int|false
    {
        // Wipe any previous record so the table stays clean
        $this->where('id >', 0)->delete();

        $this->insert([
            'filename'  => $data['filename'],
            'original'  => $data['original'],
            'file_type' => $data['file_type'],
            'file_size' => $data['file_size'],
        ]);

        return $this->getInsertID() ?: false;
    }

    // ──────────────────────────────────────────
    //  Delete the resume record
    // ──────────────────────────────────────────
    public function deleteResume(): bool
    {
        return $this->where('id >', 0)->delete() !== false;
    }
}