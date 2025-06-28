<?php

namespace App\Models\user;

use CodeIgniter\Model;

class ProjectEditorModel extends Model
{
    protected $table = 'project_editors';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'project_id',
        'email',
        'name',
        'appellation',
        'created_at',
        'updated_at',
    ];

    // Otomatik timestamp kullanmak istersen:
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
