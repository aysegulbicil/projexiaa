<?php

namespace App\Models;

use CodeIgniter\Model;

class FormDataModel extends Model
{
    protected $table            = 'form_data';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'project_id',
        'template_code',  // Yeni alan
        'name',
        'type',
        'value',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true; // created_at ve updated_at otomatik yönetilsin

    protected $returnType    = 'array'; // İsteğe göre 'object' de olabilir

    protected $validationRules = [
        'project_id'    => 'required|is_natural_no_zero',
        'template_code' => 'required|string|max_length[100]', // Yeni alan için kural
        'name'          => 'required|string|max_length[255]',
        'type'          => 'required|string|max_length[50]',
        'value'         => 'permit_empty|string',
    ];
    
}
