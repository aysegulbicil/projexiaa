<?php

namespace App\Controllers\User;


use App\Controllers\BaseController;
use App\Models\user\ProjectModel;



class UserController extends \App\Controllers\BaseController
{
     public function index()
    {
        return view('users/anasayfa');
    }
    public function projeekle()
    {
        return view('users/projeekle');
    }
    public function projelerimlist()
    {
        $userID = session()->get('user_id'); // Oturumdan kullanıcı ID'sini al

        $model = new ProjectModel();
        $data['projects'] = $model->where('user_id', $userID)->findAll(); // Sadece giriş yapan kullanıcının projelerini çek

        return view('users/projelerim', $data);
    }

   
}
