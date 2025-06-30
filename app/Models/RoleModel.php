<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['role_name', 'description', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    /**
     * Belirli bir kullanıcıya ait rolleri getirir
     */
    public function getUserRoles($userId)
    {
        return $this->db->table('user_roles')
            ->select('roles.*')
            ->join('roles', 'roles.id = user_roles.role_id')
            ->where('user_roles.user_id', $userId)
            ->get()
            ->getResultArray();
    }

    /**
     * Kullanıcının belirli bir role sahip olup olmadığını kontrol eder
     */
    public function userHasRole($userId, $roleName)
    {
        return $this->db->table('user_roles')
            ->join('roles', 'roles.id = user_roles.role_id')
            ->where('user_roles.user_id', $userId)
            ->where('roles.role_name', $roleName)
            ->countAllResults() > 0;
    }

    /**
     * Bir kullanıcıya rol atar
     */
    public function assignRoleToUser($userId, $roleId)
    {
        // Daha önce atanmış mı kontrol et
        $exists = $this->db->table('user_roles')
            ->where('user_id', $userId)
            ->where('role_id', $roleId)
            ->countAllResults();

        if ($exists === 0) {
            $this->db->table('user_roles')->insert([
                'user_id' => $userId,
                'role_id' => $roleId,
            ]);
        }
    }

    /**
     * Kullanıcının tüm rollerini siler
     */
    public function removeAllRolesFromUser($userId)
    {
        $this->db->table('user_roles')->where('user_id', $userId)->delete();
    }
    public function getRoleIdByUserId($userId)
    {
        $result = $this->db->table('user_roles')
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();
    
        return $result && isset($result['role_id']) ? $result['role_id'] : null;
    }
    
}
