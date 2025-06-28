<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $userId = $session->get('user_id');

        if ($userId) {
            $userModel = new \App\Models\LoginModel();
            $roleData = $userModel->getUserRoleIn($userId);

            if ($roleData) {
                $session->set('user_role', $roleData['role_id']);
                $session->set('role_name', $roleData['role_name']);
            }
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Genellikle boş bırakılır
    }
}
