<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function login()
    {
        return view('/login');
    }


    public function loginActions()
    {
        $userModel = new LoginModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!empty($email) && !empty($password)) {
            $user = $userModel->getUser($email);

            if (!empty($user) && password_verify($password, $user['user_password'] ?? '')) {

                // Kullanıcının rolünü al
                $userRole = $userModel->getUserRoleIn($user['user_id']);

                $session = session();
                $session->set([
                    'login' => true,
                    'user_id' => $user['user_id'],
                    'user_name' => $user['user_name'],
                    'user_email' => $user['user_mail'],
                    'orc_id' => $user['user_orcid'],
                    'user_unvan' => $user['user_appellation'],
                    'user_username' => $user['user_username'],
                    'user_institution' => $user['user_institution'],
                    'user_phone' => $user['user_phone'],
                    'user_role' => $userRole['role_id'] ?? 0, // <<< Burada artık doğru rol atanıyor
                ]);

                return redirect()->to('/');
            } else {
                return redirect()->to('/login')->with('errors', 'Email veya Şifre hatalı');
            }
        } else {
            return redirect()->to('/login')->with('errors', 'Email veya Şifre hatalı');
        }
    }


    public function logout()
    {
        $session = session();
        $session->remove('user');
        return redirect()->to('/login');
    }
}
