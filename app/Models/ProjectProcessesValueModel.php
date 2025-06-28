<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectProcessesValueModel extends Model
{
    protected $table = 'project_processes_value'; 
    protected $primaryKey = 'id'; 

    protected $allowedFields = [
        'project_books_processes_id',  
        'project_id',           
        'processes_value',    
        'user_id',             
        'admin_id',            
        'file_path',           
        'created_at',          
        'updated_at',         
    ];

    protected $useTimestamps = true;  
    protected $dateFormat = 'int';  
    public function customInsert($data)
    {
        return $this->insert($data);
    }

}
