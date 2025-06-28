<?php

namespace App\Controllers\Admin;

class AdminController extends \App\Controllers\BaseController
{
    public function index()
    {
        return view('admin/anasayfa');
    }
    public function kullanicilar()
    {
        $userModel = new \App\Models\LoginModel();
        $data['users'] = $userModel->findAll(); // tüm kullanıcılar

        return view('admin/kullanicilar', $data);
    }
    public function view($id)
    {
        $userModel = new \App\Models\LoginModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kullanıcı bulunamadı.');
        }

        $data['user'] = $user;
        return view('admin/kullaniciView', $data); // view dosyasına yönlendir
    }


    public function edit($id)
    {
        $userModel = new \App\Models\LoginModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Kullanıcı bulunamadı.");
        }

        return view('admin/kullaniciEdit', ['user' => $user]);
    }

    public function delete($id)
    {
        $userModel = new \App\Models\LoginModel();
        $user = $userModel->find($id);

        if (!$user) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Kullanıcı bulunamadı.']);
        }

        if ($userModel->delete($id)) {
            return $this->response->setJSON(['success' => 'Kullanıcı silindi.']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Silme işlemi başarısız.']);
        }
    }

    public function update($id)
    {
        $userModel = new \App\Models\LoginModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
        }

        $data = [
            'user_username'   => $this->request->getPost('user_username'),
            'user_mail'       => $this->request->getPost('user_mail'),
            'user_phone'      => $this->request->getPost('user_phone'),
            'user_institution' => $this->request->getPost('user_institution'),
            'user_appellation'      => $this->request->getPost('user_appellation'),
        ];

        // Şifre değiştirme talebi varsa
        $currentPassword     = $this->request->getPost('current_password');
        $newPassword         = $this->request->getPost('new_password');
        $newPasswordConfirm  = $this->request->getPost('new_password_confirm');

        if ($currentPassword && $newPassword && $newPasswordConfirm) {
            if (!password_verify($currentPassword, $user['user_password'])) {
                return redirect()->back()->with('error', 'Mevcut şifre yanlış.');
            }

            if ($newPassword !== $newPasswordConfirm) {
                return redirect()->back()->with('error', 'Yeni şifreler eşleşmiyor.');
            }

            $data['user_password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        return redirect()->to(base_url('admin/kullanicilar'))->with('success', 'Kullanıcı başarıyla güncellendi.');
    }
}
