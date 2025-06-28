<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'users'; // Veritabanındaki users tablosu
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'user_name',
        'user_username',
        'user_phone',
        'user_orcid',
        'user_mail',
        'user_password',
        'user_institution',
        'user_gender',
        'user_appellation',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // protected $beforeInsert = ['hashPassword'];
    // protected $beforeUpdate = ['hashPassword'];
    public function getUser($email)
    {
        return $this->db->table('users')->where('user_mail', $email)->get()->getFirstRow('array');
    }
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['user_password'])) {
            $data['data']['user_password'] = password_hash($data['data']['user_password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function insertUser(array $userData)
    {
        return $this->insert($userData);
    }

    public function getUserRoleIn($userId)
    {
        return $this->db->table('user_roles')
            ->select('user_roles.role_id, roles.role_name')
            ->join('roles', 'roles.id = user_roles.role_id')
            ->where('user_roles.user_id', $userId)
            ->get()
            ->getRowArray();
    }
}
