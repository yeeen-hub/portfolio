<?php
namespace App\Models;
use CodeIgniter\Model;

class LandingModel extends Model
{
    protected $table = 'landing';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'heading',
        'subheading',
        'profile_image',
        'about_text',
        'address',
        'expertise',
        'email',
        'phone_number',
        'facebook',
        'github_username',
        'sktitle',
        'skdesc',
        'sktitletwo',
        'skdesctwo',
        'sktitlethree',
        'skdescthree',
        'feature_1',
        'feature_2',
        'feature_3',
        'project_image',
        'project_title',
        'project_desc',
        'fb_link',
        'github_link',
        'email_link',
    ];
}