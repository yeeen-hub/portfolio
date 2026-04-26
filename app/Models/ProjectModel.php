<?php
namespace App\Models;
use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'id';

    // Add all new columns here
    protected $allowedFields = [
        'project_image',
        'project_title',
        'project_cat',
        'project_desc',
    ];
}