<?php

namespace App\Models\user;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table            = 'project';
    protected $primaryKey       = 'project_id';
    protected $allowedFields    = [
        'project_name',
        'user_id',
        'unit',
        'location',
        'subject',
        'subject_other',
        'institutions',
        'target_audience',
        'purpose',
        'topic',
        'summary',
        'activity_description',
        'expected_results',
        'why_implement',
        'documentation',
        'start_date',
        'end_date'
    ];
    protected $useTimestamps    = true; // created_at ve updated_at otomatik yönetilsin

    public function getMembersByProjectId($projectId)
    {
        return $this->db->table('project_editors')
            ->where('project_id', $projectId)
            ->get()
            ->getResultArray();
    }

    public function getFilesByProjectId($projectId)
    {
        return $this->db->table('project')
            ->where('project_id', $projectId)
            ->get()
            ->getResultArray();
    }
}
