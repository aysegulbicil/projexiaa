<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectsProcessesModel extends Model
{
    protected $table = 'project_processes';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'project_id',
        'proccesses_code',
        'action_code',
        'created_at',
        'updated_at',
        'user_id',
        'admin_id'
    ];

    protected $useTimestamps = true;

    protected $dateFormat = 'int';


    protected $validationRules = [
        'created_at' => 'valid_date',
        'updated_at' => 'valid_date',
    ];

    public function getApplicationStatuses($books_id)
    {
        return $this->select('action_code, COUNT(*) as count')
            ->where('user_id', $books_id)
            ->groupBy('action_code')
            ->findAll();
    }
    public function customInsert($data)
    {
        return $this->insert($data);
    }

    public function getApplicationStatusCounts()
    {
        // books_proccesses tablosu ile books tablosundaki bks_id'yi eşleştirerek action_code'a göre filtreleme yapıyoruz
        return $this->select('books_proccesses.action_code, COUNT(*) as count')
            ->join('books', 'books.bks_id = books_proccesses.books_id')  // books tablosu ile books_id üzerinden join yapıyoruz
            ->groupBy('books_proccesses.action_code')  // action_code'a göre grupla
            ->findAll();
    }
    
    
}
