<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class RegisterController extends Controller
{
    public function index()
    {
        return view('/Register');
    }

    public function submit()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON(['status' => false, 'message' => 'Geçersiz istek yöntemi.']);
        }

        $validation = \Config\Services::validation();

        $rules = [
            'user_institution' => 'required',
            'user_gender' => 'required',
            'user_appellation' => 'required',
            'user_name' => 'required|min_length[3]',
            'country_code' => 'required',
            'user_phone' => 'required|numeric|exact_length[10]|is_unique[users.user_phone]',
            'user_mail' => 'required|valid_email|is_unique[users.user_mail]',
            'user_password' => 'required|min_length[6]',
        ];

        $messages = [
            'user_phone' => [
                'is_unique' => 'Bu telefon numarası zaten kayıtlı.'
            ],
            'user_mail' => [
                'is_unique' => 'Bu e-posta adresi zaten kayıtlı.'
            ],
        ];

        $validation->setRules($rules, $messages);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Formda hatalar var.',
                'errors' => $validation->getErrors()
            ]);
        }

        $password = $this->request->getPost('user_password');
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $countryCode = $this->request->getPost('country_code');
        $userPhone = $this->request->getPost('user_phone');
        $fullPhoneNumber = $countryCode . $userPhone;

        $userData = [
            'user_institution' => $this->request->getPost('user_institution'),
            'user_gender' => $this->request->getPost('user_gender'),
            'user_appellation' => $this->request->getPost('user_appellation'),
            'user_name' => $this->request->getPost('user_name'),
            'user_phone' => $fullPhoneNumber,
            'user_orcid' => $this->request->getPost('user_orcid'),
            'user_mail' => $this->request->getPost('user_mail'),
            'user_password' => $hashedPassword,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $userModel = new LoginModel();

        if ($userModel->insertUser($userData)) {
            $session = session();
            $session->set([
                'isLoggedIn' => true,
                'user_name' => $userData['user_name'],
                'user_mail' => $userData['user_mail']
            ]);

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Kayıt başarıyla tamamlandı. Yönlendiriliyorsunuz...',
                'redirect' => base_url('/login')
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Kayıt sırasında bir hata oluştu.'
            ]);
        }
    }
}
