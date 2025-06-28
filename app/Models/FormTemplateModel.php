<?php
namespace App\Models;

use CodeIgniter\Model;

class FormTemplateModel extends Model
{
    protected $table = 'formtemplate';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'template_code', 'elements'];
    protected $useTimestamps = true;

    protected $casts = [
        'elements' => 'array', // JSON'ı otomatik array yapar
    ];
}
